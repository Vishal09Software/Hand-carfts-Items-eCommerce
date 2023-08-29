<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Subcategory;
use App\Models\Category;


class SubcategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        $subcategories= Subcategory::join('category', 'category.id', '=','subcategory.category_id')
        ->select('subcategory.*', 'category.*')
        ->paginate(7);
        // $subcategories = Subcategory::orderBy('id', 'DESC')->paginate(7);

        $data=[
            'categories'=>$categories,
            'subcategories'=>$subcategories,
        ];
        return view('backend.add_new_subcategory',$data);
    }

    public function store(Request $request){
        $request->validate([
            'subcate_name'=>'required',
            'category_id'=>'required',
            'slug'=>'required',
            'desc'=>'required',
            'status'=>'required',
            'image'=>'required'
    ]);
    $insert = new Subcategory;
    $insert->subcate_name = $request->input('subcate_name');
    $insert->category_id = $request->input('category_id');
    $insert->slug = $request->input('slug');
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
    $categories = Category::all();
    $edit = Subcategory::find($id);
    $data = [
        'categories'=>$categories,
        'subcategories'=>$edit,

    ];
    return view('backend.edit_add_new_subcategory',$data);
}
// update data
public function update(Request $request,$id){
    $update = Subcategory::find($id);
    $update->subcate_name = $request->input('subcate_name');
    $update->category_id = $request->input('category_id');
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
    return redirect('/subcategory/add')->with('status','Data Update Successfully');
}

 // delete data
public function destroy($id){
$delete = Subcategory::find($id);
$destination = 'backend/images/'.$delete->image;
if (File::exists($destination))
    {
     File::delete($destination);
    }
$delete->delete();
return redirect('/subcategory/add')->with('status','Data Delete Successfully');
}
}
