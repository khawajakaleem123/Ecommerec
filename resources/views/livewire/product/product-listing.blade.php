<div>
    <div class="row">
        <div class ="col-md-3" style="background-color: #fff;">
        
            <h2>Filter by Price</h2>

            @foreach($price_filters as $price)
                <p wire:click="filterByPrice({{$price->id}})" style="font-size: 16px; font-weight:600;">price: ${{$price->min}} - ${{$price->max}}</p>
            @endforeach


        </div>
        <div class = "col-md-9">
            <div class = "row">
                <h2>Product List   
                    <a href=" {{ route('view-cart') }}" style="background-color: orange; text-decoration:none; padding: 10px; font-size:16px; float:right;"> <i class="fas fa-shopping-cart m-2" style="color:#fff;"> </i>View Cart</a>
                </h2>
                
                @foreach($products as $product)
                    <div wire:key ="product-{{$product->id}}" class ="col-4 col-md-4 col-lg-3 m-3" style="background-color: #fff; width:30%;">
                        <label class ="client_lable mt-5 mb-5 text-center">
                            <img class="img-fluid w-50 rounded-circle" src="{{ asset($product->image)}}"/>
                            <p class="client_name_style mt-2 mb-0" style="font-size: 19px; font-weight:800;">{{$product->name}}</p>
                            <p class="client_name_style mt-2 mb-0" style="font-size: 19px; font-weight:800;">${{$product->price}}</p>
                            <div class = "mt-3"> 
                                <button wire:click="addCart({{$product->id}})" style="background-color: orange; text-decoration:none; padding: 10px; font-size:16px;"> <i class="fas fa-shopping-cart m-2" style="color:#fff;"> </i>Add to Cart</button>
                                
                            </div>
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>
