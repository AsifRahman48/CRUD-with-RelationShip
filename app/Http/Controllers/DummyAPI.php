<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DummyAPI extends Controller
{
    public function index(){
        return ['name'=>'asif','address'=>'natore'];
    }
}
