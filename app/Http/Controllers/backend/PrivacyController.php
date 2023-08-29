<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privacy;

class PrivacyController extends Controller
{
    public function index(){
        $show = Privacy::orderBy('id', 'DESC')->paginate(7);
            return view('backend.privacy',compact('show'));
    }

      // insert data in datebase
    public function store(Request $request){
        $request->validate([
            'desc'=>'required',
    ]);

        $insert = new Privacy;
        $insert->desc = $request->input('desc');
        $insert ->save();
        return redirect()->back()->with('status','Data Insert Successfully');
    }

    // edit data
    public function edit($id){
        $edit = Privacy::find($id);
        return view('backend.editprivacy',compact('edit'));
    }
// update data
    public function update(Request $request,$id){
        $update = Privacy::find($id);
        $update->desc = $request->input('desc');
        $update->update();
        return redirect('/privacy_policy/add')->with('status','Data Update Successfully');
}

     // delete data
    public function destroy($id){
    $delete = Privacy::find($id);
    $delete->delete();
    return redirect('/privacy_policy/add')->with('status','Data Delete Successfully');
}
}
