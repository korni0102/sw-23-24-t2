@extends('navbar.navbar')

@section('body')
@if (auth()->user())
<div>
           <form action="{{ route('showStudents') }}" method="get" >
                @csrf
                <label for="study_program_filter">Filter by Study Program:</label>
                <select name="study_program_filter" id="study_program_filter">
                <option value="">Všetky programy</option>
                    @foreach($studyPrograms as $program)
                    <option value="{{ $program->id }}" {{ $studyProgramId == $program->id ? 'selected="selected"' : '' }}>{{ $program->name }}</option>
                    @endforeach
                </select>

                <label for="year_filter">Filter by Year:</label>
                <input type="text" name="year_filter" id="year_filter" placeholder="Enter year" value={{ $year }}>

                <button type="submit">Apply Filters</button>
                
            </form>
        </div>
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
                        @csrf
                        <button type="submit" class="btn btn-primary">Update</button>
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
            <tr>
                <form method='get' action='{{ route("downoloadPDF") }}'>
                @csrf
                    <input type='hidden' value='{{ json_encode($users) }}' name='users'>
                    <button type="submit" name="export" value="pdf">Export to PDF</button>
                </form>
            </tr>
        </tbody>
    </table>

@endif
@endsection
