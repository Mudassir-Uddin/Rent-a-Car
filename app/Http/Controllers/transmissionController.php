<?php

namespace App\Http\Controllers;

use App\Models\transmissions;
use Illuminate\Http\Request;

class transmissionController extends Controller
{
    //
    function transmissions(){
        
        $transmissions = transmissions::all();
        return view('dashboard.transmissions.index',compact('transmissions'));
    }
    function insert()
    {
        return view('dashboard.transmissions.insert');
    }

    function Store(Request $req)
    {

        $req->validate([
            'name' => 'required | max:50 | min:3'
        ]);
        
          $transmission = new transmissions;
            $transmission->name = $req->name;
            $transmission->save();
       
        return redirect('/Dbtransmissions');

    }
    function edit($id)
    {
        $transmission = transmissions::Where('id', $id/548548)->first();
        return view('dashboard.transmissions.edit', compact('transmission'));
    }
    function update(Request $req, $id)
    {
        $transmission = transmissions::find($id);
        
            $transmission->name = $req->name;
        
            $transmission->save();

            return redirect('/Dbtransmissions');
    }

    function delete($id)
    {
        $st = transmissions::find($id);

        if ($st) {
            $st->delete();
            return redirect('/Dbtransmissions');
        }
        return redirect('/Dbtransmissions');
    }

}
