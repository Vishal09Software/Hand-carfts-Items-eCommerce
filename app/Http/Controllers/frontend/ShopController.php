<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Products};

class ShopController extends Controller
{

    public function index(){
        // Getting data
        $category = Category::all();
        $products = Products::all();

        // Assigning to data
        $data = [
            'category' => $category,
            'products' => $products,
        ];
        // Returning to view
        return view('frontend.shop',$data);
    }

    public function show(Category $category)
    {
        // Get the products associated with the given category
        $products = Products::where('category_id', $category->id)->orderBy('id', 'desc')->paginate(12);
        $category = Category::all();

        // Assigning to data
        $data = [
            'category' => $category,
            'products' => $products,
        ];

        return view('frontend.viewsubcategory', $data);
    }

    public function peopleproducts(Request $request)
{
    $areyou = $request->query('areyou'); // Get the 'areyou' query parameter

    // Get the products associated with the given 'areyou' category
    $products = Products::where('areyou','LIKE' , "%$areyou%")->orderBy('id', 'desc')->paginate(12);
    $category = Category::all();

    // Assigning to data
    $data = [
        'products' => $products,
        'category' => $category,
    ];

    return view('frontend.peopleproducts', $data);
}

}
