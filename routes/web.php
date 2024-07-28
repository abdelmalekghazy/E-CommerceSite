<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\cartController;

use App\Models\category;
use App\Models\product;
use App\Models\Review;
use App\Models\Cart;
use Illuminate\Http\Request;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[FirstController::class , 'MainPage'] );

Route::get('/products/{catid?}',[FirstController::class , 'GetCategoryProducts'] );

Route::get('/category',[FirstController::class , 'GetAllCategoryWithProducts']  );
/**admin routes */

Route::get('/addproduct',[ProductController::class , 'AddProduct'])->middleware('checkrole:admin,salesmen');

Route::get('/removeproduct/{productid?}',[ProductController::class , 'RemoveProducts'] )->middleware('checkrole:admin,salesmen');



Route::get('/editproduct/{productid?}',[ProductController::class , 'EditProduct'] )->middleware('checkrole:admin,salesmen');

Route::get('/AddProductImages/{productid}',[ProductController::class , 'AddProductImages'])->middleware('checkrole:admin,salesmen');

Route::get('/Removeproductphoto/{imageid?}',[ProductController::class , 'Removeproductphoto'] )->middleware('checkrole:admin,salesmen');



Route::get('/ProductsTable',[ProductController::class , 'ProductsTable'])->middleware('checkrole:admin,salesmen');



Route::get('/orderstable',[CartController::class , 'orderstable'])->middleware('checkrole:admin,salesmen');


/**use routes */ 



Route::get('/reviews',[FirstController::class , 'Reviews']);

Route::post('/StoreReview',[FirstController::class , 'StoreReview']);

Route::post('/storeproduct',[ProductController::class , 'StoreProduct']);


Route::post('/search',[ProductController::class , 'Search']);


Route::get('/single-product/{productid}',[ProductController::class , 'showProduct']);



Route::post('storeProductImage',[ProductController::class,'storeProductImage']);


Route::get('/cart',[CartController::class , 'cart'])->middleware('auth');

Route::get('/Completeorder',[CartController::class , 'Completeorder'])->middleware('auth');

Route::get('/previousorder',[CartController::class , 'previousorder'])->middleware('auth');

Route::post('/StoreOrder',[CartController::class , 'StoreOrder'])->middleware('auth');




Route::get('/deletecartitem/{cartid}',function($cartid){
    Cart::find($cartid)->delete();
    return redirect('/cart');
});
Route::get('/addproducttocart/{productid}',[CartController::class ,'addproducttocart'])->middleware('auth');

Route::get('/oredersdetails',[CartController::class , 'oredersdetails'])->middleware('auth');
