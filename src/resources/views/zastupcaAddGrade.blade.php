@extends('navbar.navbar')

@section('body')
@if (auth()->user())

<div class="position-absolute top-50 start-50 translate-middle">
    <div class="card" style="width: 100%;">
        <img src="{{ asset('images/logo.jpg') }}" style="height: 250px; width: auto; padding: 5px" class="card-img-top mx-auto my-auto" alt="Logo">
            <div class="card-body">
            <h5 class="card-title">Pridaj Hodnotenie</h5>
            <form action="{{ route('zastupcaSaveGrade', ['contractId' => $contractId]) }}" method="POST">
                @csrf
                <br>
                @php
                    $attributes = [
                        'vystupovanie', 'jednanie_s_klientom', 'samostatnost_prace',
                        'tvorivy_pristup', 'dochvilnost', 'dodrzovanie_etickych_zasad',
                        'motivacia', 'doslednost_pri_plneni_povinnosti', 'ochota_sa_ucit',
                        'schopnost_spolupracovat', 'vyuzitie_pracovnej_doby'
                    ];
                @endphp

                @foreach($attributes as $attribute)
                    <h5 class="card-title">{{ ucfirst(str_replace('_', ' ', $attribute)) }}</h5>
                    <select name="{{ $attribute }}" class="form-control" required>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    @error($attribute)
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                @endforeach

                <h5 class="card-title">Spätná väzba</h5>
                <textarea name="feedback" placeholder="Feedback" class="form-control" required></textarea>
                @error('feedback')
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
