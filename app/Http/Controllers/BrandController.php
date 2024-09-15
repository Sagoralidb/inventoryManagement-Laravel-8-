<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index() {
        $brands = Brand::orderby('created_at','DESC')->get();

        return view('brands.index',compact('brands'));
    }

    public function create() {
        return view('brands.create');
    }

    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'name'  => 'required|min:2|max:50|unique:brands',
      ]);

      if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
     }
      if($validator->passes()) {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();

        flash(message:'Brands created successfully')->success();
        return back();
      }

    }

    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit',[
          'brand'=>$brand  
        ]);
    }

    public function update(Request $request, $id) {
        $validator = validator::make($request->all(),[
            'name'  => 'required|min:2|max:50|unique:brands,name,'.$id
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $brand = Brand::findOrFail($id);

        $brand->name = $request->name;
        $brand->save();

        flash(message:'Brand updated successfully')->success();
        return redirect()->route('brands.index');
    }
    public function destroy(Request $request, $id) {
        $brand = Brand::findOrFail($id);

        if($brand != null){
            $brand->delete();
            flash(message:'Brand deleted successfully')->success();
            return redirect()->route('brands.index');
        } 
            flash(message:"Fail to delete")->error();
            return back();
    }
}
