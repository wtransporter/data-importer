@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-6">
            @if (Session::has('success'))
                <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            <form action="/users/{{ $user->id }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group">                  
                    <select class="custom-select" name="role" id="role">
						@foreach($roles as $role)
							<option value="{{ $role->id }}"
								@if($role->id == $user->roles()->first()->id))
									selected="selected"
								@endif>
								{{ $role->name }}
							</option>
						@endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection