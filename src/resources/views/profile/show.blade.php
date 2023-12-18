@extends('navbar.navbar')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Informácie používateľa</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <h2>Profil</h2>
                        <p>Meno: {{ $user->firstname }} {{ $user->lastname }}</p>
                        <p>E-mail: {{ $user->email }}</p>
                        <p>Adresa: {{ $user->address }}</p>
                        <p>Školský rok: {{ $user->year }}</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Potvrdiť</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
