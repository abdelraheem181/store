<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Country;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //index
    public function index()
    {
        $authors = Author::with('country')->get();
        return view('admin.author.index', compact('authors'));
    }
    //create
    public function create()
    {
        $countries = Country::all();
        return view('admin.author.create', compact('countries'));
    }

    //store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'nullable|string|max:255',
            'description_en' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'country_id' => 'nullable|exists:countries,id',
            'is_active' => 'nullable|boolean',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|string|max:255|unique:authors',
        ]);

         

        //upload image
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/authors'), $imageName);
            $validated['image_path'] = $imageName;
        }

        //translate name and description
        $validated['name'] = [
            'ar' => $request->name_ar,
            'en' => $request->name_en,
        ];
        $validated['description'] = [
            'ar' => $request->description_ar,
            'en' => $request->description_en,
        ];

        Author::create($validated);

        return redirect()->route('admin.authors.index')->with('success', 'Author created successfully');
    }
    //edit
    public function edit($id)
    {
        $author = Author::with('country')->find($id);
        $countries = Country::all();
        return view('admin.author.edit', compact('author', 'countries'));
    }
    //update
    public function update(Request $request,Author $author)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'nullable|string|max:255',
            'description_en' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'country_id' => 'nullable|exists:countries,id',
            'is_active' => 'nullable|boolean',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|string|max:255|unique:authors,slug,' . $author->id,
        ]);

      

        //upload image
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/authors'), $imageName);
            $validated['image_path'] = $imageName;
        }

        //translate name and description
        $validated['name'] = [
            'ar' => $request->name_ar,
            'en' => $request->name_en,
        ];
        $validated['description'] = [
            'ar' => $request->description_ar,
            'en' => $request->description_en,
        ];

        $author->update($validated);

        return redirect()->route('admin.authors.index')->with('success', 'Author updated successfully');
    }
    
   //destroy
    public function destroy($id)
    {
        $author = Author::find($id);
        if($author->image_path){
            unlink(public_path('images/authors/' . $author->image_path));
        }
        $author->delete();
        return redirect()->route('admin.authors.index')->with('success', 'Author deleted successfully');
    }
 
 
}
