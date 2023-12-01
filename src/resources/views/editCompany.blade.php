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
                        <form method="post" action="{{ route('companies.update', $company->id) }}">
                            @csrf
                            @method('put')
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $company->address }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Company</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
