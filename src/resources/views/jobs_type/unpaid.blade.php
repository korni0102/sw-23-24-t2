@extends('navbar.navbar')

@section('body')
    @if (auth()->user())
        <h2>Unpaid Jobs</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Company ID</th>
                    <th scope="col">Job Type</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>{{ $job->id }}</td>
                        <td>{{ $job->company->name }}</td>
                        <td>{{ $job->job_type }}</td>
                        <td>{{ $job->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
