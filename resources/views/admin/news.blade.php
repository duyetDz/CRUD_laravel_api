@extends('templates.tpl_default')

@section('content')
    
    <div class="container">
        <h1>{{ $pageName }}</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tools</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td><a href="/admin/news/{{ $row->id }}">{{ $row->title }}</a></td>
                        <td>{{ $row->email }}</td>
                        <td class="d-flex" style=" justify-content: center;"><a href="/admin/news/edit/2">Edit</a> <span
                                style="margin: 0px 7px 0px 7px;">|</span>
                            <form method="POST" action="/admin/news/delete/2" onsubmit="return ConfirmDelete( this )">
                                <input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="_token"
                                    value="gnxFFmhuS88EBghVcvqVjf2CpzKZR6XtyTExYStX"> <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
