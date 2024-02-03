<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Head;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        $data['heads'] = Head::count();
        $data['departments'] = Department::count();
        $data['products'] = Product::count();
        return view('admin.dashboard',$data);
    }

    public function login(Request $req){
        if($req->isMethod('post')){
            $data = $req->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            if(Auth::guard('admin')->attempt($data)){
                return redirect()->route('admin.dashboard');
            }
            else{
                return back()->with('error','Password or email invalid');
            }

        }
        return view('admin.adminLogin');
    }


    public function logout(Request $req){
        Auth::guard('admin')->logout();
        return redirect()->route('adminlogin');
    }
}

