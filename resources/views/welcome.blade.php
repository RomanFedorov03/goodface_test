@extends('includes.header')

@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Mankind</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Male: {{ $sexPercent['m'] }}%</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Female: {{ $sexPercent['f']}}%</a>
                        </li>
                    </ul>
                    <form action="{{ route('load_csv') }}" method="POST" enctype="multipart/form-data" class="d-flex">
                        @csrf
                        <input class="form-control me-2" name="csv" type="file" required>
                        <button class="btn btn-outline-success" type="submit">Load</button>
                    </form>
                </div>
            </div>
        </nav>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Birth Date</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Age in days</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                @foreach($persons as $person)
                    <tr>
                        <th scope="row">{{ $person->id }}</th>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->surname }}</td>
                        <td>{{ $person->birth_date }}</td>
                        <td>{{ $person->sex }}</td>
                        <td>{{ $person->age }} days</td>
                        <td><a href="{{ route('person', ['id' => $person->id]) }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
