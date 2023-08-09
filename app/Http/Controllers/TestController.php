<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){
        
        /*$products = DB::connection('mySqlOne')->table('dummy_table')->pluck('mapkey','id');
        dd($products);*/
    }
}
