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
                <th scope="col">Feedback</th>
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
                    <td>{{ $contract->from }}</td>
                    <td>{{ $contract->to }}</td>
                    <td>{{ $contract->hodnotenie }}</td>
                     <td>
                     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#feedbackModal" onclick="window.location='{{ route('feedback.create', ['contractId' => $contract->id]) }}'">
                        Give Feedback
                    </button>

                    </td>
                    <td> 
            <a href="{{ url('/generate-pdf_badge/' . $contract->id) }}" target="_blank">Generate PDF for Contract {{ $contract->id }}</a>
        </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        
    @endif
@endsection
