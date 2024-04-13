<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Biblioteca Sonic</title>
</head>
<body>
    <div class="container">
        <h1>BIBLIOTECA SONCK</h1>
        <h3>Libros disponibles:</h3>
        @foreach($books as $libro)
        <div class="book">
            <div class="book-content" style="display: flex; align-items: center;">
                <div class="book-details" style="flex: 1; padding-right: 20px;">
                    <h3>Libro:</h3>
                    <div>Titulo: {{$libro->title}}</div>
                    <div>Autor: {{$libro->author_name}}</div>
                    <div>ISBN: {{$libro->isbn}}</div>
                    <div>Año de publicación: {{$libro->published_year}}</div>
                </div>
                <img src="{{asset('storage/'.$libro->image_path)}}" class="book-image" style="flex-shrink: 0; width: 100px; height: 150px; object-fit: cover;">
            </div>
            <div class="button-container">
                <a class="btn btn-primary" href="{{route('biblioteca.edit',$libro->id)}}">Editar este libro</a>
                <form action="{{route('biblioteca.destroy', $libro->id)}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
        <div class="button-container " style="text-align: center; margin-top: 40px;">
            <a class="btn btn-success btn btn-dark mb-3" href="{{route('biblioteca.create')}}" style="margin: 0 auto;">Agregar nuevo libro</a>
        </div>
    </div>
</body>
</html>
