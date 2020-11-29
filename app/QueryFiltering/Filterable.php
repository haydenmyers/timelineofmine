<?php

namespace App\QueryFiltering;

trait Filterable {
    public function inFilter() {
        switch(strtolower(class_basename($this))) {
            case 'category': 
                if (request('categories')) {
                    return in_array($this->id, request('categories'));
                }
            break;
        }
    }

    public function filterName() {
        switch(strtolower(class_basename($this))) {
            case 'category':
                return 'categories[]';
            break;
        }
    }
}