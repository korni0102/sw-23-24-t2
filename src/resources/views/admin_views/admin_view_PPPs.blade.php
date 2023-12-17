@extends('navbar.navbar')

@section('body')
@if (auth()->user())
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Krstné menp</th>
            <th scope="col">Priezvisko</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefónne číslo</th>
            <th scope="col">Role</th>
            <th scope="col">Školský rok</th>
            <th scope="col">Akcie</th>
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
                <td>{{ $user->role->role }}</td>
                <td>{{ $user->year }}</td>
                <td style="display: flex; flex-direction: row; justify-content: space-around; align-items: center;">
                    <form action="{{ route('users.edit', $user->id) }}" method="GET">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <input type="hidden" name="redirect_to" value="showPPPs">
                    </form>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endif
@endsection

