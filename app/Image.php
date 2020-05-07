<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];
    public function Imageable()
    {
        return $this->morphTo();
    }
}
