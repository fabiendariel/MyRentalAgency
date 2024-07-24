<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query();
        if ($price = $request->validated('price')) {
            $query->where('price', '<=', $price);
        }
        if ($surface = $request->has('surface')) {
            $query->where('surface', '>=', $surface);
        }
        if ($rooms = $request->has('rooms')) {
            $query->where('rooms', '>=', $rooms);
        }
        $properties = $query->paginate(4);
        return view('properties.index', [
            'properties' => $properties,
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property)
    {
        return view('properties.show', ['property' => $property]);
    }
}
