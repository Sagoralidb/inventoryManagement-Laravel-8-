<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderby('created_at','DESC')->get();

        return view('categories.index',[
            'categories' =>$categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'name'  => 'required|min:2|max:50|unique:categories',
      ]);

      if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
     }
      if($validator->passes()) {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        flash(message:'Category created successfully')->success();
        return back();
      }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit',[
          'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = validator::make($request->all(),[
            'name'  => 'required|min:2|max:50|unique:categories,name,'.$id
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->save();

        flash(message:'Category updated successfully')->success();
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if($category != null){
           $category->delete();
           flash(message:'Category deleted successfully')->success();
           return redirect()->route('category.index');
        }
            flash(message:'Failed to delete')->error();
            return back();

    }

    public function getCategoriesJson() {
        $categories = Category::all();

        return response()->json([
            'success' => true,
            'data' => $categories
        ],Response::HTTP_OK );
    }
}
