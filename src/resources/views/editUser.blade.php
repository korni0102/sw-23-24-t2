@extends('navbar.navbar')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form method="post" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('put')
                            <input type="hidden" name="redirect_to" value="{{ $redirectView }}">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Krstné meno:</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="lastname" class="form-label">Priezvisko:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Adresa:</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Školský rok:</label>
                                <input type="text" class="form-control" id="year" name="year" value="{{ $user->year }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tel" class="form-label">Telefónne číslo:</label>
                                <input type="text" class="form-control" id="tel" name="tel" value="{{ $user->tel }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Potvrdiť</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
