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
                    <th scope="col">Popis</th>
                    <th scope="col">Od</th>
                    <th scope="col">Do</th>
                    <th scope="col">Akceptované</th>
                    <th scope="col">Zatvorené</th>
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
                    <td>{{ $contract->job->description }}</td>
                    <td>{{ $contract->from }}</td>
                    <td>{{ $contract->to }}</td>
                    <td>{{ $contract->accepted }}</td>
                    <td>{{ $contract->closed }}</td>
                    @if($contract->hodnotenie)
                        <td>{{ $contract->hodnotenie }}</td>
                    @else
                        <td>Student este nedostal hodnotenie</td>
                    @endif


                </tr>
            @endforeach
            </tbody>
        </table>

    @endif
@endsection
