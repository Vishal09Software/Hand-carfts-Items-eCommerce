<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\{Products, Category};
use App\Helpers\Helper;

class ProductsController extends Controller
{
    public function index(){
        $categories = Category::all();
        $data=[

            'categories'=>$categories,
            'subcategories'=>$subcategories,
        ];
        return view('backend.add-new-product',$data);
    }
    public function store(Request $request){
    $sku = Helper::SkuGenerator(new Products , 'sku' , 5, 'SKU' );
        $insert = new Products;
        $insert->pname = $request->input('pname');
        $insert->category_id = $request->input('category_id');
        $insert->price = $request->input('price');
        $insert->dprice = $request->input('dprice');
        $insert->sku = $sku;
        $insert->age = implode(',', $request->input('age'));
        $insert->type =implode(',', $request->input('type'));
        $insert->areyou = implode(',', $request->input('areyou'));
        $insert->pdesc = $request->input('pdesc');
        $insert->psdesc = $request->input('psdesc');
        $insert->pspdesc = $request->input('pspdesc');
        $insert->mtitle = $request->input('mtitle');
        $insert->mdesc = $request->input('mdesc');
        $insert->otitle = $request->input('otitle');
        $insert->odesc = $request->input('odesc');
        if ($request->hasFile('mainimg'))
        {
            $file = $request->file('mainimg');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('backend/images/', $filename);
            $insert->mainimg = $filename;
        }
        if ($request->hasFile('subimg')) {
            $files = $request->file('subimg');
            $subimg = [];
            foreach ($files as $file) {
                $imagename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('backend/images/'), $imagename);
                $subimg[] = $imagename;
            }
            $insert->subimg = json_encode($subimg);
        }
        $insert->save();
        return redirect()->back()->with('status','Data Insert Successfully');
    }

    public function show(){

        // Getting data
        $categories = Category::all();
        $products = Products::orderBy('id', 'desc')->paginate(10);
        // Assigning to data
        $data = [
            'categories'=> $categories,
            'products'=>$products
        ];
        // Returning to view
        return view('backend.add-new-product',$data);
    }


    // edit data
     public function edit($id){
         // Getting data
         $categories = Category::all();
         $products = Products::find($id);
         // Assigning to data
         $data = [
             'categories'=> $categories,
             'products'=>$products
         ];
        return view('backend.edit_add-new-product',$data);
    }


    public function update(Request $request, $id)
    {
        // $validatedData = $request->validate([
        //     'pname' => 'required|string|max:255',
        //     'category' => 'required',
        //     'subcategory' => 'required',
        // ]);

        $product = Products::find($id);
        $product->pname = $request->input('pname');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->dprice = $request->input('dprice');
        // $age = $request->input('age', []);
        // $pts = $request->input('products', []);
        // $ayou = $request->input('areyou', []);

        $product->age = implode(',', $request->input('age'));
        $product->type =implode(',', $request->input('type'));
        $product->areyou = implode(',', $request->input('areyou'));

        // $product->age = json_encode($age);
        // $product->products = json_encode($pts);
        // $product->areyou = json_encode($ayou);
        $product->pdesc = $request->input('pdesc');
        $product->psdesc = $request->input('psdesc');
        $product->pspdesc = $request->input('pspdesc');
        $product->mtitle = $request->input('mtitle');
        $product->mdesc = $request->input('mdesc');
        $product->otitle = $request->input('otitle');
        $product->odesc = $request->input('odesc');

        if ($request->hasFile('image')) {
            $destination = 'backend/images/'.$product->image; // Corrected variable name
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('backend/images/', $filename);
            $product->image = $filename;
        }

        if ($request->hasFile('subimg')) {
            // Delete old sub-images if they exist
            $oldSubImages = explode('|', $product->subimg);
            foreach ($oldSubImages as $oldImage) {
                $destination = 'backend/images/'.$oldImage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }

            // Save new sub-images
            $subimgPaths = [];
            foreach ($request->file('subimg') as $subImage) {
                $subimgPath = $subImage->store('backend/images');
                $subimgPaths[] = basename($subimgPath);
            }
            $product->subimg = implode('|', $subimgPaths);
        }

        $product->save();
        return redirect('/admin/product/add/')->with('status', 'Data Update Successfully');
    }

    public function destroy($id){
        $delete = Products::find($id);
        $destination = 'backend/images/'.$delete->image;
        if (File::exists($destination))
            {
             File::delete($destination);
            }
        $delete->delete();
        return redirect('/admin/product/add/')->with('status','Data Delete Successfully');
    }


}
