<html>
<head>
    <title>Contract PDF</title>
</head>
<body>
    <h1>Contract Information</h1>

    <p>User: {{ $contract->user->firstname }} {{ $contract->user->lastname }}</p>
    <p>Company: {{ $contract->job->company ? $contract->job->company->name : 'Neaktivna spolocnost' }}</p>
    <p>Job Name: {{ $contract->job->name }}</p>
    <p>Description: {{ $contract->job->description }}</p>
    <p>From: {{ $contract->from }}</p>
    <p>To: {{ $contract->to }}</p>
    <p>Accepted: {{ $contract->accepted }}</p>
    <p>Closed: {{ $contract->closed }}</p>
</body>
</html>
