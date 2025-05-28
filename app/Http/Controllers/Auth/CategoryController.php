<?php

namespace App\Http\Controllers\Auth;

use App\Models\category;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all categories from the database
        $categories = category::all();

        // Return the view with the categories
        return view('auth.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new category
        return view('auth.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        // Create a new category
        $category = new category();
        $category->name = $request->name;
        $category->save();
        // Redirect to the category index with a success message
        return redirect()->route('auth.category')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the category by ID
        $category = category::findOrFail($id);

        // Return the view with the category
        return view('auth.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the category by ID
        $category = category::findOrFail($id);

        // Return the view for editing the category
        return view('auth.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        // Find the category by ID
        $category = category::findOrFail($id);

        // Update the category
        $category->name = $request->name;
        $category->save();

        // Redirect to the category index with a success message
        return redirect()->route('auth.category')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the category by ID
        $category = category::findOrFail($id);

        // Delete the category
        $category->delete();

        // Redirect to the category index with a success message
        return redirect()->route('auth.category')->with('success', 'Category deleted successfully.');
    }
}
