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
    <p>Hodnotenie: {{ $contract->hodnotenie }}</p>
    <p>Spätná väzba od zástupcu firmy:</p>
    <ul>
        @forelse ($contract->grade as $grad)
            <p>Vystupovanie:</p>
            <li>{{ $grad->vystupovanie }}</li>
            <p>Jednanie s klientom</p>
            <li>{{ $grad->jednanie_s_klientom }}</li>
            <p>Samostatnost práce</p>
            <li>{{ $grad->samostatnost_prace }}</li>
            <p>Tvorivý prístup</p>
            <li>{{ $grad->tvorivy_pristup }}</li>
            <p>Dochvilnost</p>
            <li>{{ $grad->dochvilnost }}</li>
            <p>Dodrzovanie etických zásad</p>
            <li>{{ $grad->dodrzovanie_etickych_zasad }}</li>
            <p>Motivácia</p>
            <li>{{ $grad->motivacia }}</li>
            <p>Doslednost pri plnení povinností</p>
            <li>{{ $grad->doslednost_pri_plneni_povinnosti }}</li>
            <p>Ochota sa ucit</p>
            <li>{{ $grad->ochota_sa_ucit }}</li>
            <p>Schopnost spolupracovat</p>
            <li>{{ $grad->schopnost_spolupracovat }}</li>
            <p>Vyuzitie pracovnej doby</p>
            <li>{{ $grad->vyuzitie_pracovnej_doby }}</li>
            <p>Feedback</p>
            <li>{{ $grad->feedback }}</li>
        @empty
            <li>Nemáte spatnu vazbu</li>
        @endforelse
    </ul>
</body>
</html>
