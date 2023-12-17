@extends('navbar.navbar')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Informácie o profile</div>

                    <div class="card-body">
                        @if($user)
                            <form>
                                <div class="mb-3">
                                    <label for="firstname" class="form-label">Krstne meno:</label>
                                    <input type="text" class="form-control" id="firstname" value="{{ $user->firstname }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="lastname" class="form-label">Priezvisko:</label>
                                    <input type="text" class="form-control" id="lastname" value="{{ $user->lastname }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Adresa:</label>
                                    <input type="text" class="form-control" id="address" value="{{ $user->address }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="year" class="form-label">Školský rok:</label>
                                    <input type="text" class="form-control" id="year" value="{{ $user->year }}" readonly>
                                </div>

                                <a href="{{ route('edit.profile') }}" class="btn btn-primary">Potvrdiť</a>
                            </form>
                        @else
                            <p>Nemáme informácie.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
