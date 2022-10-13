@extends('includes.header')
@section('title', "$person->surname $person->name")
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Sex</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $person->id }}</th>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->surname }}</td>
                    <td>{{ $person->birth_date }}</td>
                    <td>{{ $person->age }}</td>
                    <td>{{ $person->sex }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
