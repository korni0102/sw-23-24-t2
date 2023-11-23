@extends('navbar.navbar')

@section('body')
@if (auth()->user())

<div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 100%;">
            <img src="{{ asset('images/logo.jpg') }}" style="height: 250px; width: auto; padding: 5px" class="card-img-top mx-auto my-auto" alt="Logo">
                <div class="card-body">
                <h5 class="card-title">Pridaj Firmu</h5>
                <form action="{{ route('saveCompany') }}" method="post">
                    @csrf
                    <h5 class="card-title">Nazov Firmy</h5>
                    <input type="text" placeholder="Name" id="name" name="name" class="form-control" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <h5 class="card-title">Adresa Firmy</h5>
                    <input type="text" placeholder="Address" id="address" name="address" class="form-control" required>
                    @error('address')
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