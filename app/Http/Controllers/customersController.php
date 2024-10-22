<?php

namespace App\Http\Controllers;

use App\Models\customers;
use Illuminate\Http\Request;

class customersController extends Controller
{
    //
    function customers(){
        
        $customers = customers::all();
        return view('dashboard.customers.index',compact('customers'));
    }
    function insert()
    {
        return view('dashboard.customers.insert');
    }

    function Store(Request $req)
    {

        $req->validate([
            'name' => 'required | max:50 | min:3',
            'email' => 'required|email|unique:customers,email'
        ]);

            $customer = new customers;
            $customer->name = $req->name;
            $customer->email = $req->email;
            $customer->phone = $req->phone;
            $customer->driver_license_number = $req->driver_license_number;
            $customer->address = $req->address;
            $customer->save();
       
        return redirect('/Dbcustomers');

    }
    function edit($id)
    {
        $customer = customers::Where('id', $id/548548)->first();
        return view('dashboard.customers.edit', compact('customer'));
    }
    function update(Request $req, $id)
    {
        $customer = customers::find($id);
        $imgname = $customer->img;
        if ($req->hasfile('img')) {
            
            $img = $req->img;
            $imgname = $img->getClientOriginalName();
            $imgname = time() . "__" . $imgname;
            $img->move("images/customerimages/", $imgname);
            $imgname = "/images/customerimages/".$imgname;
            if($customer->img){
                if(file_exists(public_path($customer->img))){
                    unlink(public_path($customer->img));
                }
            }
        }
            $customer->name = $req->name;
            $customer->img = $imgname;
            $customer->email = $req->email;
            $customer->phone = $req->phone;
            $customer->driver_license_number = $req->driver_license_number;
            $customer->address = $req->address;
        
            $customer->save();

            return redirect('/Dbcustomers');

        }
    

    function delete($id)
    {
        $st = customers::find($id);

        if ($st) {
            if($st->img){
                if(file_exists(public_path($st->img))){
                    unlink(public_path($st->img));
                }
            }
            $st->delete();
            return redirect('/Dbcustomers');
        }
        return redirect('/Dbcustomers');
    }

}
