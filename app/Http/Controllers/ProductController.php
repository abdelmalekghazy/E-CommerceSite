<?php
namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Category;
use App\Models\ProductPhoto;
class ProductController extends Controller
{
    public function AddProduct() {
     
            $allcategories =Category::all();
       
        return view('products.AddProduct',['allcategories' => $allcategories]);
    }

    public function ProductsTable(){
        $products = product::all();
        return view('Products.ProductsTable',['products' => $products]);
    }

    public function showProduct($productid){
        
        $product = Product::with('Category', 'ProductPhotos')->find($productid);
    
        
        if (!$product) {
            
            return abort("403","plase enter prouduct id"); 
        }
    
        $relatedProducts = Product::where('category_id', $product->category_id ?? null)
            ->where('id', '!=', $productid)
            ->inRandomOrder()
            ->limit(3)
            ->get();
    
        return view('Products.showProduct', ['product' => $product, 'relatedProducts' => $relatedProducts]);
    }
    

    public function AddProductImages($productid){
        $products = Product::find($productid);
        $productImages = ProductPhoto::where('product_id',$productid)->get();
        return view('products.AddProductImage',['products' => $products ,'productImages'=> $productImages,'productid' => $productid]);
    }

    
    public function Removeproductphoto($imageid = null) {
        if($imageid != null){
            $photo = ProductPhoto::find($imageid);
            $photo -> delete();
            return redirect('/ProductsTable'); 
            }     
            else{
                abort("403","plase enter image in the id");
            }
        }



        public function storeProductImage(Request $request){
            $request->validate([            
                'product_id' => 'required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'
            ]);
   
             $photo  = new ProductPhoto();
             $photo -> product_id = $request -> product_id;
            
             if($request -> has('photo')){
                $path= $request -> photo -> move('uploads', 
                Str::uuid()->toString().'-'.$request->photo->getClientOriginalName());
               
                $photo -> imagepath =$path;
            }
                
            $photo ->save();   
           return redirect('/ProductsTable');
        }
        
    


    public function RemoveProducts($productid = null) {
        if($productid != null){

            $currentProduct = Product::find($productid);
            $currentProduct -> delete();
            return redirect('/ProductsTable'); 

           
            }
            
            else{
                abort("403","plase enter prouduct id");
            }
    }


    public function EditProduct($productid = null) {
        if($productid != null){
            $currentProduct = Product::find($productid);
            if( $currentProduct == null){
                abort("403","can't find this product");
            }
            $allcategories =Category::all();
            return view('products.editproduct',["product"=>$currentProduct,'allcategories' => $allcategories]);
        }
        else{
            return redirect('/addproduct');
        }
        
    }


    public function StoreProduct(Request $request){
        $request->validate([
            'name' => ['required','max:10'],
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
       
        if($request -> id){
           
            $currentProduct = Product::find($request -> id);
            $currentProduct ->name = $request -> name;
            $currentProduct ->price = $request -> price;
            $currentProduct ->quantity = $request -> quantity;
            $currentProduct ->description = $request -> description;
            $currentProduct ->category_id = $request -> category_id;
            if($request -> has('photo')){
                $path= $request -> photo -> move('uploads', 
                Str::uuid()->toString().'-'.$request->photo->getClientOriginalName());
                $currentProduct -> imagepath = $path;
            }
            
            $currentProduct->save();
            return redirect('/products');
        }
        
        

        else{

           
        
       $newproduct = new product();
       $newproduct -> name = $request -> name;
       $newproduct -> price = $request -> price;
       $newproduct ->quantity = $request -> quantity;
       $newproduct -> description = $request -> description;
       $newproduct -> category_id =  $request -> category_id;
       $path = '';

       if($request -> has('photo')){
       $path= $request -> photo -> move('uploads', 
       Str::uuid()->toString().'-'.$request->photo->getClientOriginalName());
       
         } 
       $newproduct ->imagepath =$path;
       $newproduct->save();
       return redirect('/');
    }
    }

    public function Search(Request $request){
        $products = Product::where('name', 'like' ,'%'.$request -> searchkey.'%')->paginate(6);
        return view('product',['products' => $products]);
    }





}
