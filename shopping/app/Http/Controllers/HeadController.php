<?php

namespace App\Http\Controllers;

use App\Models\Head;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    public function manageHead(Request $req){
        if($req->isMethod('post')){
            $data = $req->validate([
                'head_title' => 'required'
            ]);

            Head::create($data) ;
            return redirect()->route('admin.manageHead')->with('success','Head title inserted successfuly');
        }


        $data['heads'] = Head::all();
        return view('admin.manageHead',$data);
    }

    public function updateHead(Request $req,$id){
        if($req->isMethod('post')){
            $data = $req->validate([
                'head_title' => 'required'
            ]);

            Head::findorfail($id)->update($data);
            return redirect()->route('admin.manageHead')->with('success','Head title updated successfuly');
        }


        $data['heads'] = Head::all();
        return view('admin.manageHead',$data);
    }

    public function removeHead(Request $req){
        $id = $req->id;

        $recoard = Head::findorFail($id);
        $recoard->delete($id);

        return redirect()->back()->with('success','Head title deleted successfuly');
    }
}
