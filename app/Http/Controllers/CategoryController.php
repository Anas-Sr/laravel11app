<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('Category.index',[
            'categories' => $categories
        ]);
    }

    public function create(){
        return view('Category.create');
    }


    public function store(Request $request){
        $request->validate([
            'name'        => 'required|string|max:200',
            'description' => 'required|string|max:200',
            'status'      => 'nullable',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ?1:0
        ]);

        return redirect('/category')->with('status','category created successfuly');
    }


    public function show(Category $category){
        return view('Category.show', compact('category'));
    }

    public function edit(Category $category){
        return view('Category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'        => 'required|string|max:200',
            'description' => 'required|string|max:200',
            'status'      => 'nullable',
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0
        ]);

        return redirect('/category')->with('status', 'category Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/category')->with('status', 'category Deleted successfuly');
    }
}
