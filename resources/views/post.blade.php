
@extends('layouts.app')
@section('content')
<section class='section-blog container'>
<h1>Suivez l'actualité du Clos Mesnil et de ses alentours</h1>
    @foreach($posts as $post)
        <article>
            <h2>{{ $post->category->name }}</h2>
            <hr>
            <h3>{{ $post->title }}</h3>

            <img src="{{ $post->image_path }}">
            <p class="mt-100">{{ $post->content }}</p>
        </article>
    @endforeach
</section>
@endsection
