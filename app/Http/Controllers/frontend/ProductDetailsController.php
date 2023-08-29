<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Products};

class ProductDetailsController extends Controller
{

    public function index($id){
        // Getting data

        $products = Products::where('id',$id)->get();
        $category = Category::all();

        // Assigning to data
        $data = [
            'products' => $products,
            'category' => $category,
        ];
        // Returning to view
        return view('frontend.product_details',$data);

    }

}
