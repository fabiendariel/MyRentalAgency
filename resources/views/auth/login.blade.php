@extends('base')

@section('title', 'Authentification')

@section('content')

<div class="container mt-5 mx-auto col-4">
  <h1>@yield('title')</h1>

  @include('shared.flash')
  
  <h5>This website is a demo, you can access to back office with login john@doe.fr and password 0000</h5>

  <form action="{{ route('login') }}" method="post" class="vstack mt-4 gap-3">
    @csrf
    @include('shared.input', [
      'type' => 'email',
      'class' => 'col',
      'label'=> 'Courriel', 
      'name' => 'email'
    ])
    @include('shared.input', [
      'type' => 'password',
      'class' => 'col',
      'label'=> 'Mot de passe', 
      'name' => 'password'
    ])
    <div>
      <button class="btn btn-primary">Se connecter</button>
    </div>
  </form>
</div>

@endsection