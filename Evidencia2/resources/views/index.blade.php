<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/resources/css/bibliotecaInicio.css">
    <title>Biblioteca Sonic</title>
    
</head>
<body>
    <div class="container">
        <h1>BIBLIOTECA SONCK</h1>
        <h3>Libros disponibles:</h3>
        @foreach($books as $libro)
        <div class="book">
            <h3>Libro:</h3>
            <div>Titulo: {{$libro->title}}</div>
            <div>Autor: {{$libro->author_name}}</div>
            <div>ISBN: {{$libro->isbn}}</div>
            <div>Año de publicación: {{$libro->published_year}}</div>
            <div class="button-container">
                <a class="button" href="{{route('biblioteca.edit',$libro->id)}}">Editar este libro</a>
                <form action="{{route('biblioteca.destroy', $libro->id)}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button delete-button">Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
        <div class="button-container">
            <a class="button" href="{{route('biblioteca.create')}}">Agregar nuevo libro</a>
        </div>
    </div>
</body>
</html>
