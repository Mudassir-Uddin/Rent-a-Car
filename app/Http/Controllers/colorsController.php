<?php

namespace App\Http\Controllers;

use App\Models\color;
use App\Models\colors;
use Illuminate\Http\Request;

class colorsController extends Controller
{
    //
     function colors(){
        
        $colors = color::all();
        return view('dashboard.colors.index',compact('colors'));
    }
    function insert()
    {
        return view('dashboard.colors.insert');
    }

    function Store(Request $req)
    {

        $req->validate([
            'name' => 'required | max:50 | min:3'
        ]);
        
          $color = new color    ;
            $color->name = $req->name;
            $color->save();
       
        return redirect('/Dbcolors');

    }
    function edit($id)
    {
        $color = color::Where('id', $id/548548)->first();
        return view('dashboard.colors.edit', compact('color'));
    }
    function update(Request $req, $id)
    {
        $color = color::find($id);
        
            $color->name = $req->name;
        
            $color->save();

            return redirect('/Dbcolors');
    }

    function delete($id)
    {
        $st = color::find($id);

        if ($st) {
            $st->delete();
            return redirect('/Dbcolors');
        }
        return redirect('/Dbcolors');
    }
}
