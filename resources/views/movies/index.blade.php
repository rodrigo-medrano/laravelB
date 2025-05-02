<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Fecha Lanzamiento</th>
            <th>Nacionalidad</th>
            <th>Precio</th>
            <th>Genero</th>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td>{{$movie->id}}</td>
                <td>{{$movie->title}}</td>
                <td>{{$movie->description}}</td>
                <td>{{$movie->release_date}}</td>
                <td>{{$movie->ationality}}</td>
                <td>{{$movie->price}}</td>
                <td>{{$movie->genre->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
