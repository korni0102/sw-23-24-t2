@extends('navbar.navbar')

@section('body')
    @if (auth()->user())

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Meno</th>
                    <th scope="col">Priezvisko</th>
                    <th scope="col">Firma</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Accepted</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($contracts as $contract)

                <tr>
                    <td>{{ $contract->user->firstname }}</td>
                    <td>{{ $contract->user->lastname }}</td>
                    <td>{{ $contract->job->company->name }}</td>
                    <td>{{ $contract->job->name }}</td>
                    <td>{{ $contract->job->description }}</td>
                    <td>{{ $contract->from }}</td>
                    <td>{{ $contract->to }}</td>
                    <td>{{ $contract->accepted }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>

    @endif
@endsection