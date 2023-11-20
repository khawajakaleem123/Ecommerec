<div>
    <h2>Cart View
    <a href="{{ route('product.index') }}" style="background-color: orange; text-decoration:none; padding: 10px; font-size:16px; float:right;"> </i>Products</a>

    </h2>
    <div class ="row"> 
 
        <div class = "col-lg-8">
            <div class ="row">
                @foreach($cartProducts as $cart_product)
                    <div class = "col-lg-12">
                        
                        <img class="img-fluid w-50 rounded-circle" src="{{$cart_product->product->image}}"/>
                        <div  style="display: inline-block; margin-left:50px;">
                            <p style="font-size: 20px; font-weight:800;">{{$cart_product->product->name}}</p>
                            <p style="font-size: 20px; font-weight:800;">${{$cart_product->product->price}}</p>
                            <button wire:key ="{{$cart_product->id}}-dec" wire:click="decrement({{$cart_product->id}})" class="btn btn-sm btn-outline-secondary">-</button>
                                <span class="mx-2"> {{$cart_product->quantity}}</span>
                            <button wire:key ="{{$cart_product->id}}-incre" wire:click="increment({{$cart_product->id}})" class="btn btn-sm" style="background-color: orange;">+</button>
                        </div>
                        <hr>
                    </div>
                    
                @endforeach
            </div>
        </div>

        <div class = "col-lg-4" style="display:inline-block">
            <div class = "row">
                <div class = "col-lg-12 summary">
                    <h3 class = "mt-2">Summary</h3>
                </div>
                <div class = "col-lg-6 summary">
                    <p>Sub Total</p>
                </div>
                <div class = "col-lg-6 summary"> 
                @if($sub_total > 0)

                   ${{$sub_total}} 
                @else
                   No Items
                @endif
                </div>
                @if($sub_total > 0)
                    <div class = "col-lg-6 summary">
                        <p>Shipping</p>
                    </div>
                    <div class = "col-lg-6 summary"> 
                        ${{$shipping}}
                    </div>
                    <div class = "col-lg-6 summary">
                        <p>Tax</p>
                    </div>

                    <div class = "col-lg-6 summary"> 
                        ${{$tax}}
                    </div>
                
                    <hr>
                    <div class = "col-lg-6 summary">
                        <p>Total</p>
                    </div>
                    <div class = "col-lg-6 summary"> 
                        ${{$total}}
                    </div>
                <hr>
                <a href="{{ route('checkout') }}" style="background-color: orange; text-decoration:none; padding: 10px; font-size:16px; float:right;"> </i>Proceed to Buy</a>
            @endif
            </div>

        </div>
    </div>
</div>
