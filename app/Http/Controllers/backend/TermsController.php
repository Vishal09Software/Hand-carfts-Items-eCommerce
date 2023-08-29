<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terms;

class TermsController extends Controller
{
    public function index(){
        $show = Terms::orderBy('id', 'DESC')->paginate(7);
            return view('backend.terms',compact('show'));
    }

      // insert data in datebase
    public function store(Request $request){
        $request->validate([
            'desc'=>'required',
    ]);

        $insert = new Terms;
        $insert->desc = $request->input('desc');
        $insert ->save();
        return redirect()->back()->with('status','Data Insert Successfully');
    }

    // edit data
    public function edit($id){
        $edit = Terms::find($id);
        return view('backend.editterms',compact('edit'));
    }
// update data
    public function update(Request $request,$id){
        $update = Terms::find($id);
        $update->desc = $request->input('desc');
        $update->update();
        return redirect('/terms_&_condition/add')->with('status','Data Update Successfully');
}

     // delete data
    public function destroy($id){
    $delete = Terms::find($id);
    $delete->delete();
    return redirect('/terms_&_condition/add')->with('status','Data Delete Successfully');
}
}
