@extends('layouts.master2')

@section('content')

<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        
                        @foreach ($categories as $item)
                            <li data-filter="._{{$item->id}}">{{$item -> name}}</li>
                        @endforeach
                        <li class="active" data-filter="*">All</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists" >
            @foreach ($products as $item)
            <div class="col-lg-4 col-md-6 text-center _{{$item-> category_id}}" >
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="/single-product/{{$item ->id}}" ><img src="{{$item -> imagepath}}" alt=""
                            style="max-height: 250px; min-height: 250px"></a>
                    </div>
                    <h3>{{$item -> name}}</h3>
                    <p class="product-price"><span>price:</span>{{$item -> price}}</p>
                   
                  
                    <a href="/addproducttocart/{{ $item->id }}" class="cart-btn">
                        <i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            @endforeach
        </div>

       
    </div>
</div>

@endsection