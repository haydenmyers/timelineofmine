<?php

namespace App\Models;

use App\Models\Icon;
use App\Models\Event;
use App\QueryFiltering\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory, Filterable;

    protected $fillable = ['user_id', 'icon_id', 'name', 'slug', 'color', 'editable'];

    public function events(): BelongsToMany {
        return $this->belongsToMany(Event::class)->withTimestamps();
    }

    public function icon() {
        return $this->belongsTo(Icon::class);
    }

    public function path() {
        // TODO: Improve this code. Feels a bit hacky. How can I provide a way of getting the current home url and appending this in the query string.
        return route('home') . '?' . urlencode($this->filterName()) . '=' . $this->id;
    }
}
