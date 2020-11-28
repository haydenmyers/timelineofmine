<?php

namespace App\QueryFiltering;

trait Filterable {
    public function inFilter() {
        switch(strtolower(class_basename($this))) {
            case 'category': 
                return in_array($this->id, request('categories'));
            break;
        }
    }
}