@extends('layouts.app')

@section('content')
    
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of birth</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $client->first_name }}</td>
                        <td>{{ $client->last_name }}</td>
                        <td>{{ $client->date_of_birth }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    
@endsection