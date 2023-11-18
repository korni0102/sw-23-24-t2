<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <title>UKF - Prax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <script src="https://kit.fontawesome.com/79ac381c70.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-dark">
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 100%;">
            <img src="{{ asset('images/logo.jpg') }}" style="height: 250px; width: auto; padding: 5px" class="card-img-top mx-auto my-auto" alt="Logo">
                <div class="card-body">
                <h5 class="card-title">Registrácia</h5>
                <form action="{{ route('save.user') }}" method="post">
                    @csrf
                    <h5 class="card-title">Krstne meno</h5>
                    <input type="text" placeholder="Firtname" id="firstname" name="firstname" class="form-control" required>
                    @error('firstname')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <h5 class="card-title">Priezvisko</h5>
                    <input type="text" placeholder="Lastname" id="lastname" name="lastname" class="form-control" required>
                    @error('lastname')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <h5 class="card-title">Skolsky rok</h5>
                    <input type="text" placeholder="Year" id="year" name="year" class="form-control" required>
                    @error('year')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <h5 class="card-title">E-mail</h5>
                    <input type="email" placeholder="email@gmail.com" id="email" name="email" class="form-control" required>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <h5 class="card-title">Tel</h5>
                    <input type="tel" placeholder="09123456" id="tel" name="tel" class="form-control" required>
                    @error('tel')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <h5 class="card-title">Heslo</h5>
                    <div class="input-group mb-3">
                        <input type="password" placeholder="Min 8" id="password" name="password" class="form-control" required aria-describedby="show-password">
                        <button class="btn btn-outline-dark" type="button" id="show-password"><i class="bi bi-eye"></i></button>
                    </div>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <div class="form-group">
                        <li class="list-group-item">
                            <select style="border-radius: 0px" class="form-select form-select-lg mb-3" id="role_id" name="role_id" required>
                                <option value="" disabled selected hidden>Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Študent</option>
                                <option value="3">Poverený pracovník pracoviska</option>
                                <option value="4">Ceo</option>
                                <option value="5">Manažér</option>
                            </select>
                        </li>
                    </div>
                    @error('role_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <div class="form-group">
                        <li class="list-group-item">
                            <select style="border-radius: 0px" class="form-select form-select-lg mb-3" id="study_program_id" name="study_program_id" required>
                                <option value="" disabled selected hidden>Study Program</option>
                                <option value="1">Aplikovaná ekológia a environmentalistika</option>
                                <option value="2">Aplikovaná informatika</option>
                                <option value="3">Biológia</option>
                                <option value="4">Fyzika</option>
                                <option value="5">Geografia v regionálnom rozvoji</option>
                                <option value="6">Matematicko-štatistické a informačné metódy v ekonómii a finančníctve</option>
                                <option value="7">Učiteľstvo biológie v kombinácii</option>
                                <option value="8">Učiteľstvo chémie v kombinácii</option>
                                <option value="9">Učiteľstvo ekológie v kombinácii</option>
                                <option value="10">Učiteľstvo fyziky v kombinácii</option>
                                <option value="11">Učiteľstvo geografie v kombinácii</option>
                                <option value="12">Učiteľstvo informatiky v kombinácii</option>
                                <option value="13">Učiteľstvo matematiky v kombinácii</option>
                                <option value="14">Učiteľstvo odborných ekonomických predmetov v kombinácii</option>
                            </select>
                        </li>
                    </div>
                    @error('study_program_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-warning" style="text-align: center">Registrácia</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordButton = document.getElementById('show-password');
        let isPasswordVisible = false;

        showPasswordButton.addEventListener('click', function() {
            if (!isPasswordVisible) {
                passwordInput.type = 'text';
                showPasswordButton.innerHTML = '<i class="bi bi-eye-slash"></i>';
                isPasswordVisible = true;
            } else {
                passwordInput.type = 'password';
                showPasswordButton.innerHTML = '<i class="bi bi-eye"></i>';
                isPasswordVisible = false;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
