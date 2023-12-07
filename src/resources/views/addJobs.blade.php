@extends('navbar.navbar')

@section('body')
@if (auth()->user())

<div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 100%;">
            <img src="{{ asset('images/logo.jpg') }}" style="height: 250px; width: auto; padding: 5px" class="card-img-top mx-auto my-auto" alt="Logo">
                <div class="card-body">
                <h5 class="card-title">Pridaj Job</h5>
                <form action="{{ route('saveJob') }}" method="post">
                    @csrf
                    <h5 class="card-title">Name</h5>
                    <input type="text" placeholder="Name" id="name" name="name" class="form-control" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <h5 class="card-title">Description</h5>
                    <input type="text" placeholder="Description" id="description" name="description" class="form-control" required>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    

                    <select name="job_type" id="job_type" class="form-control" required>
                        <option value="">Select Job Type</option>
                        <option value="parttime">Part-Time</option>
                        <option value="fulltime">Full-Time</option>
                        <option value="paid">Paid</option>
                        <option value="unpaid">Unpaid</option>
                        <option value="freelancer">Freelancer</option>
                    </select>
                    @error('job_type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <br>
                    
                    <select name="contact_id" id="contact_id" class="form-control" required>
                    <option value="">Contact</option>
                    @foreach($contacts as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->firstname }} {{ $contact->lastname }}</option>

                    
                    </option>
                    @endforeach
                    </select>
                    @error('contact_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>

                    <br>
                    
                    <select name="company_id" id="company_id" class="form-control" required>
                    <option value="">Company</option>
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