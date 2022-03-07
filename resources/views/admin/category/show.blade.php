@extends('layouts.app')
@section('title', '| View Project')

@section('content')
            <div class="container py-4">
                <h2>{{ $category->name }}:</h2>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Titre</th>
                                <th class="col-3">Créer le</th>
                                <th class="col-3">Editer le</th>
                                <th class="col-3">Lien</th>
                            </tr>
                            @foreach($posts as $post)
                                @if($category->id === $post->category_id)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->created_at->format("d-m-Y H:m:s") }}</td>
                                        @if($post->update_at)
                                            <td>{{ $post->update_at->format("d-m-Y H:m:s") }}</td>
                                        @else
                                            <td>Aucune mise à jour</td>
                                        @endif
                                        <td>
                                            <a
                                                href="{{ route('admin.post.show', $post->slug) }}"
                                                class="btn btn-outline-primary">View
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                        <div class="row justify-content-end me-0">
                            <div class="col-4 col-lg-2">
                                <form
                                    method="POST"
                                    action="{{ route('admin.category.destroy', ['category' => $category->slug]) }}"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn-secondary-action col-4 col-lg-12"
                                    >
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                            <div class="col-4 col-lg-2">
                                <a type="button" href="{{ route('admin.category.edit', $category->slug) }}"
                                   class="btn-primary-action editLink text-decoration-none text-center col-12 col-lg-10"
                                >
                                    Editer
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
