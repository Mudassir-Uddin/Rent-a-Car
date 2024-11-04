<?php

namespace App\Http\Controllers;

use App\Models\cars;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $cars = cars::all();
        return view('website.index',compact('cars'));
    }
}
