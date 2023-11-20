<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    public function checkout()
    {
        $sub_total = calculateSubTotal();
        $total = calculateTotal($sub_total, 10, 15);
        return view('product.checkout', ['total' => $total]);
    }
}
