<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('CheckAge');
    // }
    public function show($id){
        return $id;
    }
    public function tong($a, $b){
        return $a + $b;
    }
}
