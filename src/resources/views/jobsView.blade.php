@extends('navbar.navbar')

@section('body')
@if (auth()->user())
<h2 class="display-3">Jobs list</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Company_id</th>
            <th scope="col">Company_id</th>
            <th scope="col">Contract_id</th>
            <th scope="col">Descripcion</th>
        </tr>
        </thead>
        <tbody>

        @foreach($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->name }}</td>
                <td>{{ $job->company_id }}</td>
                <td>{{ $job->contract_id }}</td>
                <td>{{ $job->description }}</td>
            </tr>
        @endforeach
        

        @foreach ($jobs as $job)
    <div class="card mb-3">
        <div class="card-body">
            <a style="text-decoration: none" href="{{ route('jobs.showDetails', $job->id) }}" class="font-weight-bold custom-hover">
            <h5 class="card-title">Job: {{ $job->name }}</h5>
            </a>
            <ul class="list-group">
                @foreach ($job->companies as $company)
                    <li class="list-group-item">
                        <a>Company: {{ $company->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endforeach


        </tbody>
    </table>

    <style>
        .custom-hover{
        color: blue;
        }
    .custom-hover:hover {
        color: red; /* Change this to the desired hover color */
        text-decoration: underline;
    }
@endif
@endsection