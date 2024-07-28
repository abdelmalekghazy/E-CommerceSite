


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
@extends('layouts.admin')

@section('content')
<div class="container mt-10 mb-10"  style="margin-bottom: 200px;margin-top:100px">
    <div><a href="/addproduct" class="btn btn-primary mt-5 mb-5">
        <i class="fas fa-plus"></i>
        add product</a></div>
    
<table id="myTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>image</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
            
        <tr>
            <td>{{$item -> id }}</td>
            <td>{{$item -> name}}</td>
            <td>{{$item -> price}}</td>
            <td>{{$item -> quantity}}</td>
            <td><img src="{{$item -> imagepath}}" width="100" height="100"></td>
            <td>
                <a href="/removeproduct/{{ $item->id }}" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                    Dellet on cart</a>
                <a href="/editproduct/{{ $item->id }}" class="btn btn-primary">
                    <i class="fas fa-pen"></i>
                    Edit product</a>
                <a href="/AddProductImages/{{ $item->id }}" class="btn btn-dark">
                    <i class="fas fa-image"></i>
                     Edit product img</a>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>
</div>
@endsection

   
<script>
    $(document).ready(function () {
        let table = new DataTable('#myTable');
    });
</script>

