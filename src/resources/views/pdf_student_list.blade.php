<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<h2>Studenti</h2>

<ul>
    @foreach($users as $user)
        <li>
            <strong>ID:</strong> {{ $user['id'] }}<br>
            <strong>Krstné meno:</strong> {{ $user['firstname'] }}<br>
            <strong>Priezvisko:</strong> {{ $user['lastname'] }}<br>
            <strong>E-mail:</strong> {{ $user['email'] }}<br>
            <strong>Adresa:</strong> {{ $user['address'] }}<br>
            <strong>Telefónne cislo:</strong> {{ $user['tel'] }}<br>
            <strong>Rola:</strong> {{ $user['role']['role'] }}<br>
            <strong>Studijný program:</strong> {{ $user['study_program']['name'] }}<br>
            <strong>Skolský rok:</strong> {{ $user['year'] }}<br>
        </li>
    @endforeach
</ul>

</body>
</html>
