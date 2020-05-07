<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function videos()
    {
        return $this->morphMany(Video::class, 'videoable');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
