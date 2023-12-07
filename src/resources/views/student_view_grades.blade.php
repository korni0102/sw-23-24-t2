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
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Hodnotenie</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($contracts as $contract)

                <tr>
                    <td>{{ $contract->user->firstname }}</td>
                    <td>{{ $contract->user->lastname }}</td>
                    @if($contract->job->company)
                        <td>{{ $contract->job->company?->name }}</td>
                    @else
                        <td>Neaktivna spolocnost</td>
                    @endif
                    <td>{{ $contract->job->name }}</td>
                    <td>{{ $contract->from }}</td>
                    <td>{{ $contract->to }}</td>
                    <td>{{ $contract->hodnotenie }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>

    @endif
@endsection
