<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kas List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Daftar Kas</h2>
    <table>
        <thead>
            <tr>
                <th>ID Anggota</th>
                <th>Nama Anggota</th>
                <th>Tanggal Kas</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $kas)
                <tr>
                    <!-- Menampilkan ID Anggota -->
                    <td>{{ $kas->anggota->id }}</td>
                    <td>{{ $kas->anggota->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($kas->tgl_kas)->format('d-m-Y') }}</td>
                    <td>{{ number_format($kas->jumlah, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
