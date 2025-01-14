<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\models;
use Illuminate\Http\Request;

class modelsController extends Controller
{
    //
    function models()
    {
        $models = models::all();
        return view('dashboard.models.index', compact('models'));
    }
    function insert()
    {
        $BrandId = brand::all();
        return view('dashboard.models.insert',compact('BrandId'));
    }

    function Store(Request $req)
    {

        $req->validate([
            'name' => 'required | max:50 | min:3',
            'brand_id' => 'required'
        ]);

        $model = new models;
        $model->name = $req->name;
        $model->brand_id = $req->brand_id;
        $model->save();

        return redirect('/Dbmodels');

    }
    function edit($id)
    {
        $BrandId = brand::all();
        $model = models::Where('id', $id / 548548)->first();
        return view('dashboard.models.edit', compact('model','BrandId'));
    }
    function update(Request $req, $id)
    {
        $model = models::find($id);
        $model->name = $req->name;
        $model->brand_id = $req->brand_id;

        $model->save();

        return redirect('/Dbmodels');

    }


    function delete($id)
    {
        $st = models::find($id);

        if ($st) {
            $st->delete();
            return redirect('/Dbmodels');
        }
        return redirect('/Dbmodels');
    }

}
