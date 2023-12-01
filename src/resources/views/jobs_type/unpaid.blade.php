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
                    <th scope="col">Nacitaj viac</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>{{ $job->id }}</td>
                        <td>{{ $job->company->name }}</td>
                        <td>{{ $job->job_type }}</td>
                        <td>{{ $job->name }}</td>
                        <td>
                            <button class="btn btn-dark" onclick="toggleContacts({{ $job->id }})">
                                Description
                            </button>
                        </td>
                    </tr>
                    <tr id="job_{{ $job->id }}" style="display: none;">
                        <td colspan="5">
                            <table class="table table-dark mb-0">
                                <tbody>
                                <tr>
                                    <td colspan="4" class="text-start" style="padding-right: 15% !important;">
                                        {{ $job->description }}
                                    </td>
                                    <td colspan="1" class="text-end" style="padding-right: 15% !important;">
                                        <form method="GET" action="{{ route('requestUnpaid') }}">
                                            <input type="hidden" value="{{ $job->id }}" name="jobId">
                                            <button type="submit" class="btn btn-light">
                                                Prihlásiť sa
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            function toggleContacts(jobId) {
                var contactsInfo = document.getElementById('job_' + jobId);
                if (contactsInfo.style.display === "none") {
                    contactsInfo.style.display = "table-row";
                } else {
                    contactsInfo.style.display = "none";
                }
            }
        </script>
    @endif
@endsection
