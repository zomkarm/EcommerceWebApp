<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $data = [
            'pagename'=>'admin.orders',
            'products'=>Order::paginate(10),
        ];
        return view('admin.index',$data);
    }

}
