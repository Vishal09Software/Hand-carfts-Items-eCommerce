<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;


class ShippingController extends Controller
{
    public function index(){
        $show = Shipping::orderBy('id', 'DESC')->paginate(7);
            return view('backend.shipping',compact('show'));
    }

      // insert data in datebase
    public function store(Request $request){
        $request->validate([
            'desc'=>'required',
    ]);

        $insert = new Shipping;
        $insert->desc = $request->input('desc');
        $insert ->save();
        return redirect()->back()->with('status','Data Insert Successfully');
    }

    // edit data
    public function edit($id){
        $edit = Shipping::find($id);
        return view('backend.editshipping',compact('edit'));
    }
// update data
    public function update(Request $request,$id){
        $update = Shipping::find($id);
        $update->desc = $request->input('desc');
        $update->update();
        return redirect('/shipping_policy/add')->with('status','Data Update Successfully');
}

     // delete data
    public function destroy($id){
    $delete = Shipping::find($id);
    $delete->delete();
    return redirect('/shipping_policy/add')->with('status','Data Delete Successfully');
}
}
