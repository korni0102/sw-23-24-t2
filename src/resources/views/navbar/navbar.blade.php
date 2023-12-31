<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UKF FPVAI PRAX</title>
    <link href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user.index') }}">Hlavné menu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @if(auth()->user()->role_id==1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.modifyRoleRequest')}}">Žiadosti o rolu</a>
                    </li>
                @endif

                @if(auth()->user()->role_id==1 || auth()->user()->role_id==3)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin_view_companies')}}">Firmy</a>
                    </li>
                @endif

                @if(auth()->user()->role_id == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('viewCompaniesStudents')}}">Firmy</a>
                    </li>
                @endif

                @if(auth()->user()->role_id == 4)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('viewCompaniesVeduci')}}">Firmy</a>
                    </li>
                @endif

                @if(auth()->user()->role_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jobs')}}">Práce</a>
                    </li>
                @endif

                @if(auth()->user()->role_id==3)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showJobRequsetsPPP')}}">Žiadosti o prácu</a>
                    </li>
                @endif

                @if(auth()->user()->role_id == 3)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showGradeStudentPPP')}}">Hodnotenie študentov</a>
                    </li>
                @endif

                @if(auth()->user()->role_id == 2)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Typy prác
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('showPartTime') }}">Študentská brigáda</a>
                            <a class="dropdown-item" href="{{ route('showFullTime') }}">Plný úväzok</a>
                            <a class="dropdown-item" href="{{ route('showPaid') }}">Platená brigáda</a>
                            <a class="dropdown-item" href="{{ route('showUnpaid') }}">Neplatená brigáda</a>
                            <a class="dropdown-item" href="{{ route('showFreelancer') }}">Freelancer</a>
                        </div>
                    </li>
                @endif

                @if(auth()->user()->role_id == 1)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pouzivatelia
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('showStudents') }}">Študent</a>
                            <a class="dropdown-item" href="{{ route('showPPPs') }}">Poverený pracovník pracoviska</a>
                            <a class="dropdown-item" href="{{ route('showVeducis') }}">Vedúci pracoviska</a>
                            <a class="dropdown-item" href="{{ route('showzastupcas') }}">Zástupca firmy</a>
                        </div>
                    </li>
                @endif

                @if(auth()->user()->role_id==2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('studentViewContracts')}}">Moje zmluvy</a>
                    </li>
                @endif

                @if(auth()->user()->role_id==4)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showStudentsVeduci')}}">Študenti</a>
                    </li>
                @endif

                @if(auth()->user()->role_id==4)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showJobRequsets')}}">Žiadosti o prácu</a>
                    </li>
                @endif

                @if(auth()->user()->role_id==2)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showGradesStudent')}}">Moje hodnotenia</a>
                    </li>
                @endif

                @if(auth()->user()->role_id==4)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('veduciViewContracts')}}">Zobraziť zmluvy</a>
                    </li>
                @endif

                @if(auth()->user()->role_id == 5)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showContractsZastupca')}}">Zobraziť zmluvy</a>
                    </li>
                @endif

                @if(auth()->user()->role_id == 3  || auth()->user()->role_id==1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showClosedContractsPPP')}}">Zobraziť archivované zmluvy</a>
                    </li>
                @endif

                @if(auth()->user()->role_id == 4)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showFeedbackVeduci')}}">Zobraziť spätnú väzbu od zástupcov</a>
                    </li>
                @endif

            </ul>
            <form class="d-flex" role="search">
                <a class="user" style="text-decoration: none " href="{{ route('profile.edit') }}">
                    <div style="padding-right: 30px ">
                        <?php (auth()->user()) ?>
                        {{auth()->user()->lastname}}
                    </div>
                </a>
            </form>
            <a class="btn btn-secondary" href="/logout"><i class="bi bi-box-arrow-right"></i> Odhlásenie</a>
        </div>
    </div>
</nav>
<div style="margin: 3%">
    @yield('body')
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
{{--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
