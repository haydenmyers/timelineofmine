<?php

use Illuminate\Support\Str;

function current_user()
{
    return auth()->user();
}

function create_form_id($name = '')
{
    return Str::random(10) . "_{$name}";
}