@extends('navbar.navbar')
@section('body')

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
        </div>
        <script>
            setTimeout(function () {
                $('.alert').alert('close');
            }, 5000);
        </script>
    @endif
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function () {
                $('.alert').alert('close');
            }, 5000);
        </script>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Meno</th>
            <th scope="col">Rola</th>
            <th scope="col">Akceptované</th>
            <th scope="col">Admin meno</th>
            <th scope="col">Akcie</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
                <td>
                    {{ $request->user->firstname
                        . " " .
                        $request->user->lastname}}
                </td>
                <td>{{ $request->role->role}}
                </td>
                <td style="font-size: 30px!important;">{!! $request->accepted ? '<i class="bi bi-toggle-on"></i>' : '<i class="bi bi-toggle-off"></i>' !!}</td>
                <td>
                @if(!is_null($request->admin))
                    {{ $request->admin->firstname . " " . $request->admin->lastname }}
                @else
                    Neni admin
                @endif

                </td>
                <td>
                    <form method="post"
                          action="{{ route('admin.changeRequestStatus', [$request->id, $request->accepted]) }}">
                        @csrf
                        <button class="btn btn-dark" type="submit">
                            Zmeniť stav
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
