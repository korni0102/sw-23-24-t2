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
                    <th scope="col">Closed</th>
                    <th scope="col">Na stiahnutie</th>

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
                    <td>{{ $contract->job->description }}</td>
                    <td>{{ $contract->from }}</td>
                    <td>{{ $contract->to }}</td>
                    <td>{{ $contract->accepted }}</td>
                    <td>{{ $contract->closed }}</td>
                    <td> <a href="{{ url('/generate-pdf/' . $contract->id) }}" target="_blank">Generate PDF for Contract {{ $contract->id }}</a></td>

                </tr>
            @endforeach
            </tbody>
        </table>

        @foreach ($contracts as $contract)
            <a href="{{ url('/generate-pdf/' . $contract->id) }}" target="_blank">Generate PDF for Contract {{ $contract->id }}</a>
        @endforeach

    @endif
@endsection
