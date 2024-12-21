<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
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
    <h1>Laporan Absensi</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Anggota</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->anggota->nama }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ ucfirst($data->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
