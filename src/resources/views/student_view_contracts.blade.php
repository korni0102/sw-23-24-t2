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
                    <th scope="col">Hodiny</th>
                    <th scope="col">Hodiny_accepted</th>

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
                    <td>{{ $contract->accepted ? "Áno" : "Nie"}}</td>
                    <td>{{ $contract->closed }}</td>
                    <td>
                        <form method="get" action="{{ route("hodinyOdpracovane", $contract->id) }}">
                            <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="hodiny_odpracovane" value="{{ $contract->hodiny_odpracovane }}">
                            @if(!$contract->hodiny_accepted)
                                <button type="submit" class="btn btn-dark" >Submit</button>
                            @endif

                        </form>
                    </td>
                    <td>{{ $contract->hodiny_accepted ? "Áno" : "Nie"}}</td>


                </tr>
            @endforeach
            </tbody>
        </table>

        @foreach ($contracts as $contract)
            <a href="{{ url('/generate-pdf/' . $contract->id) }}" target="_blank">Generate PDF for Contract {{ $contract->id }}</a>
        @endforeach

    @endif
@endsection
