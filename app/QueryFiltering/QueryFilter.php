<?php

namespace App\QueryFiltering;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter {
    protected $request;
    protected $builder;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function apply(Builder $builder) {
        $this->builder = $builder;

        $this->applyDefaultQuery();

        foreach($this->filters() as $name => $value) {
            if (method_exists($this, $name) && $this->ignores($name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }

        return $this->builder;
    }

    protected function applyDefaultQuery() {
        if (method_exists($this, 'setDefaults')) {
            call_user_func([$this, 'setDefaults']);
        }
    }

    protected function ignores($methodName) {
        $ignoreArray = ['apply', 'filters'];

        if (in_array($methodName, $ignoreArray)) {
            return false;
        }

        return true;
    }

    protected function filters() {
        return $this->request->all();
    }
}