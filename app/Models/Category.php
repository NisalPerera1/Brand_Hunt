<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    // Define relationships if necessary
    // For example, if a category has many products:
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
