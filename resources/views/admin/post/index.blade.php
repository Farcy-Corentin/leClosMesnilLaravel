@extends('layouts.app')
@section('title', '| Show Post')

@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <th scope="col">id</th>
                        <th scope="col">category_id</th>
                        <th scope="col">title</th>
                        <th scope="col">created_at</th>
                        <th scope="col">updated_at</th>
                        <th scope="col"></th>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at->format('d-m-Y H:m:s') }}</td>
                            <td>{{ $post->updated_at->format('d-m-Y H:m:s') }}</td>
                            <td>
                                <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-outline-primary">
                                    Voir
                                </a>
                                <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-outline-primary">
                                    Editer
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection
