<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //
    public function Admindashboard(){
        return view('dashboard.index');
    }

    // Profile
    
    function profiles($id){
        $profile = Users::Where('id', $id/548548)->first();
        return view('dashboard.Users.profile', compact('profile'));
    }

    // function edit($id)
    // {
    //     $user = Users::Where('id', $id/548548)->first();
    //     return view('dashboard.Users.edit', compact('user'));

    // }
    
    function update(Request $req, $id)
    {
        $req->validate([
            'name' => 'required | max:50 | min:3',
        ]);

        $profile = Users::find($id);
        $imgname = $profile->img;
        if ($req->hasfile('img')) {
            
            $img = $req->img;
            $imgname = $img->getClientOriginalName();
            $imgname = time() . "__" . $imgname;
            $img->move("images/Userimages/", $imgname);
            $imgname = "/images/Userimages/".$imgname;
            if($profile->img){
                if(file_exists(public_path($profile->img))){
                    unlink(public_path($profile->img));
                }
            }
        }
        
            $profile->name = $req->name;
            $profile->img = $imgname;
            // if (session()->has('role') && session('role') == 1){
                
            //     $profile->role = $req->role;
            //     $profile->status = $req->status;
            // }

            $profile->save();

            return redirect('/');
    
    }
    
    function pasupdate(Request $req, $id){
        $req->validate([
            'pass' => 'required | min:6'
        ]);


        $profile = Users::find($id);

        $profile->password = Hash::make($req->pass);
        
        $profile->save();

        return redirect('/');


    }

}
