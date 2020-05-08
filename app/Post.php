<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use App\QueryFilter\Active;
use App\QueryFilter\Sort;
use App\QueryFilter\MaxCount;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    public static function allPost()
    {
        return app(Pipeline::class)
            ->send(Post::query())
            ->through([Active::class, Sort::class, MaxCount::class])
            ->thenReturn()
            ->paginate(5);
    }
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
