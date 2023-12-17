@extends('navbar.navbar')

@section('body')
    @if (auth()->user())

        <table class="table">
            <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Vystupovanie</th>
                <th scope="col">Jednanie s klientom</th>
                <th scope="col">Samostatnosť práce</th>
                <th scope="col">Tvorivý prístup</th>
                <th scope="col">Dochvilnosť</th>
                <th scope="col">Dodržovanie etických zásad</th>
                <th scope="col">Motivácia</th>
                <th scope="col">Dôslednosť pri plnení povinností</th>
                <th scope="col">Ochota sa učiť</th>
                <th scope="col">Schopnosť spolupracovať</th>
                <th scope="col">Využitie pracovnej doby</th>
                <th scope="col">Feedback</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($grades as $grade)
                <tr>
                    <td>{{ $grade->user->firstname . ' ' . $grade->user->lastname }}</td>
                    <td>{{ $grade->vystupovanie }}</td>
                    <td>{{ $grade->jednanie_s_klientom }}</td>
                    <td>{{ $grade->samostatnost_prace }}</td>
                    <td>{{ $grade->tvorivy_pristup }}</td>
                    <td>{{ $grade->dochvilnost }}</td>
                    <td>{{ $grade->dodrzovanie_etickych_zasad }}</td>
                    <td>{{ $grade->motivacia }}</td>
                    <td>{{ $grade->doslednost_pri_plneni_povinnosti }}</td>
                    <td>{{ $grade->ochota_sa_ucit }}</td>
                    <td>{{ $grade->schopnost_spolupracovat }}</td>
                    <td>{{ $grade->vyuzitie_pracovnej_doby }}</td>
                    <td>{{ $grade->feedback }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif
@endsection
