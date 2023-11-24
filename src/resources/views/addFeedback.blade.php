@extends('navbar.navbar')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vložiť spätnú väzbu pre {{ $company->name }}</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form method="post" action="{{ route('saveFeedback') }}">
                            @csrf

                            <input type="hidden" name="company_id" value="{{ $company->id }}">

                            <div class="mb-3">
                                <label for="comment" class="form-label">Komentár:</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Pridať spätnú väzbu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
