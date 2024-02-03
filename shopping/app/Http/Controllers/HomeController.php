<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Head;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $data['heads'] = Head::all();
        $data['products'] = Product::all();
        $data['departments'] = Department::all();
        return view('home.home', $data);
    }
    

    // public function main()
    // {
    //     $data['heads'] = Head::all();
    //     $data['products'] = Product::all();
    //     $data['departments'] = Department::all();
    //     return view('home.main', $data);
    // }

    public function viewProduct($id) {
        $pro = Product::findorFail($id);
        $data['departments'] = Product::where("id","!=",$id)->where("department_id",$pro->department_id)->get();
        $data['products'] = $pro;
        return view("home.viewProduct" , $data);
    }
    
    public function viewHead($id) {
        $data['products'] = Product::all();
        $data['heads'] = Head::all();
        $data['departments'] = Department::all();
        $data['heads'] = Head::findorFail($id);
        return view("home.viewHead" , $data);
    }
    public function viewDep($id) {
        $data['products'] = Product::all();
        $data['heads'] = Head::all();
        $data['departments'] = Department::all();
        $data['departments'] = Department::findorFail($id);
        return view("home.ViewDep" , $data);
    }

    public function login(Request $req){
        if($req->isMethod('post')){
            $data = $req->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            if(Auth::attempt($data)){
                return redirect()->route('home.home')->with('success','Login successfully');
            }
            else{
                return redirect()->back()->with('error','email or password is invalid');
            }
        }
        return view('home.login');
    }

    public function signup(Request $req){
       if($req->isMethod('post')){
        $data = $req->validate([
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        // dd($data);

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('login');

       }
        return view('home.signup');
    }

    public function logout(Request $req){
        Auth::logout();

        return redirect()->route('login');
    }
}
