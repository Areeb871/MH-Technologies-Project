<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class Catagery_controller extends Controller
{
    public function index()
    {
        $catagerys = Category::with('subcategories')->get();
        return view('users.catagery_list', [
            'catagerys' => $catagerys
        ]);
    }

    public function create()
    {
        $catagerys = Category::all();
        return view('users.catagery_create', compact('catagerys'));
    }

    public function store(Request $request)
    {
        $rules = [
            'categories_name' => 'required|string|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('catagery.create')->withErrors($validator)->withInput();
        }
        $catagery = new Category();
        $catagery->categories_name = $request->categories_name;
        /*$catagery->parent_id = $request->parent_id;*/
        $catagery->save();
        return redirect()->route('catagery.show')->with('success', 'Category added successfully.');
    }

    public function edit($id)
    {
        $catagerys = Category::all();
        $catagery = Category::findOrFail($id);
        return view('users.catagery_edit', compact('catagery', 'catagerys'));
    }
    public function update(Request $request, $id)
    {
        $catagery = Category::findOrFail($id);
        $rules = [
            'categories_name' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('catagery.edit', $id)->withErrors($validator)->withInput();
        }

        $catagery->categories_name = $request->categories_name;
        /*$catagery->parent_id = $request->parent_id;*/
        $catagery->save();

        return redirect()->route('catagery.show')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $catagery = Category::findOrFail($id);
        $catagery->delete();

        return redirect()->route('catagery.show')->with('success', 'Category deleted successfully.');
    }
    public function show()
    {
         $catagerys = Category::orderby('created_at','DESC')->get();
        return view('users.subcategory_create',[
            'catagerys' => $catagerys
        ]);
    }
}
