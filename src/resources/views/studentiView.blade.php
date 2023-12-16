@extends('navbar.navbar')

@section('body')
    @if (auth()->user())
        <table class="table">
        @if(auth()->user()->role_id==4)
            
        <div>
            <form action="{{ route('showStudentsVeduci') }}" method="get" >
                @csrf
                <label for="study_program_filter">Filter by Study Program:</label>
                <select name="study_program_filter" id="study_program_filter">
                <option value="" >Všetky programy</option>
                    
                    @foreach($studyPrograms as $program)
                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                    @endforeach
                </select>

                <label for="year_filter">Filter by Year:</label>
                <input type="text" name="year_filter" id="year_filter" placeholder="Enter year">

                <button type="submit">Apply Filters</button>
            </form>
        </div>
        @endif

            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Tel</th>
                <th scope="col">Role</th>
                <th scope="col">Study_program</th>
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
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->tel }}</td>
                    <td>{{ $user->role->role }}</td>
                    <td>{{ $user->studyProgram->name }}</td>
                    <td>{{ $user->year }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif
@endsection
