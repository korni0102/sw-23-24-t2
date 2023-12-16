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
                <th scope="col">Hodiny_odpracovane</th>
                <th scope="col">Hodiny_accepted</th>
                <th scope="col">Feedback</th>

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
                            <form method="get" action="{{ route("zastupcaAcceptContract", [$contract->id, $contract->hodiny_accepted]) }}">
                                <button type="submit" class="btn {{ $contract->hodiny_accepted  ? "btn-success" : "btn-danger"}}" >{{ $contract->hodiny_accepted  ? "Akceptovane" : "Akceptovat"}}</button>
                            </form>
                        </td>

                        <td>
       
            @if ($contract->grade)
                <span>You have added feedback</span>
            @else
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#feedbackModal" onclick="window.location='{{ route('zastupcaAddGrade', ['contractId' => $contract->id]) }}'">
                    Give Feedback
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
