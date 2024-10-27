<?php

namespace App\Http\Controllers;

use App\Models\payment_methods;
use Illuminate\Http\Request;

class payment_methodController extends Controller
{
    //
    function payment_methods()
    {

        $payment_methods = payment_methods::all();
        return view('dashboard.payment_methods.index', compact('payment_methods'));
    }
    function insert()
    {
        return view('dashboard.payment_methods.insert');
    }

    function Store(Request $req)
    {

        $req->validate([
            'name' => 'required | max:50 | min:3'
        ]);

        $payment_method = new payment_methods;
        $payment_method->name = $req->name;
        $payment_method->save();

        return redirect('/Dbpayment_methods');

    }
    function edit($id)
    {
        $payment_method = payment_methods::Where('id', $id / 548548)->first();
        return view('dashboard.payment_methods.edit', compact('payment_method'));
    }
    function update(Request $req, $id)
    {
        $payment_method = payment_methods::find($id);
    
        $payment_method->name = $req->name;

        $payment_method->save();

        return redirect('/Dbpayment_methods');

    }


    function delete($id)
    {
        $st = payment_methods::find($id);

        if ($st) {
            $st->delete();
            return redirect('/Dbpayment_methods');
        }
        return redirect('/Dbpayment_methods');
    }

}
