<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookImage;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Traits\SaveFilesTrait;
class BookImageController extends Controller
{

    use SaveFilesTrait;
    //index
    public function index()
    {
        $bookImages = BookImage::paginate(10);
        return view('admin.bookImage.index', compact('bookImages'));
    }

    //create
    public function create()
    {
        // get all books with pagination
        $books = Book::paginate(10);
        // get all book images with pagination
        $bookImages = BookImage::paginate(10);
        return view('admin.bookImage.create', compact('books', 'bookImages'));
    }

    public function store(Request $request)
    {
       
        // validate the request
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);
      
        if ($request->hasFile('image_path')) {
           $file = $request->file('image_path');
           $path = 'images/book-images';
           $validated['image_path'] = $this->saveFile($file, $path);
        }


        // create a new book image
        BookImage::create($validated);

        return redirect()->route('admin.book-images.index')->with('success', 'Book image created successfully');
    }

    //edit
    public function edit($id)
    {
        // get the book image
        $bookImage = BookImage::find($id);
        $books = Book::all();
        
        return view('admin.bookImage.edit', compact('bookImage', 'books'));
    }
    
    //update
    public function update(Request $request, $id)
    {
        // validate the request
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        // delete the old image
        $bookImage = BookImage::find($id);
       
        // upload the new image
        if ($request->hasFile('image_path')) {
            $this->deleteFile($bookImage->image_path);
            $file = $request->file('image_path');
            $path = 'images/book-images';
            $validated['image_path'] = $this->saveFile($file, $path);
        }
        // update the book image
        $bookImage->update($validated);
        return redirect()->route('admin.book-images.index')->with('success', 'Book image updated successfully');
    }


                //destroy category
                public function destroy(BookImage $bookImage)
                {
                    //Delete category
                    $bookImage->delete();
    
                    //Redirect to index page with success message
                    return redirect()->route('admin.book-images.index')->with('success', 'Book image deleted successfully');
                }

    
}
