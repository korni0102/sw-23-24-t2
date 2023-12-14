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

                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label for="firstname" class="form-label">First Name:</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ auth()->user()->firstname }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="lastname" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ auth()->user()->lastname }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Year:</label>
                                <input type="text" class="form-control" id="year" name="year" value="{{ auth()->user()->year }}" required>
                            </div>

                            <br>
                            @if($companies)
                                <div class="form-group">
                                    <li class="list-group-item">
                                        <select style="border-radius: 0px" class="form-select form-select-lg mb-3" id="company_id" name="company_id" required>
                                            <option value="" disabled {{ is_null($attachedCompany) ? 'selected' : '' }}>Company</option>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}" {{ $attachedCompany && $attachedCompany->company_id == $company->id ? 'selected' : '' }}>
                                                    {{ $company->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </li>
                                </div>
                            @endif


                            @error('role_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
