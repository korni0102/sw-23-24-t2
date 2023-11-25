@extends('navbar.navbar')

@section('body')
    @if (auth()->user())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Tel</th>
                <th scope="col">Role_id</th>
                <th scope="col">Study_program_id</th>
                <th scope="col">Year</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->tel }}</td>
                    <td>{{ $user->role_id }}</td>
                    <td>{{ $user->study_program_id }}</td>
                    <td>{{ $user->year }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif
@endsection
