<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\{Cart,Products,Customers};
use Session;

class CartController extends Controller
{
    public function index()
    {
        $loggedInUserId = Session::get('loginId');
        $cartItems = Products::join('cart', 'products.id', '=', 'cart.product_id')
            ->where('cart.customer_id', $loggedInUserId)
            ->get();

        return view('frontend.cart', compact('cartItems'));
    }

    public function addToCart($product_id = null, $quantity)
    {
        if ($product_id !== null) {
            $loginId = Session::get('loginId');
            $cart = Cart::where('product_id', $product_id)
                ->where('customer_id', $loginId)
                ->first();

            $product = Products::find($product_id);

            if ($product) {
                $data = [
                    'product_id' => $product_id,
                    'customer_id' => $loginId,
                    'quantity' => $quantity,
                ];

                if ($cart) {
                    $cart->update($data);
                    return redirect()->back()->with('success', 'Product quantity updated in cart successfully');
                } else {
                    Cart::create($data);
                    return redirect()->back()->with('success', 'Product added to cart successfully');
                }
            } else {
                return redirect()->back()->with('error', 'Product not found');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid product ID');
        }
    }

    public function removeProductFromCart($product_id)
    {
        $loggedInUserId = Session::get('loginId');

        $cartEntry = Cart::where('id', $product_id)->first();

        if ($cartEntry) {
            $cartEntry->delete();
            return redirect()->back()->with('success', 'Product added to wishlist');
        }
    }



}
