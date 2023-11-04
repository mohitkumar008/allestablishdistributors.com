<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public function scopeActive($query) : Builder {
        return $query->where('status', 1);
    }

    public function scopeHeader($query) : Builder {
        return $query->where('header', 1);
    }

    public function scopeTop($query) : Builder {
        return $query->where('top', 1);
    }

    public function manufacturers(){
        return $this->hasMany(Manufacturer::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}
