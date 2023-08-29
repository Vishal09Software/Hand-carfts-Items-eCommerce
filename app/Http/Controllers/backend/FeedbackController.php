<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index(){
        $show = Feedback::orderBy('id', 'DESC')->paginate(7);
            return view('backend.feedback',compact('show'));
    }

      // insert data in datebase
    public function store(Request $request){
        $request->validate([
            'rname'=>'required',
            'desc'=>'required',
            'status'=>'required',
            'image'=>'required'

    ]);

        $insert = new Feedback;
        $insert->rname = $request->input('rname');
        $insert->desc = $request->input('desc');
        $insert->status = $request->input('status');

        if ($request->hasfile('image')){
            $file= $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('backend/images/',$filename);
            $insert->image = $filename;
        }
        $insert ->save();
        return redirect()->back()->with('status','Data Insert Successfully');
    }

    // edit data
    public function edit($id){
        $edit = Feedback::find($id);
        return view('backend.editfeedback',compact('edit'));
    }
// update data
    public function update(Request $request,$id){
        $update = Feedback::find($id);
        $update->rname = $request->input('rname');
        $update->desc = $request->input('desc');
        $update->status = $request->status ;
        if ($request->hasfile('image')){
            $destination = 'backend/images/'.$update->image;
                if (File::exists($destination))
                {
                    File::delete($destination);
                }
            $file= $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('backend/images/',$filename);
            $update->image = $filename;
    }
        $update->update();
        return redirect('/testimonial/add')->with('status','Data Update Successfully');
}

     // delete data
    public function destroy($id){
    $delete = Feedback::find($id);
    $destination = 'backend/images/'.$delete->image;
    if (File::exists($destination))
        {
         File::delete($destination);
        }
    $delete->delete();
    return redirect('/testimonial/add')->with('status','Data Delete Successfully');
}
}
