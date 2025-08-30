<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
            
            //index category
            public function index()
            {
                //Get all categories
                $categories = Category::all();

                //Show index page with categories
                return view('admin.category.index', compact('categories'));
            }
            //create category
            public function create()
            {
                //Show create form
                return view('admin.category.create');
            }
            //store category
            public function store(Request $request)
            {   
                //Validate request data
            $validated = $request->validate([
                    'name_ar' => 'required|string|max:255',
                    'name_en' => 'required|string|max:255',
                    'description_ar' => 'nullable|string|max:255',
                    'description_en' => 'nullable|string|max:255',
                ]);

                //Translate name to english and arabic
                $validated['name'] = [
                    'ar' => $validated['name_ar'],
                    'en' => $validated['name_en']
                ];
                //Translate description to english and arabic
                $validated['description'] = [
                    'ar' => $validated['description_ar'],
                    'en' => $validated['description_en']
                ];

                //Create category with validated data
                Category::create($validated);

                //Redirect to index page with success message
                return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
            }


            //edit category
            public function edit(Category $category)
            {
                //Show edit form with category data
                return view('admin.category.edit', compact('category'));
            }
            //update category
            public function update(Request $request, Category $category)
            {
                //Validate request data
                $validated = $request->validate([
                    'name_ar' => 'required|string|max:255',
                    'name_en' => 'required|string|max:255',
                    'description_ar' => 'nullable|string|max:255',
                    'description_en' => 'nullable|string|max:255',
                ]);

                //Translate name to english and arabic
                $validated['name'] = [
                    'ar' => $validated['name_ar'],
                    'en' => $validated['name_en']
                ];

                //Translate description to english and arabic
                $validated['description'] = [
                    'ar' => $validated['description_ar'],
                    'en' => $validated['description_en']
                ];

                //Update category with validated data
                $category->update($validated);

                //Redirect to index page with success message
                return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
            }

            //destroy category
            public function destroy(Category $category)
            {
                //Delete category
                $category->delete();

                //Redirect to index page with success message
                return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
            }

}
