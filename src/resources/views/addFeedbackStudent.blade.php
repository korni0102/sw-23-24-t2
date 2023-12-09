@extends('navbar.navbar')

@section('body')
@if (auth()->user())

<div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 100%;">
            <img src="{{ asset('images/logo.jpg') }}" style="height: 250px; width: auto; padding: 5px" class="card-img-top mx-auto my-auto" alt="Logo">
                <div class="card-body">
                <h5 class="card-title">Pridaj Feedback</h5>
                <form action="{{ route('feedback.store', ['contractId' => $contractId]) }}" method="POST">
                    @csrf
                    <br>
                    <h5 class="card-title">Description</h5>
                    <input type="text" placeholder="Description" id="text" name="text" class="form-control" required>
                    @error('description')
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


            
        

                