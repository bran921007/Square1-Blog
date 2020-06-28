<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'publication_date','user_id'];

    protected $casts = [
        'publication_date'=>'datetime'
    ];

    public function cacheKey()
    {
        return md5(sprintf(
            "%s.%s.%s",
            $this->getTable(),
            $this->getKey(),
            $this->updated_at->timestamp
        ));
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setSlugAttribute($title)
    {
        $slg =  Str::slug($title, "-") . '-' . random_int(2,1000);

        return $this->attributes['slug'] = $slg ;
    }

    public function getSlugAttribute($slug)
    {
        // return  Str::slug($this->title, "-") . '-' . random_int(2,1000);

        return $this->attributes['slug'];
    }
}
