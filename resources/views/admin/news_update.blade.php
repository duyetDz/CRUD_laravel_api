<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $pageName }}</h1>
<form method="post" action="/admin/news/update/{{ $news->id }}">
    @method('PATCH')
    @csrf
    <input type="hidden" name="id" value="{{ $news->id }}">
    <p>
        <label for="title">Title</label><br>
        <input type="text" name="title" value="{{ $news->title }}">
    </p>

    <p>
        <label for="email">Email</label><br>
        <input type="text" name="email" value="{{ $news->email }}">
    </p>

    <p>
        <label for="description">Description</label><br>
        <textarea cols="50" rows="5" name="description">{{ $news->description }}</textarea>
    </p>

    <p>
        <button type="submit">Submit</button>
    </p>
</form>
</body>
</html>