<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //index country
    public function index()
    { 
  
        $countries = Country::all();
        return view('admin.country.index', compact('countries'));
    }
    //create country
    public function create()
    {
        return view('admin.country.create');
    }
    //store country
    public function store(Request $request)
    {
        
       $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'currency' => 'required|string|max:255',
        ]);

        $validated['name'] = [
            'en' => $validated['name_en'],
            'ar' => $validated['name_ar']
        ];

        Country::create($validated);

        return redirect()->route('admin.countries.index')->with('success', 'Country created successfully');
    }
    //show country
    public function show(Country $country)
    {
        return view('admin.country.show', compact('country'));
    }
    //edit country
    public function edit(Country $country)
    {
        
        return view('admin.country.edit', compact('country'));      
    }
    //update country
    public function update(Request $request, Country $country)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'currency' => 'required|string|max:255',
        ]);
        $validated['name'] = [
            'en' => $validated['name_en'],
            'ar' => $validated['name_ar']
        ];
        $country->update($validated);
        return redirect()->route('admin.countries.index')->with('success', 'Country updated successfully');
    }
    //destroy country
    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('admin.countries.index')->with('success', 'Country deleted successfully');
    }
}