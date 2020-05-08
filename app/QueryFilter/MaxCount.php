<?php

namespace App\QueryFilter;

use Closure;
use App\QueryFilter\Filter;

class MaxCount extends Filter
{
    protected function applyFilter($builder)
    {
        return $builder->limit(request($this->filterName()));
    }
}
