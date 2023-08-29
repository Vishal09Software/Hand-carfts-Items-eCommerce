<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\{Slider,Category,Feedback,Products,Customers,About};

class HomeController extends Controller
{

    public function index()
{
    // Getting data
    $slider = Slider::orderBy('id', 'DESC')->where('status', 1)->take(3)->get();
    $category = Category::orderBy('id', 'ASC')->where('status', 1)->get();
    $feedback = Feedback::orderBy('id', 'DESC')->where('status', 1)->take(4)->get();
    $about = About::orderBy('id', 'DESC')->get();

    $newArrivalProducts = Products::where('type','LIKE' , '%new arrival%')->get();
    $bestSellerProducts = Products::where('type', 'LIKE', '%best seller%')->get();
    $trendingProducts = Products::where('type', 'LIKE' ,'%trending%')->get();


    // Assigning to data
    $data = [
        'slider' => $slider,
        'category' => $category,
        'feedback' => $feedback,
        'about' => $about,

        'newArrivalProducts' => $newArrivalProducts,
        'bestSellerProducts' => $bestSellerProducts,
        'trendingProducts' => $trendingProducts,



    ];

    // Returning to view
    return view('frontend.index', $data);
}


    public function about(){
        return view('frontend.about');
    }

    public function faq(){
        return view('frontend.faq');
    }

    public function contact(){
        return view('frontend.contact');
    }
    }
