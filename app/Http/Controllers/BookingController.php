<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\customers;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    //______________________ Booking  ______________
    function Booking($id)
    {
        $productId = $id;
        return view('website.Booking.Booking', compact('productId'));
    }

    public function BookingPost($productId, Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'address' => 'required|string|max:255'
        ]);

        $CurrentUserId = Session::get(key: "id");

        $book = new Booking();
        $book->user_id = $CurrentUserId;
        $book->car_id = $productId;
        $book->name = $req->name;
        $book->email = $req->email;
        $book->phone = $req->phone;
        $book->address = $req->address;
        $book->status = 1;

        $book->booking_status = 1;
        $book->save();
        // Insert into Customer table
        $customer = new customers();
        $customer->name = $req->name;
        $customer->email = $req->email;
        $customer->phone = $req->phone;
        $customer->driver_license_number = $req->driver_license_number ?? null; // Optional field
        $customer->address = $req->address;
        $customer->save();


        return redirect('/Booking_Details');
    }

    function Booking_Details()
    {
        $CurrentUserId = Session::get("id");

        $user = Users::find($CurrentUserId);


        $appoin = Booking::where('user_id', $CurrentUserId)->with('user', 'cars')->get();
        // dd($appoin);
        $adminbooking = Booking::all();

        $role = $user->role;
        return view('dashboard.booking.BookingDetails', compact('appoin', 'role', 'adminbooking'));


        // if($role == 2){
        //     // $appoin = Booking::where('user_id',$user->id)->get();
        //     // $appoin = DB::select('select * from project_service s inner join project_product p on p.id = s.id where role = ? and user_id = ?', [2, $id]);
        //     // dd($appoin);
        //     return view('website.Booking.BookingDetails',compact('appoin','role'));
        // }
        // if($role == 1){
        //     // $appoin = Booking::where('car_id',$user->user_id)->get();
        //     // dd($appoin);
        //     $appoin = Booking::all();
        //     return view('website.Booking.BookingDetails',compact('appoin','role'));
        // }
        // if(){

        // }


    }


    function Booking_Confirm(Request $req, $id)
    {
        // dd($req->confirmValue , $id);
        $appoint = Booking::find($id);
        $appoint->booking_status = $req->confirmValue;
        $appoint->save();
        return redirect('/Booking_Details');
    }

}
