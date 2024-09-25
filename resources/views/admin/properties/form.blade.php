@extends('admin.admin')

@section('title', $property->exists ? "Update a property" : "Add a property")
    
@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{ route( $property->exists ? 'admin.property.update' : 'admin.property.store', ['property' => $property]) }}" method="post">
    
    @csrf
    @method($property->exists ? 'put' : 'post')
    
    <div class="row mt-3">
      @include('shared.input', [
        'class' => 'col',
        'label'=> 'Title', 
        'name' => 'title', 
        'value' => $property->title
      ])
      <div class="col row">
        @include('shared.input', [
          'class' => 'col',
          'name' => 'surface', 
          'value' => $property->surface
        ])
        @include('shared.input', [
          'class' => 'col',
          'label'=> 'Price', 
          'name' => 'price', 
          'value' => $property->price
        ])
      </div>    
    </div>
    <div class="row mt-3">
    @include('shared.input', [
      'type' => 'textarea',
      'class' => 'col', 
      'name' => 'description', 
      'value' => $property->description
    ])
    </div>
    <div class="row mt-3">
      @include('shared.input', [
        'label'=> 'Rooms', 
        'class' => 'col', 
        'name' => 'rooms', 
        'value' => $property->rooms
      ])
      @include('shared.input', [
        'label'=> 'Bed', 
        'class' => 'col', 
        'name' => 'bedrooms', 
        'value' => $property->bedrooms
      ])
      @include('shared.input', [
        'label'=> 'Bath', 
        'class' => 'col', 
        'name' => 'bath', 
        'value' => $property->bath
      ])
    </div>
    <div class="row mt-3">
      @include('shared.input', [
        'label'=> 'Address', 
        'class' => 'col', 
        'name' => 'address', 
        'value' => $property->address
      ])
      @include('shared.input', [
        'label'=> 'City', 
        'class' => 'col', 
        'name' => 'city', 
        'value' => $property->city
      ])
      @include('shared.input', [
        'label'=> 'Postal Code', 
        'class' => 'col', 
        'name' => 'postal_code', 
        'value' => $property->postal_code
      ])
      @include('shared.input', [
      'label'=> 'Picture', 
      'class' => 'col', 
      'name' => 'picture', 
      'value' => $property->picture
    ])
    </div>
    <div class="row mt-3">
    @include('shared.select', [
      'label'=> 'Options', 
      'class' => 'col', 
      'name' => 'options', 
      'value' => $property->options()->pluck('id'),
      'options' => $options
    ])
    </div>
    
    <div class="row m-3">
    @include('shared.chbx', [
      'label'=> 'Sold', 
      'class' => 'col', 
      'name' => 'sold', 
      'value' => $property->sold
    ])
    </div>

    <div class="mt-4">
      <button class="btn btn-primary">
        @if ($property->exists)
            Update
        @else
            Add
        @endif
      </button>
    </div>
    </form>
@endsection