<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar un libro</title>
</head>
<body>
    <p>Hola, esta seccion es para editar un libro de la biblioteca</p>

    <form class="libro-form" action="{{ route('biblioteca.update',$libro->id)}}" method="post">
    @csrf

    @method('PUT')

    <label for= "title">Title</label>
    <input type="text" id="title" name ="title" value="{{$libro->title}}">

    <label for= "author_name">Author</label>
    <input type="text" id="author_name" name ="author_name" value="{{$libro->author_name}}">

    <label for= "isbn">ISBN</label>
    <input type="text" id="isbn" name ="isbn" value="{{$libro->isbn}}">

    <label for= "published_year">Published Year</label>
    <input type="text" id="published_year" name ="published_year" value="{{$libro->published_year}}">

    <input type="submit" value="Edit Book">
</body>
</html>