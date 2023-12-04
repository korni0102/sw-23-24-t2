@extends('navbar.navbar')

@section('body')
@if (auth()->user())

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Company</th>
            <th scope="col">Job_type</th>
            <th scope="col">Descripcion</th>
        </tr>
        </thead>
        <tbody>

        @foreach($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->company }}</td>
                <td>{{ $job->job_type }}</td>
                <td>{{ $job->description }}</td>
            </tr>
        @endforeach

    </table>
@endif
@endsection
