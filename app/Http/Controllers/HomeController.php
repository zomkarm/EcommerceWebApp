<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $data['categories'] = Category::all();
        return view('home.index',$data);
    }

    public function get_home_data($view_data){
        $view_data['categories'] = Category::all();
        return $view_data;
    }

    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            $view = "admin.index";
            $data = [
                'pagename'=>'admin.dashboard'
            ];
        }else{
            $view = "dashboard";
            $data = [
                'pagename'=>'dashboard'
            ];
        }
        return view($view,$data);
    }

    public function blogs(){
        $data = [
            'pagename'=>'home.blogs'
        ];
        $data = $this->get_home_data($data);
        return view('home.index',$data);
    }

    public function contact(){
        $data = [
            'pagename'=>'home.contact'
        ];
        $data = $this->get_home_data($data);
        return view('home.index',$data);
    }

    public function products(){
        $data = [
            'pagename'=>'home.products'
        ];
        $data = $this->get_home_data($data);
        return view('home.index',$data);
    }
}
