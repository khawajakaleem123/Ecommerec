<?php

namespace App\Http\Livewire\Product;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\PriceFilter;
use Illuminate\Support\Facades\Auth;

class ProductListing extends Component
{
    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->min_price = null;
        $this->max_price = null;
    }


    public function render()
    {
        $products = $this->min_price  ? Product::PriceSearch($this->min_price, $this->max_price)->where('cart', NULL)->paginate(6) : Product::where('cart', NULL)->paginate(6);
        $price_filters = PriceFilter::all();
        return view('livewire.product.product-listing',compact('products', 'price_filters'));
    }

    public function filterByPrice($id)
    {
        $filter_price = PriceFilter::find($id);
        $this->min_price = $filter_price->min;
        $this->max_price = $filter_price->max;
    }

    public function addCart($product_id)
    {
        $user = Auth::user();
        Product::where('id', $product_id)->update([
            'cart' => 1,
        ]);

        Cart::create([
            "product_id"    => $product_id,
            'quantity'      => 1,
            'user_id'       => $user->id,
            'created_at' => Carbon::now(),
        ]);
    }
}
