<html>
<head>
    <title>Contract PDF</title>
</head>
<body>
    <h1>Informácie o zmluve</h1>

    <p>Meno: {{ $contract->user->firstname }} {{ $contract->user->lastname }}</p>
    <p>Firma: {{ $contract->job->company ? $contract->job->company->name : 'Neaktivna spolocnost' }}</p>
    <p>Názov práce: {{ $contract->job->name }}</p>
    <p>Popis práce: {{ $contract->job->description }}</p>
    <p>Od: {{ $contract->from }}</p>
    <p>Do: {{ $contract->to }}</p>
    <p>Akceptované: {{ $contract->accepted }}</p>
    <p>Zatvorené: {{ $contract->closed }}</p>

</body>
</html>
