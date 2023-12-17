@extends('navbar.navbar')

@section('body')
    @if (auth()->user())

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Firma</th>
                <th scope="col">Typ práce</th>
                <th scope="col">Meno práce</th>
                <th scope="col">Popis práce</th>
                <th scope="col">Kontaktná osoba</th>
            </tr>
            </thead>
            <tbody>

            @foreach($jobs as $job)
                <tr>
                    <td>{{ $job->company->name }}</td>
                    <td>{{ $job->job_type }}</td>
                    <td>{{ $job->name }}</td>
                    <td>{{ $job->description }}</td>
                    <td>{{ $job->contact->firstname . " " . $job->contact->lastname }}</td>
                </tr>
            @endforeach

        </table>
    @endif
@endsection
