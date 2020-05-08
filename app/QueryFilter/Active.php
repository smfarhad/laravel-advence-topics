<?php

namespace App\QueryFilter;

use Closure;
use App\QueryFilter\Filter;

class Active extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->where($this->filterName(), request($this->filterName()));
    }
}
