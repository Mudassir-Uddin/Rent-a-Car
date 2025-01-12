<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\brands;
use Illuminate\Http\Request;

class brandsController extends Controller
{
    //
    function brands(){
        
        $brands = brand::all();
        return view('dashboard.brands.index',compact('brands'));
    }
    function insert()
    {
        return view('dashboard.brands.insert');
    }

    function Store(Request $req)
    {

        $req->validate([
            'name' => 'required | max:50 | min:3',
            'img' => 'required | image | mimes:png,jpg'
        ]);
        
        $img = $req->img;
        $imgname = $img->getClientOriginalName();
        $imgname = time() . "__" . $imgname;
        $img->move("images/Brandsimages/", $imgname);

            $brand = new brand;
            $brand->name = $req->name;
            $brand->img = "images/Brandsimages/$imgname";
            $brand->save();
       
        return redirect('/Dbbrands');

    }
    function edit($id)
    {
        $brand = brand::Where('id', $id/548548)->first();
        return view('dashboard.brands.edit', compact('brand'));
    }
    function update(Request $req, $id)
    {
        $brand = brand::find($id);
        $imgname = $brand->img;
        if ($req->hasfile('img')) {
            
            $img = $req->img;
            $imgname = $img->getClientOriginalName();
            $imgname = time() . "__" . $imgname;
            $img->move("images/Brandsimages/", $imgname);
            $imgname = "/images/Brandsimages/".$imgname;
            if($brand->img){
                if(file_exists(public_path($brand->img))){
                    unlink(public_path($brand->img));
                }
            }
        }
            $brand->name = $req->name;
            $brand->img = $imgname;
        
            $brand->save();

            return redirect('/Dbbrands');

        }
    

    function delete($id)
    {
        $st = brand::find($id);

        if ($st) {
            if($st->img){
                if(file_exists(public_path($st->img))){
                    unlink(public_path($st->img));
                }
            }
            $st->delete();
            return redirect('/Dbbrands');
        }
        return redirect('/Dbbrands');
    }
}
