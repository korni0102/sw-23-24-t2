@extends('navbar.navbar')

@section('body')
    @if (auth()->user())

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Krstné meno</th>
                <th scope="col">Priezvisko</th>
                <th scope="col">Firma</th>
                <th scope="col">Názov</th>
                <th scope="col">Hodiny odpracované</th>
                <th scope="col">Hodiny akceptované</th>
                <th scope="col">Archivované</th>
                <th scope="col">Hodnotenie</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($contracts as $contract)

                <tr>
                    <td>{{ $contract->user->firstname }}</td>
                    <td>{{ $contract->user->lastname }}</td>
                    @if($contract->job->company)
                        <td>{{ $contract->job->company?->name }}</td>
                    @else
                        <td>Neaktivna spolocnost</td>
                    @endif
                    <td>{{ $contract->job->name }}</td>
                    <td>{{ $contract->hodiny_odpracovane }}</td>
                    <td>{{ $contract->hodiny_accepted }}</td>
                    <td>{{ $contract->closed }}</td>
                    <td>{{ $contract->hodnotenie }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>

        <canvas id="gradeChart" width="400" height="200"></canvas>

<script>
// Extract grades from PHP to JavaScript
const grades = @json($contracts->pluck('hodnotenie')->toArray());

// Count occurrences of each grade
const gradeCounts = {};
grades.forEach(grade => {
gradeCounts[grade] = (gradeCounts[grade] || 0) + 1;
});

// Prepare data for Chart.js
const labels = Object.keys(gradeCounts);
const data = Object.values(gradeCounts);

// Create a bar chart
const ctx = document.getElementById('gradeChart').getContext('2d');
const myChart = new Chart(ctx, {
type: 'bar',
data: {
    labels: labels,
    datasets: [{
        label: 'Grade Distribution',
        data: data,
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
    }]
},
options: {
    scales: {
        y: {
            beginAtZero: true
        }
    }
}
});
</script>


    @endif
@endsection
