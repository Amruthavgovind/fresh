<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{ public function addToCart(Request $request, $productId)
    {
        $cart = new Cart();
        $cart->product_id = $productId;
        // Assuming you have authentication and the user is logged in
        $cart->user_id = auth()->id();
        $cart->save();

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeFromCart($cartId)
    {
        Cart::destroy($cartId);

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function viewCart()
    {
        // $userCart = Cart::where('user_id', auth()->id())->get();
        // return view('FrontEnd.cart', compact('userCart'));


        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        
        return view('FrontEnd.cart', compact('cartItems'));

        
    }

    public function viewabout()
    {
        
        return view('FrontEnd.about',);

        
    }

    public function viewcontact()
    {
        
        return view('FrontEnd.contact',);

        
    }

    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect('FrontEnd.cart');

    }
}
