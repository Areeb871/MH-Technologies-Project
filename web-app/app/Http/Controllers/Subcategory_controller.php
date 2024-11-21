<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Subcategory;
use App\Models\Category;
class Subcategory_controller extends Controller
{
    public function index()
    {
        $subcatagerys = Subcategory::orderby('created_at','DESC')->get();
        return view('users.subcategory_list', [
            'subcatagerys' => $subcatagerys
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        return view('users.subcategory_create',compact('categories'));
    }
    public function store(Request $request)
    {
        $rules = [
            'subcategories_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('subcategory.index')->withErrors($validator)->withInput();
        }
        $subcatagery = new Subcategory();
        $subcatagery->subcategories_name = $request->subcategories_name;
        $subcatagery->category_id = $request->category_id;
        /*$subcatagery->parent_id = $request->parent_id;*/
        $subcatagery->save();

        return redirect()->route('subcategory.show')->with('success', 'Category added successfully.');
    }
    public function edit($id)
    {
        $subcatagerys = Subcategory::all();
        $subcatagery = Subcategory::findOrFail($id);
        return view('users.subcategory_edit', compact('subcatagery', 'subcatagerys'));
    }
    public function update(Request $request, $id)
    {
        $subcatagery = Subcategory::findOrFail($id);
        $rules = [
            'subcategories_name' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('subcategory.edit', $id)->withErrors($validator)->withInput();
        }
        $subcatagery->subcategories_name = $request->subcategories_name;
       /* $subcatagery->parent_id = $request->parent_id;*/
        $subcatagery->save();

        return redirect()->route('subcategory.show')->with('success', 'Category updated successfully.');
    }
    public function destroy($id)
    {
        $subcatagery = Subcategory::findOrFail($id);
        $subcatagery->delete();

        return redirect()->route('subcategory.show')->with('success', 'Category deleted successfully.');
    }



    
}
