@extends('navbar.navbar')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pridať hodnotenie</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form method="post" action="{{ route('changeGradePPP', $contract->id) }}">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="name" class="form-label">Hodnotenie</label>
                                <input type="text" class="form-control" id="hodnotenie" name="hodnotenie" value="{{ $contract->hodnotenie }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Potvrdiť</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
