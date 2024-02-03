<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Head;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function manageDepartment(Request $req){
        if($req->isMethod('post')){
            $data = $req->validate([
                'dep_title' => 'required',
                'head_id' => 'required'

            ]);

            Department::create($data) ;
            return redirect()->route('admin.manageDepartment')->with('success','Department title inserted successfuly');
        }


        $data['totalDep'] = Department::get();
        $data['departments'] = Department::paginate(10);
        $data['heads'] = Head::all();
        return view('admin.manageDepartment',$data);
    }

    public function updateDepartment(Request $req,$id){
        if($req->isMethod('post')){
            $data = $req->validate([
                'dep_title' => 'required',
                'head_id' => 'required'
            ]);

            Department::findorfail($id)->update($data);
            return redirect()->route('admin.manageDepartment')->with('success','Department title updated successfuly');
        }


        $data['departments'] = Department::all();
        return view('admin.manageDepartment',$data);
    }

    public function removeDepartment(Request $req){
        $id = $req->id;

        $recoard = Department::findorFail($id);
        $recoard->delete($id);

        return redirect()->back()->with('success','Department title deleted successfuly');
    }
}
