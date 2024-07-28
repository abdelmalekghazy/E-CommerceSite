@extends('layouts.master2')

@section('content')
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="checkout-accordion-wrap">

                    @foreach ($orders as $item)
                    <div class="accordion mt-2 mb-2" id="accordionExample">
                        <div class="card single-accordion">
                          <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Orders
                              </button>
                            </h5>
                          </div>
  
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                              <div class="billing-address-form" >
                                  <form >
                                      <p><input type="tel"  value="{{$item -> created_at}}" required  id="email" name="email" placeholder="Email"></p>
                                      <p><input type="text" value="{{$item -> name}}" required id="name" name="name" placeholder="Name"></p>
                                      <p><input type="email"  value="{{$item -> email}}" required  id="email" name="email" placeholder="Email"></p>
                                      <p><input type="text"  value="{{$item -> address}}" required  id="address" name="address" placeholder="Address"></p>
                                      <p><input type="tel"  value="{{$item -> phone}}" required  id="phone" name="phone" placeholder="Phone"></p>
                                      <p><textarea name="note"   id="note" cols="30" rows="10" placeholder="Say Something">{{$item -> note}}</textarea></p>
                                  
                                    </form>
  

                                    <div class="row">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="cart-table-wrap">
                                                <table class="cart-table">
                                                    <thead class="cart-table-head">
                                                        <tr class="table-head-row">
                                                           
                                                            <th class="product-image">Product Image</th>
                                                            <th class="product-name">Name</th>
                                                            <th class="product-price">Price</th>
                                                            <th class="product-quantity">Quantity</th>
                                                            <th class="product-total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       @foreach ( $item->orderDetail as $detail)
                                                       <tr class="table-body-row">
                                                       
                                                        <td class="product-image"><img src="{{asset($detail ->product -> imagepath)}}" alt=""></td>
                                                        <td class="product-name">
                                                            <a href="/single-product/{{$detail->product ->id}}">
                                                               {{$detail->product->name }}
                                                            </a>
                                                         </td>
                                                         
                                                        <td class="product-price">{{$detail ->product ->price}} $</td>
                                                        <td class="product-quantity">{{$detail ->quantity}}</td>
                                                        <td class="product-total">{{number_format($detail ->product ->price * $detail ->quantity, 2);}} $</td></tr> 
                                                    </tr>
                                                       @endforeach
                                               
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-4">
                                            <div class="total-section">
                                                <table class="total-table">
                                                    <thead class="total-table-head">
                                                        <tr class="table-total-row">
                                                            <th>Total</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        <tr class="total-data">
                                                            <td><strong>Total: </strong></td>
                                                            <td>
                                                                {{$item->orderDetail->sum(function ($x){
                                                                    return $x->product->price * $x -> quantity;});}} $ 
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                               
                                            </div>
                                    
                                            
                                        </div>
                                    </div>
                              </div>
                            </div>
                          </div>
                        </div>
                       
                        
                      </div>
                    @endforeach
                    

                </div>
            </div>
            <div class="col-lg-12 mt-5"> 
                
                                                       
               
               
            </div>
         
        </div>
    </div>
</div>

@endsection 


