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
    <p>Grade: {{ $contract->hodnotenie }}</p>
    <p>Feedback:</p>
<ul>
    @forelse ($contract->feedback as $feedback)
        <li>{{ $feedback->text }}</li>
    @empty
        <li>No feedback available</li>
    @endforelse
</ul>
</body>
</html>
