<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded =[];
    protected $table ="subcategory";
    protected $fillable = [
        'subcate_name',
        'category_id',
        'desc',
        'status',
        'slug',
        'image'
    ];

    public function products()
{
    return $this->hasMany(Products::class);
}

    use HasFactory;
}
