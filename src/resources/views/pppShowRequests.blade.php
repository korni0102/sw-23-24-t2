@extends('navbar.navbar')

@section('body')
    @if (auth()->user())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Study Program</th>
                <th scope="col">Firma</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>

            </tr>
            </thead>
            <tbody>

            @foreach($jobrequests as $jobrequest)
                <tr>
                    <td>{{ $jobrequest->id }}</td>
                    <td>{{ $jobrequest->user->firstname }}</td>
                    <td>{{ $jobrequest->user->lastname }}</td>
                    <td>{{ $jobrequest->user->studyProgram->name }}</td>

                    <td>{{ $jobrequest->job->company->name }}</td>
                    <td>{{ $jobrequest->job->name }}</td>
                    <td>{{ $jobrequest->address }}</td>
                    <td>{{ $jobrequest->tel }}</td>
                    <td>
                        <form action="{{ route('jobRequestPPP.destroy', $jobrequest->id) }}" method="POST">
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
