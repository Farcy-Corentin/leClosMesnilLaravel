@extends('layouts.app')
@section('title', '| View Project')

@section('content')
    <section class='section-blog col-12'>
        <article class="mb-3">
            <div class="article-header">
                <div class="row align-items-baseline mb-1">
                    <div class="col-4"><span class="badge bg-badge text-dark">{{ $post->category->name }}</span>
                    </div>
                    <span
                        class="created-at col-8 fst-italic fw-bold text-end">{{ $post->created_at->format('d-m-Y') }}</span>
                </div>
                <h2 class="pb-1 m-0">{{ $post->title }}</h2>
                <div class="image-container row mb-2">
                    <img src="{{ asset('storage/img/'.$post->image_path) }}" class="w-100 h-auto pb-1" alt="">
                </div>
            </div>
            <p class="pb-1">{!! nl2br($post->content) !!}</p>
        </article>
    </section>
    <div class="col-12">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Created At :</dt>
                <dd><p>{{ $post->created_at }}</p></dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Updated At:</dt>
                <dd><p>{{ $post->updated_at }}</p></dd>
            </dl>
            <img src="{{ $post }}" alt="">
            <hr>
            <div class="row justify-content-end me-0">
                <div class="col-1">
                    <form method="POST" action="{{ route('admin.post.destroy', ['post' => $post->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-secondary-action col-4 col-lg-2">Supprimer</button>
                    </form>
                </div>
                <div class="col-1">
                    <a type="button" href="{{ route('admin.post.edit', $post->id) }}"
                       class="btn-primary-action editLink text-decoration-none text-center col-4 col-lg-12">
                        Editer
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
