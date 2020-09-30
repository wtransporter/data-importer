@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="import/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Import data from selected file.</label>
                <input type="file" class="form-control-file" name="file" id="file">
                <input type="submit" value="Import data" name="submit">
            </div>
        </form>
    </div>
    
@endsection