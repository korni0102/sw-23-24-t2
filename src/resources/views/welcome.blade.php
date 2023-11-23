@extends('navbar.navbar')
@section('body')

    @if(auth()->user()->role_id==1)
        <h1>Vítajte na stránke pre evidovanie študentskej praxe!</h1>
        <h1>Vykonajte vaše adminiské povinnosti</h1>
    @endif

    @if(auth()->user()->role_id==2)
        <h1>Vítajte na stránke pre evidovanie študentskej praxe!</h1>
        <h1>Vyhladávajte a prihláste sa na prax!</h1>
    @endif

    @if(auth()->user()->role_id==3)
        <h1>Vítajte na stránke pre evidovanie študentskej praxe!</h1>
        <h1>Vykonajte vaše PPP povinnosti</h1>
    @endif

    @if(auth()->user()->role_id==4)
        <h1>Vítajte na stránke pre evidovanie študentskej praxe!</h1>
        <h1>Vykonajte vaše vedúce povinnosti</h1>
    @endif

    @if(auth()->user()->role_id==5)
        <h1>Vítajte na stránke pre evidovanie študentskej praxe!</h1>
        <h1>Vykonajte vaše zástupcové povinnosti</h1>
    @endif
@endsection
