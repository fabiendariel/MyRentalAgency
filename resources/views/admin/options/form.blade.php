@extends('admin.admin')

@section('title', $option->exists ? "Edit an option" : "Add an option")
    
@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{ route( $option->exists ? 'admin.option.update' : 'admin.option.store', ['option' => $option]) }}" method="post">
    
    @csrf
    @method($option->exists ? 'put' : 'post')
    
    <div class="rowmt-3">
      @include('shared.input', [
        'class' => 'col',
        'label'=> 'Name', 
        'name' => 'name', 
        'value' => $option->name
      ])
    </div>
    <div class="mt-4">
      <button class="btn btn-primary">
        @if ($option->exists)
            Edit
        @else
            Add
        @endif
      </button>
    </div>
    </form>
@endsection