@extends('layouts.admin')
@section('content')
<div style="margin-top: 150px"></div>
    <div class="container mt-5 mb-5" style="text-align: center">



        <form action="/storeProductImage" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5 mb-5">
                <div class="col-9 pt-3" >
                    <input type="hidden" style="width: 100%"  name="product_id" id="product_id" value="{{ $productid }}">
                    <input  class="form-control"  type="file" name="photo" id="photo">
                </div>
                <div class="col-3">
                    <input type="submit" class="w-100" value="save">
                </div>


                <span class="text-danger">
                    @error('photo')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        </form>




        <div class="row">
            @foreach ($productImages as $item)
                <div class="col-4">
                    <img class="m-2" src="{{ asset($item->imagepath) }}" width="350" height="350" alt="">
                    <a href="/Removeproductphoto/{{ $item->id }}" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        Dellet photo
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
