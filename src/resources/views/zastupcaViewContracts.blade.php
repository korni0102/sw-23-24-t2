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
                <th scope="col">Hodiny_odpracovane</th>
                <th scope="col">Hodiny_accepted</th>
                <th scope="col">Spätná väzba</th>

            </tr>
            </thead>
            <tbody>
            @if(!is_null($contracts))
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
                        <td>{{ $contract->accepted  ? "Áno" : "Nie"}}</td>
                        <td>{{ $contract->closed  ? "Áno" : "Nie"}}</td>
                        <td>{{ $contract->hodiny_odpracovane }}</td>
                        <td>
                            <form method="get"
                                  action="{{ route("zastupcaAcceptContract", [$contract->id, $contract->hodiny_accepted]) }}">
                                <button type="submit"
                                        class="btn {{ $contract->hodiny_accepted  ? "btn-success" : "btn-danger"}}">{{ $contract->hodiny_accepted  ? "Akceptovane" : "Akceptovat"}}</button>
                            </form>
                        </td>

                        <td>

                            @if ($contract->grade)
                                <span>Už ste pridali spätnú väzbu</span>
                            @else
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#feedbackModal"
                                        onclick="window.location='{{ route('zastupcaAddGrade', ['contractId' => $contract->id]) }}'">
                                    Napísať spätnú väzbu
                                </button>
                            @endif
                        </td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    @endif
@endsection
