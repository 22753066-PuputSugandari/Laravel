<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>ini halaman user</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
       
        @foreach ($users as $index => $user)
        <tr>
                <td>{{$index + 1}}
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
    @endforeach
</body>
</html>