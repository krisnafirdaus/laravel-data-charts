<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>

    <form action="{{ route('mahasiswas.store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama">

        <label for="quis">Nilai Quis:</label>
        <input type="number" name="quis" id="quis">

        <label for="tugas">Nilai Tugas:</label>
        <input type="number" name="tugas" id="tugas">

        <label for="absensi">Nilai Absensi:</label>
        <input type="number" name="absensi" id="absensi">

        <label for="praktek">Nilai Praktek:</label>
        <input type="number" name="praktek" id="praktek">

        <label for="uas">Nilai UAS:</label>
        <input type="number" name="uas" id="uas">

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
