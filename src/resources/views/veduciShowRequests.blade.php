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
                <th scope="col">Priradit PPP</th>
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
                        <li class="list-group-item">
                            <select style="border-radius: 0px" class="form-select form-select-lg mb-3" id="ppp_id" name="ppp_id" onchange="ajax({{$jobrequest->id}}, this)">
                                <option value="" disabled {{ is_null($jobrequest->ppp_id) ? "selected" : ""}} hidden>Povereny pracovnik pracoviska</option>
                                @foreach($usersWithRoleFour as $userppp)
                                    <option {{ $jobrequest->ppp_id == $userppp->id ? 'selected' : ''}} value="{{ $userppp->id }}">{{ $userppp->firstname }} {{ $userppp->lastname }}</option>
                                @endforeach
                            </select>
                        </li>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            // CSRF token setup for AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Bind the AJAX call to the button's click event
            function ajax(jobRequestId, button) {
                $.ajax({
                    url: '{{ route('requestAjax') }}', // Make sure the route is correct
                    type: 'GET',
                    data: {
                        jobRId: jobRequestId,
                        pppId: button.value,
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr) {
                        // Handle errors
                    }
                });
            }
        </script>
    @endif
@endsection
