<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $table ="products";
    protected $fillable = [
        'pname',
        'category_id',
        // 'subcategory_id',
        'price',
        'dprice',
        'sku',
        'age',
        'type',
        'areyou',
        'pdesc',
        'psdesc',
        'pspdesc',
        'mtitle',
        'mdesc',
        'otitle',
        'odesc',
        'mainimg',
        'subimg',
    ];


}
