@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-6">
            @if (Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif
            @foreach($errors->all() as $error)
			    <p class="alert alert-danger">{{ $error }}</p>
		    @endforeach
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Role name</label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="label">Role label</label>
                    <input class="form-control" type="text" name="label" id="label" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection