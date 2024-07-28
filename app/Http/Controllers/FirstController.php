<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
class FirstController extends Controller
{
    public function MainPage() {
        
        $categories = category::all();
        
        
        return view('welcome',['categories' => $categories]);
    }

    public function Reviews() {

        $reviews= Review::all();
       
        return view('reviews',['reviews' => $reviews]);
    }
    public function StoreReview( Request $request) {

        $request->validate([
            'name' => ['required','max:10'],
            'phone' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'masseg' => 'required'
        ]);
        $newReview = new Review();
        $newReview -> name = $request -> name;
        $newReview -> phone = $request -> phone;
        $newReview -> email = $request -> email;
        $newReview ->subject = $request -> subject;
        $newReview -> masseg = $request -> masseg;
        $newReview->save();
       
        return redirect('/reviews');
    }



    public function GetCategoryProducts($catid = null) {
        if($catid){
        $products =Product::where('category_id',$catid)->paginate(3);
        return view('product',['products'=> $products]);
        }
        else{
            $products =Product::paginate(6);
            return view('product',['products'=> $products]);
        }
       
    }
    public function GetAllCategoryWithProducts() {
        $categories = category::all();
        $products = product::all();
        
        return view('category',['products'=>$products,'categories'=> $categories]);
    }
    


}
