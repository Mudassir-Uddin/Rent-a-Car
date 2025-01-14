<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\cars;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get all brands
        $brands = brand::all();
    
        // Check if a brand is selected
        $selectedBrandId = $request->query('brand');
    
        // If a brand is selected, get cars for that brand; otherwise, fetch all cars
        $cars = $selectedBrandId 
            ? cars::where('brand_id', $selectedBrandId)->paginate(8)
            : cars::paginate(8);
    
        // Pass data to the view
        return view('website.index', compact('brands', 'cars', 'selectedBrandId'));
    }
    
    public function cars(Request $request)
    {
        // Get all brands
        $brands = brand::all();
    
        // Check if a brand is selected
        $selectedBrandId = $request->query('brand');
    
        // If a brand is selected, get cars for that brand; otherwise, fetch all cars
        $cars = $selectedBrandId 
            ? cars::where('brand_id', $selectedBrandId)->paginate(8) // Show 6 cars per page
            : cars::paginate(8);
    
        // Pass data to the view
        return view('website.Cars.Car', compact('brands', 'cars', 'selectedBrandId'));
    }
    




    //
    // public function index(){
    //     $cars = cars::all();
    //     return view('website.index',compact('cars'));
    // }

    // function brandscars($id){
    //     $cars = brand::all();
    //     $car = cars::where("brand_id",$id)->latest()->paginate(8);
    //     // $products = Product::paginate(2); // 10 items per page

    //     return view('website.index', compact('car','cars'));
    // }

}
