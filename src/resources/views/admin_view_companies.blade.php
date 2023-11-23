@extends('navbar.navbar')

@section('body')
@if (auth()->user())
<form action="{{ route('addCompany') }}" method="get">
    @csrf

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Firma</th>
            <th scope="col">Adresa</th>
        </tr>
        </thead>
        <tbody>

        @foreach($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->address }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endif
@endsection
