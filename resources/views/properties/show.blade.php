@extends('base')

@section('title', 'All our properties')

@section('content')

<!-- Header Start -->
<div class="container header bg-white p-0 mt-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">{{ $property->title }}</h1> 
                <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('property.index') }}">Property List</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">Property Detail</li>
                </ol>
            </nav>
            <h2>{{ $property->rooms }} rooms - {{ $property->surface }} sqft</h2>

            <div class="text-primary fw-bold" style="font-size: 2rem;">
              {{ number_format($property->price, thousands_separator:" ") }}$
            </div>
        </div>
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid" src="{{ $property->picture }}" alt="">
        </div>
    </div>
</div>
<!-- Header End -->
<div class="container-xxl py-5">
  <div class="container">
    <hr>
    @if ($property->sold)
      <div class="badge text-wrap bg-danger text-white fs-5">This property has been sold/rent</div>
    @else
      <div class="mt-4">
        <h4>Interested by this property? Send us a message and we will contact you as soon as possible</h4>

        @include('shared.flash')

        <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3">
          @csrf
          <div class="row mt-4">
            @include('shared.input', [
              'class' => 'col',
              'label'=> 'First Name', 
              'name' => 'firstname'
            ])
            @include('shared.input', [
              'class' => 'col',
              'label'=> 'Last Name', 
              'name' => 'lastname'
            ])
          </div>
          <div class="row mt-4">
            @include('shared.input', [
              'class' => 'col',
              'label'=> 'Phone', 
              'name' => 'phone'
            ])
            @include('shared.input', [
              'type' => 'email',
              'class' => 'col',
              'label'=> 'Email Address', 
              'name' => 'email'
            ])
          </div>
          @include('shared.input', [
            'type' => 'textarea',
            'class' => 'col mt-4',
            'label'=> 'Your message', 
            'name' => 'message'
          ])
          <div>
            <button class="btn btn-primary mt-4">Contact Us</button>
          </div>
        </form>
      </div>
    @endif
    <hr>
    <div class="mt-4 my-4">
      <p>{!! nl2br($property->description) !!}</p>
      <div class="row">
        <div class="col-8">
          <h2>Details</h2>
          <table class="table table-striped">
            <tr>
              <td>Surface</td>
              <td>{{ $property->surface }} sqft</td>
            </tr>
            <tr>
              <td>Number of rooms</td>
              <td>{{ $property->rooms }}</td>
            </tr>
            <tr>
              <td>Number of bedrooms</td>
              <td>{{ $property->bedrooms }}</td>
            </tr>
            <tr>
              <td>Number of bathrooms</td>
              <td>{{ $property->bath }}</td>
            </tr>
            <tr>
              <td>Location</td>
              <td>{{ $property->address }}, {{ $property->city }}, QC {{ $property->postal_code }}</td>
            </tr>
          </table>
        </div>
        <div class="col-4">
          <h2>Options</h2>
          <ul class="list-group">
            @foreach ($property->options as $option)
                <li class="list-group-item">{{ $option->name }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection