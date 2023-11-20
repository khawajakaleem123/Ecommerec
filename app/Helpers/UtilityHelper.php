<?php 

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

function calculateSubTotal()
{
    $user = Auth::user();
    $cart_products = Cart::with('product')->where('user_id', $user->id)->get();
    $sub_total = 0;
    foreach($cart_products as $cart_product)
    {
        $product_total= $cart_product->product->price * $cart_product->quantity;
        $sub_total = $sub_total + $product_total;
    }
    return $sub_total;
}

function calculateTotal($sub_total, $shipping, $tax)
{
    return $sub_total + $shipping + $tax;
}
?>