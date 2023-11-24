<!-- resources/views/admin_view_companies.blade.php -->

@extends('navbar.navbar')

@section('body')
    @if (auth()->user())
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Firma</th>
                    <th scope="col">Adresa</th>
                    <th scope="col">Akcie</th> <!-- New column for actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->address }}</td>
                        <td>
                            <!-- Add feedback button -->
                            <a href="{{ route('addFeedback', ['company' => $company->id]) }}" class="btn btn-success">Vložiť spätnú väzbu</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
