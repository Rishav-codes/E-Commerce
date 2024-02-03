<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index()
    {
        $data['products'] = Product::paginate(10);
        $data['departments'] = Department::all();
        return view("admin.manageProduct", $data);
    }

    public function insert(Request $req){
        if($req->isMethod('post')) {
            $data = $req->validate([
                'title' => 'required',
                'price' => 'required|numeric',
                'discount_price' => 'required|numeric',
                'description' => 'required',
                'image' => 'required',
                'department_id' => 'required',
                'isAds' => 'required',
                // 'status' => 'required'
            ]);

            // imagme
            $filename = $req->file("image")->getClientOriginalName();
            $path = $req->file('image')->storeAs("public", $filename);
            $data['image'] = $filename;
            
            Product::create($data);
            return redirect()->route('admin.product.index')->with('success', 'Product inserted successfully');
        }

        $data['departments'] = Department::all();
        // $data['products'] = Product::all();
        return view("admin.insertProduct", $data);
    }

    public function updateProduct(Request $req,$id){
        if($req->isMethod('post')){
            $data = $req->validate([
                'title' => 'required',
                'price' => 'required',
                'discount_price' => 'required',
                'description' => 'required',
                'image' => 'required',
                'department_id' => 'required',
                'isAds' => 'required',
                // 'status' => 'required'
            ]);

            // imagme
            $filename = $req->file("image")->getClientOriginalName();
            $path = $req->file('image')->storeAs("public", $filename);
            $data['image'] = $filename;
            
            Product::findorfail($id)->update($data);
            return redirect()->route('admin.product.index')->with('success','Product updated successfully');
        }

        $data['products'] = Product::all();
        $data['departments'] = Department::all();
        return view('admin.manageProduct');
    }


    public function removeProduct(Request $req){
        $id = $req->id;
        $recoard = Product::findorFail($id);
        $recoard->delete();
        return redirect()->back()->with("error", "Product deleted successfully");
    }
}
