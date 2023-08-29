<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded =[];
    protected $table ="category";
    protected $fillable = [
        'name',
        'desc',
        'status',
        'image'
    ];

    public function subcategories()
{
    return $this->hasMany(Products::class);
}
    use HasFactory;
}
