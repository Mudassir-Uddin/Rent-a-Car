<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\brands;
use App\Models\cars;
use App\Models\color;
use App\Models\colors;
use App\Models\models;
use App\Models\transmissions;
use Illuminate\Http\Request;

class carsController extends Controller
{
    //
    function cars()
    {
        $cars = cars::all();
        return view('dashboard.cars.index', compact('cars'));
    }
    function insert()
    {
        $BrandId = brand::all();
        $ColorId = color::all();
        $ModelId = models::all();
        $TransmissionId = transmissions::all();
        return view('dashboard.cars.insert',compact('BrandId','ColorId','ModelId','TransmissionId'));
    }

    function Store(Request $req)
    {

        $req->validate([
            'brand_id' => 'required',
            'img' => 'required | image | mimes:png,jpg',
            'date' => 'required ',
            // 'registration_number' => 'required|registration_number|unique:cars,registration_number',
            'daily_rate' => 'required | max:50 | min:3',
        ]);

        $img = $req->img;
        $imgname = $img->getClientOriginalName();
        $imgname = time() . "__" . $imgname;
        $img->move("images/Carsimages/", $imgname);


        $car = new cars;
        $car->brand_id = $req->brand_id;
        $car->Model = $req->Model;
        $car->img = "images/Carsimages/$imgname";
        $car->date = $req->date;
        $car->registration_number = $req->registration_number;
        $car->color_id = $req->color_id;
        $car->transmission_id = $req->transmission_id;
        $car->daily_rate = $req->daily_rate;
        $car->status = $req->status;
        $car->save();

        return redirect('/Dbcars');

    }
    function edit($id)
    {
        $BrandId = brand::all();
        $ColorId = color::all();
        $ModelId = models::all();
        $TransmissionId = transmissions::all();
        $car = cars::Where('id', $id / 548548)->first();
        return view('dashboard.cars.edit',compact('car','BrandId','ColorId','ModelId','TransmissionId'));
    }
    function update(Request $req, $id)
    {
        $car = cars::find($id);
        $imgname = $car->img;
        if ($req->hasfile('img')) {

            $img = $req->img;
            $imgname = $img->getClientOriginalName();
            $imgname = time() . "__" . $imgname;
            $img->move("images/Carsimages/", $imgname);
            $imgname = "/images/Carsimages/" . $imgname;
            if ($car->img) {
                if (file_exists(public_path($car->img))) {
                    unlink(public_path($car->img));
                }
            }
        }
        $car->brand_id = $req->brand_id;
        // $car->make = $req->make;
        $car->Model = $req->Model;
        $car->img = $imgname;
        $car->date = $req->date;
        $car->registration_number = $req->registration_number;
        $car->color_id = $req->color_id;
        $car->daily_rate = $req->daily_rate;
        $car->status = $req->status;

        $car->save();

        return redirect('/Dbcars');

    }


    function delete($id)
    {
        $st = cars::find($id);

        if ($st) {
            if ($st->img) {
                if (file_exists(public_path($st->img))) {
                    unlink(public_path($st->img));
                }
            }
            $st->delete();
            return redirect('/Dbcars');
        }
        return redirect('/Dbcars');
    }

}
