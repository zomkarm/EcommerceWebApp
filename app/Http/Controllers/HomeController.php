<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $data['categories'] = Category::all();
        return view('home.userpage',$data);
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
}
