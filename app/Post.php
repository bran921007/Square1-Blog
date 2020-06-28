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

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setSlugAttribute($slug)
    {
        $slug =  Str::slug($this->title, "-") . '-' . random_int(2,1000);

        return $this->attributes['slug'] = $slug;
    }
}
