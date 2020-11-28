<?php

namespace App\QueryFiltering;

use App\QueryFiltering\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class EventFilters extends QueryFilter {
    protected function setDefaults() {
        $this->builder = $this->builder->orderBy('date', 'desc');
    }
    
    public function sortBy($type = 'newest') {
        if ($type === 'oldest') {
            return $this->builder->reorder('date', 'asc');
        }

        if ($type === 'newest') {
            return $this->builder->reorder('date', 'desc');
        }
    }

    public function categories(array $categories) {
        if (!empty($categories)) {
            return $this->builder->whereHas('categories', function(Builder $query) use ($categories) { 
                return $query->whereIn('category_id', $categories); 
            });
        }
    }
}