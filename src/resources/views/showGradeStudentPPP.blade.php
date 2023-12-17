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
                <th scope="col">Hodiny odpracované</th>
                <th scope="col">Hodiny akceptované</th>
                <th scope="col">Hodnotenie</th>
                <th scope="col">Akcie</th>

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
                    <td>{{ $contract->hodiny_odpracovane }}</td>
                    <td>{{ $contract->hodiny_accepted }}</td>
                    @if($contract->hodnotenie)
                        <td>{{ $contract->hodnotenie }}</td>
                    @else
                        <td>Nedali ste ešte hodnotenie</td>
                    @endif
                    <td>
                        <form action="{{ route('editGradePPP', $contract->id) }}" method="GET">
                            <button type="submit" class="btn btn-primary">Editovať hodnotenie</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    @endif
@endsection
