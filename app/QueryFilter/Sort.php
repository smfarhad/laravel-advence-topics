<?php

namespace App\QueryFilter;

use Closure;
use App\QueryFilter\Filter;

class Sort extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->orderBy('title', request($this->filterName()));
    }
}
