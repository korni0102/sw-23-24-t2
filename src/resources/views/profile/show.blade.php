@extends('navbar.navbar')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Information</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <h2>User Information</h2>
                        <p>Name: {{ $user->firstname }} {{ $user->lastname }}</p>
                        <p>Email: {{ $user->email }}</p>
                        <p>Year: {{ $user->year }}</p>
                        <!-- Add other user information fields as needed -->

                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
