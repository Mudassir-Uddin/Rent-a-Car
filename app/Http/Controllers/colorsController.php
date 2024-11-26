<?php

namespace App\Http\Controllers;

use App\Models\colors;
use Illuminate\Http\Request;

class colorsController extends Controller
{
    //
     function colors(){
        
        $colors = colors::all();
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
        
          $color = new colors;
            $color->name = $req->name;
            $color->save();
       
        return redirect('/Dbcolors');

    }
    function edit($id)
    {
        $color = colors::Where('id', $id/548548)->first();
        return view('dashboard.colors.edit', compact('color'));
    }
    function update(Request $req, $id)
    {
        $color = colors::find($id);
        
            $color->name = $req->name;
        
            $color->save();

            return redirect('/Dbcolors');
    }

    function delete($id)
    {
        $st = colors::find($id);

        if ($st) {
            $st->delete();
            return redirect('/Dbcolors');
        }
        return redirect('/Dbcolors');
    }
}
