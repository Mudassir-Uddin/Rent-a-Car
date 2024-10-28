<?php

namespace App\Http\Controllers;

use App\Models\payment_methods;
use App\Models\payments;
use App\Models\rentals;
use Illuminate\Http\Request;

class paymentsController extends Controller
{
    //
    function payments(){
        
        $payments = payments::all();
        return view('dashboard.payments.index',compact('payments'));
    }
    function insert()
    {
        $PM_id = payment_methods::all();
        $RentalId = rentals::all();
        $payment = payments::all();
        return view('dashboard.payments.insert',compact('PM_id','RentalId','payment'));
    }

    function Store(Request $req)
    {

        $req->validate([
            'rental_id' => 'required',
            'amount' => 'required',
            'payment_method_id' => 'required'
        ]);

            $payment = new payments;
            $payment->rental_id = $req->rental_id;
            $payment->amount = $req->amount;
            $payment->payment_method_id = $req->payment_method_id;
            $payment->save();
       
        return redirect('/Dbpayments');

    }
    function edit($id)
    {
        $st =payments::find($id);
        $PM_id = payment_methods::all();
        $RentalId = rentals::all();
        $payment = payments::Where('id', $id/548548)->first();
        if ($st) {
            // return view('dashboard.Project-Clients.edit', compact('st','Projects','Clients'));
        }
        // return redirect('/');
        return view('dashboard.payments.edit', compact('st','PM_id','RentalId','payment'));

    }
    function update(Request $req, $id)
    {
        $payment = payments::find($id);
        
        $payment->rental_id = $req->rental_id;
        $payment->amount = $req->amount;
        $payment->payment_method_id = $req->payment_method_id;
            $payment->save();

        return redirect('/Dbpayments');

   }
    

    function delete($id)
    {
        $st = payments::find($id);
        $st->delete();
        return redirect('/Dbpayments');
    }


}
