<?php

namespace App\Http\Livewire\Product;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductCart extends Component
{
    public $product_id;
    public $quantity = 1;
    public $sub_total;
    public $shipping = 10;
    public $tax = 15;
    public $total = 0;
    
    public function render()
    {
        $cartProducts = Cart::with('product')->get();
        $this->sub_total = calculateSubTotal();
        $this->total = calculateTotal($this->sub_total, $this->shipping, $this->tax);
        return view('livewire.product.product-cart', compact('cartProducts'));
    }

    public function decrement($id)
    {
        $cart = Cart::find($id);
        
        if($cart->quantity > 1)
        {
            Cart::where('id', $id)->update([
                'quantity' => $cart->quantity-1,
            ]);
        }
        else
        {

            $cart->delete();
        }
        //// call function that calculate  sub total amount
        $this->sub_total = calculateSubTotal();
        $this->total = calculateTotal($this->sub_total, $this->shipping, $this->tax);

    }

    public function increment($id)
    {
        $cart = Cart::find($id);
        Cart::where('id', $id)->update([
            'quantity' => $cart->quantity+1,
        ]);

        //// call function that calculate  sub total amount
        $this->sub_total = calculateSubTotal();
        $this->total = calculateTotal($this->sub_total, $this->shipping, $this->tax);

    }

    // public function calculateSubTotal()
    // {
    //     $user = Auth::user();
    //     $cart_products = Cart::with('product')->where('user_id', $user->id)->get();
    //     $this->sub_total = 0;
    //     foreach($cart_products as $cart_product)
    //     {
    //         $product_total= $cart_product->product->price * $cart_product->quantity;
    //         $this->sub_total = $this->sub_total + $product_total;
    //     }
    //     $this->total = $this->sub_total + $this->shipping + $this->tax;
    // }
}
