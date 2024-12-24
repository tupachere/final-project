<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota</title>
    <style>
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
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar Anggota</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>TTL</th>
                <th>Divisi</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->id }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->gender }}</td>
                    <td>{{ $k->ttl }}</td>
                    <td>{{ $k->divisi }}</td>
                    <td>{{ $k->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
