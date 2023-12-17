@extends('navbar.navbar')

@section('body')
    @if (auth()->user())

        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card" style="width: 100%;">
                <img src="{{ asset('images/logo.jpg') }}" style="height: 250px; width: auto; padding: 5px" class="card-img-top mx-auto my-auto" alt="Logo">
                <div class="card-body">
                    <h5 class="card-title">Pridaj kontakt</h5>
                    <form action="{{ route('saveContactAdmin') }}" method="post">
                        @csrf
                        <h5 class="card-title">Krstné meno</h5>
                        <input type="text" placeholder="FirstName" id="firstname" name="firstname" class="form-control" required>
                        @error('firstname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        <h5 class="card-title">Priezvisko</h5>
                        <input type="text" placeholder="LastName" id="lastname" name="lastname" class="form-control" required>
                        @error('lastname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>

                        <br>
                        <h5 class="card-title">Telefónne číslo</h5>
                        <input type="text" placeholder="Tel" id="tel" name="tel" class="form-control" required>
                        @error('tel')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>

                        <br>
                        <h5 class="card-title">E-mail</h5>
                        <input type="text" placeholder="Email" id="email" name="email" class="form-control" required>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>

                        <h5 class="card-title">Vybrať firmu</h5>
                        <select name="company_id" id="company_id" class="form-control" required>
                            <option value="">Vyberte si firmu</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>


                        <button type="submit" class="btn btn-warning" style="text-align: center">Potvrdiť</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
