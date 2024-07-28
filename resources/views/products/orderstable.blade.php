<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
@extends('layouts.admin')

@section('content')
    <div class="container mt-10 mb-10" style="margin-bottom: 200px;margin-top:100px">
        <div style="margin-top: 200px"></div>

        <table id="myTable" class="display">
            <thead>
                <tr>
                   
                    

                    <th>customer name</th>
                    <th>phone</th>
                    <th>product Name</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>sent</th>

                </tr>
            </thead>
            
            @foreach ($orders as $item)
                <tbody>
                    @foreach ( $item->orderDetail as $detail)
                        <tr>
                            <td>{{$item -> name}}</td>
                            <td class="product-quantity">{{$item -> phone}}</td>
                            <td class="product-name">
                                
                                {{$detail->product->name }}
                               
                            </td>
                            
                           
                           
                            
                            <td class="product-total">{{$detail ->quantity}}</td>
                           
                           
                            <td>{{$detail ->product ->price}} $</td>
                           
                            <td><input type="checkbox"></td>
                           
                        </tr>
                        </tr>
                   
                        @endforeach
                </tbody>
                @endforeach
        </table>
    </div>
@endsection


<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable');
    });
</script>
