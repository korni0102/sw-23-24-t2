@extends('navbar.navbar')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editovanie profilu</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label for="firstname" class="form-label">Krtsné meno:</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ auth()->user()->firstname }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="lastname" class="form-label">Priezvisko:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ auth()->user()->lastname }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Adresa:</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Školský rok:</label>
                                <input type="text" class="form-control" id="year" name="year" value="{{ auth()->user()->year }}" required>
                            </div>

                            <br>
                            @if($companies)
                                <div class="form-group">
                                    <li class="list-group-item">
                                        <label for="company_id" class="form-label">Vyberte si company (ked ste si vybrali, nemozete to zmenit)</label>
                                        <select style="border-radius: 0px" class="form-select form-select-lg mb-3" id="company_id" name="company_id"
                                                 {{ $attachedCompany ? 'disabled' : '' }} required>
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

                            <button type="submit" class="btn btn-primary">Potvrdiť</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
