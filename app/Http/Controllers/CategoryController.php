<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function add_category(){
        $data = [
            'pagename'=>'admin.add_category'
        ];
        return view('admin.index',$data);
    }

    public function view_category(){
        $data = [
            'pagename'=>'admin.category'
        ];
        $data['categories'] = Category::simplePaginate(10);
        return view('admin.index',$data);
    }

    public function store(Request $request){

        $category = $request->validate([
            'category_name'=>'required|min:5',
            'category_img'=>'required|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $fileName = time().'.'.$request->category_img->extension();  

        $request->category_img->move(public_path('uploads/categories'), $fileName);

        $category['category_img'] = 'uploads/categories/'.$fileName;

        //dd($request->all());
        Category::create($category);

        return redirect('/view_category')->with('message','Category added successfully');
    }

    public function edit_category($id){
        $data = [
            'pagename'=>'admin.edit_category'
        ];
        $data['category'] = Category::find($id);
        return view('admin.index',$data);
    }

    public function update(Request $request,$id){
        $request->validate([
            'category_name'=>'required|min:5',
        ]);
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->status = $request->status;   
        if($request->category_img != ''){
            $fileName = time().'.'.$request->category_img->extension();  

            $request->category_img->move(public_path('uploads/categories'), $fileName);
            //code for remove old file
            if($category->category_img != ''  && $category->category_img != null){
                $file_old = public_path().$category->category_img;
                unlink($file_old);
            }

            $category->category_img = 'uploads/categories/'. $fileName;
        }

        //dd($request->all());
        $category->save();

        return redirect('/view_category')->with('message','Category Updated successfully');
    }

    public function delete($id){
        Category::destroy($id);

        return redirect('/view_category')->with('message','Category deleted successfully'); 
    }
}
