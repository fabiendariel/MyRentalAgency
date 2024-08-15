@extends('base')

@section('title', 'Tous nos biens')

@section('content')

<div class="bg-light p-5 mb-5 text-justify">
  <form action="" method="get" class="container d-flex gap-2">
    <input type="number" placeholder="Surface minimum (sq ft)" class="form-control" name="surface" value="{{ $input['surface'] ?? '' }}">
    <input type="number" placeholder="Nombre de pièces minimum" class="form-control" name="rooms" value="{{ $input['ooms'] ?? '' }}">
    <input type="number" placeholder="Budget maximum " class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
    <button class="btn btn-primary btn-sm flex-grow-0">Chercher</button>
  </form>
</div>

  <div class="container">
    <h2>Nos biens</h2>
    <div class="row">
      @forelse ($properties as $property)
          <div class="col-3">
            @include('properties.card')
          </div>
      @empty
          <div class="col">
            Aucun bien ne correspond à votre recherche
          </div>
      @endforelse
    </div>
  </div>

  <div class="container my-4">
    {{ $properties->links() }}
  </div>

@endsection