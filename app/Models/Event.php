<?php

namespace App\Models;

use App\QueryFiltering\EventFilters;
use Carbon\Carbon;
use App\Models\CategoryEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'date'];

    public function scopeFilter($query, EventFilters $filters) {
        return $filters->apply($query);
    }

    public function getDateAttribute($date) {
        return (new Carbon($date))->format('d M, Y');
    }

    public function primaryCategory() {
        return $this->belongsToMany(Category::class)->first(); // TODO: Set a primary_category field on the category_event table
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function path() {
        return route('event', $this);
    }
}