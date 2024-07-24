@extends('base')

@section('title', 'Tous nos biens')

@section('content')
<div class="container">
    
  <h1 class="mt-4">{{ $property->title }}</h1>
  <h2>{{ $property->rooms }} pièces - {{ $property->surface }} sq ft</h2>

  <div class="text-primary fw-bold" style="font-size: 2rem;">
    {{ number_format($property->price, thousands_separator:" ") }}$
  </div>

  <hr>

  <div class="mt-4">
    <h4>Interessé par ce bien?</h4>

    @include('shared.flash')

    <form action="{{ route('properties.contact', $property) }}" method="post" class="vstack gap-3">
      @csrf
      <div class="row">
        @include('shared.input', [
          'class' => 'col',
          'label'=> 'Prénom', 
          'name' => 'firstname'
        ])
        @include('shared.input', [
          'class' => 'col',
          'label'=> 'Nom', 
          'name' => 'lastname'
        ])
      </div>
      <div class="row">
        @include('shared.input', [
          'class' => 'col',
          'label'=> 'Téléphone', 
          'name' => 'phone'
        ])
        @include('shared.input', [
          'type' => 'email',
          'class' => 'col',
          'label'=> 'Courriel', 
          'name' => 'email'
        ])
      </div>
      @include('shared.input', [
        'type' => 'textarea',
        'class' => 'col',
        'label'=> 'Votre message', 
        'name' => 'message'
      ])
      <div>
        <button class="btn btn-primary">Nous contacter</button>
      </div>
    </form>
  </div>

  <div class="mt-4 my-4">
    <p>{!! nl2br($property->description) !!}</p>
    <div class="row">
      <div class="col-8">
        <h2>Caracteritiques</h2>
        <table class="table table-striped">
          <tr>
            <td>Surface habitable</td>
            <td>{{ $property->surface }} sq ft</td>
          </tr>
          <tr>
            <td>Nombre de pièces</td>
            <td>{{ $property->rooms }}</td>
          </tr>
          <tr>
            <td>Nombre de chambres</td>
            <td>{{ $property->bedrooms }}</td>
          </tr>
          <tr>
            <td>Etage</td>
            <td>{{ $property->floor }}</td>
          </tr>
          <tr>
            <td>Localisation</td>
            <td>{{ $property->address }}, {{ $property->city }}, QC {{ $property->postal_code }}</td>
          </tr>
        </table>
      </div>
      <div class="col-4">
        <h2>Spécifications</h2>
        <ul class="list-group">
          @foreach ($property->options as $option)
              <li class="list-group-item">{{ $option->name }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

</div>
@endsection