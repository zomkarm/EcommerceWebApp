<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('home.userpage');
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
