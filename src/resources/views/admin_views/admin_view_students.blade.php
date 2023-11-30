@extends('navbar.navbar')

@section('body')
@if (auth()->user())
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            <th scope="col">Tel</th>
            <th scope="col">Role</th>
            <th scope="col">Studijny Program</th>
            <th scope="col">Year</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->tel }}</td>
                <td>{{ $user->role->role }}</td>
                <td>{{ $user->studyProgram->name }}</td>
                <td>{{ $user->year }}</td>
                <td style="display: flex; flex-direction: row; justify-content: space-around; align-items: center;">
                    <form action="{{ route('users.edit', $user->id) }}" method="GET">
                        <button type="submit" class="btn btn-primary">Update</a>
                        <input type="hidden" name="redirect_to" value="showStudents">
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
