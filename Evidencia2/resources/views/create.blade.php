<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    <p>Hola, esta seccion es para agregar un libro a la biblioteca</p>

    <form class="libro-form" action="{{ route('biblioteca.store')}}" method="post">
    @csrf
        <label for= "title">Title</label>
        <input type="text" id="title" name ="title">

        <label for= "author_name">Author</label>
        <input type="text" id="author_name" name ="author_name">

        <label for= "isbn">ISBN</label>
        <input type="text" id="isbn" name ="isbn">

        <label for= "published_year">Published Year</label>
        <input type="text" id="published_year" name ="published_year">

        <input type="submit" value="Add Book">
</body>
</html>