@extends('navbar.navbar')

@section('body')
    @if (auth()->user())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Krstné meno</th>
                <th scope="col">Priezvisko</th>
                <th scope="col">Študijný program</th>
                <th scope="col">Firma</th>
                <th scope="col">Názov</th>
                <th scope="col">Akcia Akceptovať</th>
                <th scope="col">Akcia Vymazať</th>

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
                    <td>
                        <form action="{{ route('job-requests.accept', $jobrequest->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                    </td>
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
