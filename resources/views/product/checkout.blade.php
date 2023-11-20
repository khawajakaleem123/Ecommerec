@extends('layouts.app')
@section('content')

    <div class="container" style="background-color: whitesmoke;">
    <h3>Checkout Order Summary
    <a href="{{ route('view-cart') }}" style="background-color: orange; text-decoration:none; padding: 10px; font-size:16px; float:right;"> </i>Proceed to Buy</a>


    </h3>
    <p>Items:     ${{$total}}</p>
    </div>
<script>
     
</script>
@endsection
