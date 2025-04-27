<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::where('user_id', Auth::id())->get();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'property_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'value' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        $data['user_id'] = Auth::id();
        Property::create($data);

        return redirect()->route('properties.index')->with('success', 'Property added successfully!');
    }

    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $data = $request->validate([
            'property_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'value' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        $property->update($data);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully!');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully!');
    }
}
