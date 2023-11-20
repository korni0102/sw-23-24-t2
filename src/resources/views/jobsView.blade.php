@extends('navbar.navbar')

@section('body')
@if (auth()->user())

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Company_id</th>
            <th scope="col">Contract_id</th>
            <th scope="col">Descripcion</th>
        </tr>
        </thead>
        <tbody>

        @foreach($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->company_id }}</td>
                <td>{{ $job->contract_id }}</td>
                <td>{{ $job->description }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endif
@endsection