<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();

        return view('categories.index', compact('categories'));
    }

    public function new() {
        return view('categories.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::firstOrCreate([
            'category_name' => $request->category_name,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        if (!$request->user()->categories()->where('categories.id', $category->id)->exists()) {
            $request->user()->categories()->attach($category);
        }
        
        return redirect()->route('categories')->with('success', 'Category added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category_id)
    {
        $category = Category::find($category_id);
        return view('categories.show', compact('category'));
    }

    public function edit($category_id)
    {
      $category = Category::find($category_id);
      return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $category_id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($category_id);

        $category->update([
            'category_name' => $request->category_name,
            'type' => $request->type,
            'description' => $request->description,
            'updated_by' => Auth::id(),
        ]);

        // $category->update($request->all());

        return redirect()->route('categories')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $category_id)
    {
        $category = Category::find($category_id);
        
        $category->delete();
        
        return redirect()->route('categories')->with('success', 'Category deleted successfully!');
    }
}
