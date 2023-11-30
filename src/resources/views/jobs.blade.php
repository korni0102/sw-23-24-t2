@extends('navbar.navbar')

@section('body')
@if (auth()->user())
    <div class="container">
        @if ($company)
            <h2>{{ $company->name }}</h2>

            @if ($company->jobs->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Job Description</th>
                            <th scope="col">Apply</th>
                            <th scope="col">Student Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($company->jobs as $job)
                            <tr>
                                <td>{{ $job->description }}</td>
                                <td>
                                    @if(auth()->user()->role_id == 2)
                                    <form action="{{ route('applyForJob', $job->id) }}" method="post">
    @csrf
    <button type="submit" class="btn btn-primary">Apply</button>
</form>
                                    @else
                                        <!-- Display a message or other content for non-student users -->
                                    @endif
                                </td>
                                <td>
                                    @if(auth()->user()->role_id == 2)
                                        {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                                    @else
                                        <!-- Display a message or other content for non-student users -->
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No job descriptions available for this company.</p>
            @endif
        @else
            <p>No company information available for this job.</p>
        @endif

        <!-- You can also add a back button or a link to go back to the previous page -->
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
@endif
@endsection
