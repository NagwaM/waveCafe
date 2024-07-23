<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Categories Page";
        $categories = Category::get();
        return view('admin.categories', compact('categories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Categories Page";
        return view('admin.addCategory', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'categoryName' => 'required|max:100|min:5',
        ], $messages);

        Category::create($data);
        return redirect('categories');
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
        $title = "Edit Category Page";
        $category = Category::findOrFail($id);
        return view('admin.editCategory', compact('category', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();

        $data = $request->validate([
            'categoryName' => 'required|max:100|min:5',
        ], $messages);

        $category = Category::findOrFail($id);
        
        Category::where('id', $id)->update($data);
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->id);

        if ($category->canBeDeleted()) {
            $category->delete();
            return redirect()->route('categories')->with('success', 'Category deleted successfully.');
        } else {
            return redirect()->route('categories')->with('error', 'Category cannot be deleted because it has associated beverages.');
        }
    }

    /**
     * error custom messages
     */
    public function errMsg(){
        return [
            'categoryName.required' => 'The Name is Missed !!, Please Insert It',
            'categoryName.max' => 'The name may not be greater than 100 characters.',
            'categoryName.min' => 'Length is less than 5, Please Insert more Characters',
        ];
    }
}
