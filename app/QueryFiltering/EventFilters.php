<?php

namespace App\QueryFiltering;

use App\QueryFiltering\QueryFilter;

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
}