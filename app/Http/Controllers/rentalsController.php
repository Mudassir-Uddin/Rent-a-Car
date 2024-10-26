<?php

namespace App\Http\Controllers;

use App\Models\cars;
use App\Models\customers;
use App\Models\rentals;
use Illuminate\Http\Request;

class rentalsController extends Controller
{
    //
    function rentals(){
        
        $rentals = rentals::all();
        return view('dashboard.rentals.index',compact('rentals'));
    }
    function insert()
    {
        $CustomerId = customers::all();
        $CarId = cars::all();
        $rental = rentals::all();
        $rentals = rentals::find('rental_date' ,'rental_date' );
        return view('dashboard.rentals.insert',compact('CustomerId','CarId','rentals','rental'));
    }

    function Store(Request $req)
    {

        $req->validate([
            'customer_id' => 'required',
            'car_id' => 'required',
            'rental_date' => 'required',
            'return_date' => 'required',
            'status' => 'required',
            'total' => 'required',
        ]);

            $rental = new rentals;
            $rental->customer_id = $req->customer_id;
            $rental->car_id = $req->car_id;
            $rental->rental_date = $req->rental_date;
            $rental->return_date = $req->return_date;
            $rental->status = $req->status;
            $rental->total = $req->total;
            $rental->save();
       
        return redirect('/Dbrentals');

    }
    function edit($id)
    {
        $st =rentals::find($id);
        $CustomerId = customers::all();
        $CarId = cars::all();
        $rental = rentals::Where('id', $id/548548)->first();
        if ($st) {
            // return view('dashboard.Project-Clients.edit', compact('st','Projects','Clients'));
        }
        // return redirect('/');
        return view('dashboard.rentals.edit', compact('st','CustomerId','CarId','rental'));

    }
    function update(Request $req, $id)
    {
        $rental = rentals::find($id);
        
            $rental->customer_id = $req->customer_id;
            $rental->car_id = $req->car_id;
            $rental->rental_date = $req->rental_date;
            $rental->return_date = $req->return_date;
            $rental->status = $req->status;
            $rental->total = $req->total;
            $rental->save();

        return redirect('/Dbrentals');

   }
    

    function delete($id)
    {
        $st = rentals::find($id);
        $st->delete();
        return redirect('/Dbrentals');
    }

}
