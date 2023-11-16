<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/barber-shop.png') }}" type="image/x-icon">
    <title>UKF - Prax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <script src="https://kit.fontawesome.com/79ac381c70.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-dark">
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 20rem;">
            <img src="{{ asset('images/logo.jpg') }}" class="card-img-top mx-auto my-auto" alt="Logo">
            <div class="card-body">
                <h5 class="card-title">Registrácia</h5>
                <form action="{{ route('login.login') }}" method="post">
                    @csrf
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                $('.alert').alert('close');
                            }, 5000);
                        </script>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                $('.alert').alert('close');
                            }, 5000);
                        </script>
                    @endif
                    <input type="text" id="email" name="email" class="form-control" placeholder="E-mail" aria-label="Username" aria-describedby="addon-wrapping" required oninvalid="this.setCustomValidity('Kérlek add meg az e-mail címed!')" oninput="this.setCustomValidity('')">
                    <br>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Jelszó" aria-label="Username" aria-describedby="addon-wrapping" required oninvalid="this.setCustomValidity('Kérlek add meg a jelszavad!')" oninput="this.setCustomValidity('')">
                    <br>
                    <button type="submit" class="btn btn-warning">Login</button>
                </form>
            </div>
            <div class="card-footer bg-white">
                <a href="/login/password_reset" class="text-muted">Si registrovaný?</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>