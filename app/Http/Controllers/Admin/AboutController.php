<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    //index
    public function index()
    {
        $about = About::paginate(10);
        return view('admin.about.index', compact('about'));
    }

    //create
    public function create()
    {
        return view('admin.about.create');
    }

    //store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_ar' => 'required|string',
            'content_en' => 'required|string',
      
        ]);

        $validated['title'] = [
            'ar' => $validated['title_ar'],
            'en' => $validated['title_en']
        ];
        $validated['content'] = [
            'ar' => $validated['content_ar'],
            'en' => $validated['content_en']
        ];

        //remove title_ar, title_en, content_ar, content_en
        unset($validated['title_ar']);
        unset($validated['title_en']);
        unset($validated['content_ar']);
        unset($validated['content_en']);

       
       // create ab
       About::create($validated);
      

        return redirect()->route('admin.abouts.index')->with('success', 'About created successfully');
    }
    //edit
    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.about.edit', compact('about'));
    }

    //update
    public function update(Request $request, $id)
    {
      $validated = $request->validate([
        'title_ar' => 'required|string|max:255',
        'title_en' => 'required|string|max:255',
        'content_ar' => 'required|string',
        'content_en' => 'required|string',
      ]);
      
      $validated['title'] = [
        'ar' => $validated['title_ar'],
        'en' => $validated['title_en']
      ];
      $validated['content'] = [
        'ar' => $validated['content_ar'],
        'en' => $validated['content_en']
      ];

      //remove title_ar, title_en, content_ar, content_en
      unset($validated['title_ar']);
      unset($validated['title_en']);
      unset($validated['content_ar']);
      unset($validated['content_en']);

      //update about
      $about = About::find($id);
      $about->update($validated);
        return redirect()->route('admin.abouts.index')->with('success', 'About updated successfully');
    }

    //destroy
    public function destroy($id)
    {
        $about = About::find($id);
        $about->delete();
        return redirect()->route('admin.abouts.index')->with('success', 'About deleted successfully');
    }
}
