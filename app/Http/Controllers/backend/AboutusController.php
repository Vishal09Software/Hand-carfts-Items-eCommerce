<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\About;

class AboutusController extends Controller
{
    public function index(){
        $show = About::orderBy('id', 'DESC')->paginate(7);
            return view('backend.about',compact('show'));
    }

      // insert data in datebase
    public function store(Request $request){
        $request->validate([
            'desc'=>'required',
            'image'=>'required'

    ]);

        $insert = new About;
        $insert->desc = $request->input('desc');

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
        $edit = About::find($id);
        return view('backend.editabout',compact('edit'));
    }
// update data
    public function update(Request $request,$id){
        $update = About::find($id);
        $update->desc = $request->input('desc');
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
        return redirect('/about/add')->with('status','Data Update Successfully');
}

     // delete data
    public function destroy($id){
    $delete = About::find($id);
    $destination = 'backend/images/'.$delete->image;
    if (File::exists($destination))
        {
         File::delete($destination);
        }
    $delete->delete();
    return redirect('/about/add')->with('status','Data Delete Successfully');
}
}
