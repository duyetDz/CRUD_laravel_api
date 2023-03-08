@extends('templates.tpl_default')

@section('content')
    <div class="container">
        <form method="post" action="/admin/create">
            @csrf
            <p>Title<br>
                <input type="text" name="title" value="">
                <br>
                <span class="text-danger">{{ $errors->first('title') }}</span>
            </p>

            <p>Description<br>
                <textarea rows="5" cols="40" name="description"></textarea>
            </p>
                <span class="text-danger">{{ $errors->first('description') }}</span>
            <p><button type="submit">Submit</button></p>
        </form>
    </div>
@endsection
