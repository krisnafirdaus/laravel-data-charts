<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Quis</th>
                <th>Tugas</th>
                <th>Absensi</th>
                <th>Praktek</th>
                <th>UAS</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->quis }}</td>
                    <td>{{ $mahasiswa->tugas }}</td>
                    <td>{{ $mahasiswa->absensi }}</td>
                    <td>{{ $mahasiswa->praktek }}</td>
                    <td>{{ $mahasiswa->uas }}</td>
                    <td>{{ $mahasiswa->grade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('mahasiswas.create') }}">Tambah Mahasiswa</a>

    <canvas id="myChart"></canvas>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['A', 'B', 'C', 'D'],
                datasets: [{
                    label: 'Grades',
                    data: [
                        {{ $gradeCounts['A'] ?? 0 }},
                        {{ $gradeCounts['B'] ?? 0 }},
                        {{ $gradeCounts['C'] ?? 0 }},
                        {{ $gradeCounts['D'] ?? 0 }}
                    ],
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
</body>
</html>