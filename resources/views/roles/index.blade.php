@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @endif
        @foreach ($roles as $role)
            <p>
                Role name: {{ $role->name }} </br>
                Role Label: {{ $role->label }}
            </p>
            <form action="/roles/{{$role->id}}" method="post">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </form>
        @endforeach
        <p>
            <a href="{{ route('role.create') }}" class="btn btn-primary">Add Role</a>
        </p>
    </div>
@endsection