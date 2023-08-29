<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;

class ViweSubCategoryController extends Controller
{
    public function index(){
        // Getting data
        $category = Category::all();

        // Assigning to data
        $data = [
            'category' => $category,

        ];
        return view('frontend.index',$data);
    }

    public function show(Category $category)
    {
        // Get the products associated with the given category
        $products = Products::where('category_id', $category->id)->orderBy('id', 'desc')->paginate(12);

        // Assigning to data
        $data = [
            'category' => $category,
            'products' => $products,
        ];

        return view('frontend.shop', $data);
    }

}
