<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\{Wishlist,Products,Customers};
use Session;


class WishlistController extends Controller
{

    public function index(){
        $loggedInUserId = Session::get('loginId');
        $productsInWishlist = Products::join('wishlist', 'products.id', '=', 'wishlist.product_id')
            ->where('wishlist.customer_id', $loggedInUserId)
            ->get();

        $data = [
          'wishlist' => $productsInWishlist,
        //   'productsCount' => $productsInWishlist->count(),
        ];

        return view('frontend.wishlist', $data);
    }

    public function addToWishlist($product_id = null)
    {
    if ($product_id !== null) {
        $loginId = session('loginId');

        $wishlist = DB::table('wishlist')
            ->where('product_id', $product_id)
            ->where('customer_id', $loginId)
            ->first();

        if (!$wishlist) {
            $data = [
                'product_id' => $product_id,
                'customer_id' => $loginId,
            ];

            DB::table('wishlist')->insert($data);
        }
    }
    return redirect()->back()->with('success', 'Product added to wishlist');
    }

    public function removeProductFromWishlist($product_id)
    {
        $loggedInUserId = Session::get('loginId');

        $wishlistEntry = Wishlist::where('id', $product_id)->first();

        if ($wishlistEntry) {
            $wishlistEntry->delete();
            return redirect()->back()->with('success', 'Product added to wishlist');
        }
    }


}


