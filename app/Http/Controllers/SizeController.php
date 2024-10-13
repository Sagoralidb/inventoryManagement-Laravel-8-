<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SizeController extends Controller
{
    public function index() {
        $sizes = Size::orderby('created_at','DESC')->get();
        return view('sizes.index',compact('sizes'));
    }
    public function create() {
        return view('sizes.create');
    }

    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'size'  => 'required|min:1|max:50|unique:sizes',
      ]);

      if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
     }
      if($validator->passes()) {
        $size = new Size();
        $size->size = $request->size;
        $size->save();

        flash(message:'Size created successfully')->success();
        return back();
      }

    }

    public function edit(string $id)
    {
        $size = Size::findOrFail($id);
        return view('sizes.edit',[
          'size'=>$size  
        ]);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(),[
            'size' => 'required|min:1|max:50|unique:sizes,size,'.$id
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $size = Size::findOrFail($id);

        $size->size = $request->size;
        $size->save();

        flash(message:'Size updated successfully')->success();
        return redirect()->route('sizes.index');
    }
    public function destroy(Request $request, $id) {
        $size = Size::findOrFail($id);

        if($size != null){
            $size->delete();
            flash(message:'The size deleted successfully')->success();
            return redirect()->route('sizes.index');
        } 
            flash(message:"Fail to delete item")->error();
            return back();
    }
}
