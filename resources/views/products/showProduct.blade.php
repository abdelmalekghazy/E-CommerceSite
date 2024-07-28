@extends('layouts.master2')

@section('content')
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img" >
                    <img src="{{asset($product ->imagepath)}}" style="height:400px; width:400px" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3>{{$product ->name}}</h3>
                    
                    
                    <p>{{$product ->description}}</p>
                    <h3 class="product-price"> {{ $product->price }} $ </h3>
                    <div class="single-product-form">
                        
                        <a href="/addproducttocart/{{$product ->id}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        
                    </div>
                  
                 
                </div>
            </div>
        </div>
    </div>
</div>



@endsection 