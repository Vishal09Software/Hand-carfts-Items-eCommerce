<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'DESC')->paginate(7);
        return view('backend.add_new_category',compact('categories'));
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'desc'=>'required',
            'status'=>'required',
            'image'=>'required'

    ]);

    $insert = new Category;
    $insert->name = $request->input('name');
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
    $edit = Category::find($id);
    return view('backend.edit_add_new_category',compact('edit'));
}
// update data
public function update(Request $request,$id){
    $update = Category::find($id);
    $update->name = $request->input('name');
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
    return redirect('/category/add')->with('status','Data Update Successfully');
}

 // delete data
public function destroy($id){
$delete = Category::find($id);
$destination = 'backend/images/'.$delete->image;
if (File::exists($destination))
    {
     File::delete($destination);
    }
$delete->delete();
return redirect('/category/add')->with('status','Data Delete Successfully');
}
}

