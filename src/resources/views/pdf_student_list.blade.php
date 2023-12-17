<!-- pdf_student_list.blade.php -->

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
<h2>Student List</h2>

<ul>
    @foreach($users as $user)
        <li>
            <strong>ID:</strong> {{ $user['id'] }}<br>
            <strong>Firstname:</strong> {{ $user['firstname'] }}<br>
            <strong>Lastname:</strong> {{ $user['lastname'] }}<br>
            <strong>Email:</strong> {{ $user['email'] }}<br>
            <strong>Address:</strong> {{ $user['address'] }}<br>
            <strong>Tel:</strong> {{ $user['tel'] }}<br>
            <strong>Role:</strong> {{ $user['role']['role'] }}<br>
            <strong>Study Program:</strong> {{ $user['study_program']['name'] }}<br>
            <strong>Year:</strong> {{ $user['year'] }}<br>
        </li>
    @endforeach
</ul>

</body>
</html>
