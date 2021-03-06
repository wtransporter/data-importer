@extends('layouts.app')

@section('content')
    
    <div class="container">
        @if (count($clients) > 0)
        <p>Male</p>
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
                    @if ($client->gender == 'male')
                        <tr>
                            <th scope="row">{{ $client->id }}</th>
                            <td>{{ $client->first_name }}</td>
                            <td>{{ $client->last_name }}</td>
                            <td>{{ $client->date_of_birth }}</td>
                        </tr>                        
                    @endif
                @endforeach
            </tbody>
        </table>
        <p>Female</p>
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
                    @if ($client->gender == 'female')
                        <tr>
                            <th scope="row">{{ $client->id }}</th>
                            <td>{{ $client->first_name }}</td>
                            <td>{{ $client->last_name }}</td>
                            <td>{{ $client->date_of_birth }}</td>
                        </tr>                        
                    @endif
                @endforeach
            </tbody>
        </table>
        @else
            <p>No data available.
                @if (Auth::user()->hasRole('admin'))
                    <a href="import">Import from file ?</a>
                @endif
            </p>
        @endif
    </div>
    
@endsection