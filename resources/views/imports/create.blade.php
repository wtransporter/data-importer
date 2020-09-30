@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="import/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="card">
                    <div class="card-header">
                        <label for="file">Import data from selected file.</label>
                    </div>
                    <div class="card-body">
                        <p><input type="file" class="form-control-file" name="file" id="file" ></p>                        
                        <footer><input type="submit" value="Import data" name="submit"></footer>
                    </div>
                </div>
            </div>
        </form>
        @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    {{ $error }}<br/>
                @endforeach
            </div>
        @endif

    </div>
    
@endsection