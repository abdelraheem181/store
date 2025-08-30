<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //index
    public function index()
    {
            $books = Book::with('category', 'author', 'country')->paginate(10);
        return view('admin.book.index', compact('books'));
    }

    //create
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        $countries = Country::all();
        return view('admin.book.create', compact('categories', 'authors', 'countries'));
    }

    //store
    public function store(Request $request)
    {
      //dd($request->all());
        //validate request
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'country_id' => 'required|exists:countries,id',
            'price' => 'required|numeric|min:0',
            'published_date' => 'required|date',
            'pages' => 'required|integer|min:0',
            'isbn' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'format' => 'required|string|max:255',
            'weight' => 'required|string|max:255',
            'tags' => 'required|string|max:255',
            'publish_year' => 'required|string|max:255',
            'basic_image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        //check if the book is already exists
    

        //upload image
        if ($request->hasFile('basic_image_path')) {
            $image = $request->file('basic_image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/books'), $imageName);
            $validated['basic_image_path'] = $imageName;
        }

        //translate name and description
        $validated['name'] = [
            'ar' => $request->name_ar,
            'en' => $request->name_en
        ];
        $validated['description'] = [
            'ar' => $request->description_ar,
            'en' => $request->description_en
        ];

        //remove name_ar and name_en
        unset($validated['name_ar']);
        unset($validated['name_en']);
        unset($validated['description_ar']);
        unset($validated['description_en']);

        //create book
         Book::create($validated);
       //redirect to index with success message
        return redirect()->route('admin.books.index')->with('success', 'Book created successfully');
    }

    //edit
    public function edit($id)
    {
        //find book
        $book = Book::with('category', 'author', 'country')->find($id);
        //get categories, authors and countries
        $categories = Category::all();
        $authors = Author::all();
        $countries = Country::all();
        //return view with book, categories, authors and countries
        return view('admin.book.edit', compact('book', 'categories', 'authors', 'countries'));
    }

    //update
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'country_id' => 'required|exists:countries,id',
            'price' => 'required|numeric|min:0',
            'published_date' => 'required|date',
            'pages' => 'required|integer|min:0',
            'isbn' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'format' => 'required|string|max:255',
            'weight' => 'required|string|max:255',
            'publish_year' => 'required|string|max:255',
            'basic_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'tags' => 'nullable|string|max:255',
        ]);

        //upload image
        if ($request->hasFile('basic_image_path')) {
            $image = $request->file('basic_image_path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/books'), $imageName);
            $validated['basic_image_path'] = $imageName;
        }

        //translate name and description
        $validated['name'] = [
            'ar' => $request->name_ar,
            'en' => $request->name_en
        ];
        $validated['description'] = [
            'ar' => $request->description_ar,
            'en' => $request->description_en
        ];

        //remove name_ar and name_en
        unset($validated['name_ar']);
        unset($validated['name_en']);
        unset($validated['description_ar']);
        unset($validated['description_en']);

        //update book
        $book->update($validated);

        //redirect to index with success message
        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully');
    }

    //destroy
    public function destroy($id)
    {
        //find book 
        $book = Book::find($id);
        //delete book
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully');
    }
}
