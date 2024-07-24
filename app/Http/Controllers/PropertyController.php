<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query()->orderBy('created_at', 'desc');
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
        $exepectedSlug = $property->getSlug();
        if ($slug !== $exepectedSlug) {
            return to_route('properties.index', ['slug' => $exepectedSlug, 'property' => $property]);
        }

        return view('properties.show', ['property' => $property]);
    }

    public function contact(Property $property, PropertyContactRequest $request)
    {
        Mailer::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'Votre demande de contact a bien été envoyé');
    }
}
