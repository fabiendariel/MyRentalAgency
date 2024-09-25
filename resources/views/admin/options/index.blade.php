@extends('admin.admin')

@section('title', 'All options')

@section('content')

  <div class="d-flex justify-content-between align-items-center">
    <h1>@yield('title')</h1>
    <a href="{{ route('admin.option.create') }}" class="btn btn-primary">Add an option</a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th class="text-end">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($options as $option)
        <tr>
          <td>{{ $option->name }}</td>
          <td>
            <div class="d-flex gap-2 w-100 justify-content-end">
            <a href="{{ route('admin.option.edit', $option) }}" class="btn btn-secondary">Edit</a>
            <form action="{{ route('admin.option.destroy', $option) }}" method="post">
              @csrf
              @method("delete")
             <button class="btn btn-danger">Delete</button>
            </form>
            </div>
          </td>
        </tr>
    @endforeach
    </tbody>
  </table>

  {{ $options->links() }}
    
@endsection
