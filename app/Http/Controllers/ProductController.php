<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data = [
            'pagename'=>'admin.products',
            'products'=>Product::paginate(10),
        ];
        return view('admin.index',$data);
    }

    public function add_product(){
        $data = [
            'pagename'=>'admin.add_product',
            'categories'=>Category::all()
        ];
        return view('admin.index',$data);
    }

    public function store(Request $request){
        //dd($request->all());
        $product = $request->validate([
            'category_id'=>'required',
            'title'=>'required|min:5',
            'description'=>'required|min:5',
            'image'=>'required|mimes:jpg,jpeg,png,gif|max:2048',
            'price'=>'required|min:0',
            'quantity'=>'required|min:1',
            'discount_price'=>'min:0',
        ]);

        $fileName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('uploads/products'), $fileName);

        $product['image'] = 'uploads/products/'.$fileName;

        //dd($request->all());
        Product::create($product);

        return redirect('products')->with('message','Product Added Successfully');
    }

    public function edit_product($id){
        $categories = Category::all();
        $product = Product::find($id);
        $category = Category::find($product->category_id);
        //dd($category->id);
        $data = [
            'pagename'=>'admin.edit_product',
            'categories'=>$categories,
            'cat'=>$category,
            'product'=>$product
        ];
        return view('admin.index',$data);
    }

    public function update(Request $request,$id){
        $request->validate([
            'category_id'=>'required',
            'title'=>'required|min:5',
            'description'=>'required|min:5',
            'image'=>'mimes:jpg,jpeg,png,gif|max:2048',
            'price'=>'required|min:0',
            'quantity'=>'required|min:1',
            'discount_price'=>'min:0',
            'status'=>'required'
        ]);

        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->status = $request->status;

        if($request->image != ''){
            $fileName = time().'.'.$request->image->extension();  

            $request->image->move(public_path('uploads/products'), $fileName);

            //code for remove old file
            if($product->image != ''  && $product->image != null){
                $file_old = public_path()."/".$product->image;
                unlink($file_old);
            }

            $product['image'] = 'uploads/products/'.$fileName;
        }
        //dd($request->all());
        $product->save();

        return redirect('products')->with('message','Product Updated Successfully');
    }

    public function delete($id){
        Product::destroy($id);

        return redirect('/products')->with('message','Product deleted successfully'); 
    }

}
