<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Icon extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'path'];

    public function getPathAttribute($value) {
        return $this->user_id ? '/' . $value : $value;
    }

    public function category() {
        return $this->hasOne(Category::class);
    }
}
