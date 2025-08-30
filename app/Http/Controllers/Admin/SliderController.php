<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\SaveFilesTrait;

class SliderController extends Controller
{
    //use save files trait
    use SaveFilesTrait;
    //index
    public function index()
    {
        // get all sliders with pagination
        $sliders = Slider::paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    //create
    public function create()
    {
        return view('admin.slider.create');
    }

    //store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $path = 'images/sliders';
            $validated['image_path'] = $this->saveFile($file, $path);
        }

        // create the slider
        Slider::create($validated);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully');
    }

    //edit
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    //update
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        // delete the old image
        $slider = Slider::find($id);
        if ($request->hasFile('image_path')) {
            $this->deleteFile($slider->image_path);
            $file = $request->file('image_path');
            $path = 'images/sliders';
            $validated['image_path'] = $this->saveFile($file, $path);
        }
        // update the slider
        $slider->update($validated);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully');
    }

    //destroy
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully');
    }
}
