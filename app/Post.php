<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cache;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'publication_date','user_id','updated_at','created_at'];
    
    protected $casts = [
        'publication_date'=>'datetime',
        'updated_at'=>'datetime',
        'created_at'=>'datetime'
    ];
    
    public function cacheKey()
    {
        return md5(sprintf(
            "%s.%s.%s",
            $this->getTable(),
            $this->getKey(),
            $this->updated_at
        ));
    }
    
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id')
        ->withDefault(['name'=> 'Anonymous','lastname'=>'']) ;
    }
    
    public function setSlugAttribute($title)
    {
        $slg =  Str::slug($title, "-") . '-' . random_int(2,1000);
        
        return $this->attributes['slug'] = $slg ;
    }
    
    public function getSlugAttribute($slug)
    {
        
        return $this->attributes['slug'];
    }
    
    protected static function booted()
    {
        static::creating(function ($post) {
            Cache::flush();
        });
        
        static::saving(function ($post) {
            Cache::flush();
        });
    }
}
