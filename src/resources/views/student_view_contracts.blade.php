@extends('navbar.navbar')

@section('body')
    @if (auth()->user())

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Krstné meno</th>
                    <th scope="col">Priezvisko</th>
                    <th scope="col">Firma</th>
                    <th scope="col">Názov</th>
                    <th scope="col">Popis práce</th>
                    <th scope="col">Od</th>
                    <th scope="col">Do</th>
                    <th scope="col">Akceptované</th>
                    <th scope="col">Zatvorené</th>
                    <th scope="col">Hodiny</th>
                    <th scope="col">Hodiny_accepted</th>
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
                    <td>{{ $contract->accepted ? "Áno" : "Nie"}}</td>
                    <td>{{ $contract->closed }}</td>
                    <td>
                        <form method="get" action="{{ route("hodinyOdpracovane", $contract->id) }}">
                            <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="hodiny_odpracovane" value="{{ $contract->hodiny_odpracovane }}">
                            @if(!$contract->hodiny_accepted)
                                <button type="submit" class="btn btn-dark" >Potvrdiť</button>
                            @endif

                        </form>
                    </td>
                    <td>{{ $contract->hodiny_accepted ? "Áno" : "Nie"}}</td>

                    <td> <a href="{{ url('/generate-pdf/' . $contract->id) }}" target="_blank">Generate PDF for Contract {{ $contract->id }}</a></td>

                </tr>
            @endforeach
            </tbody>
        </table>

       

    @endif
@endsection
