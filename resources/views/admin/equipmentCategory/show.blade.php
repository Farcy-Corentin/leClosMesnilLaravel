@extends('layouts.app')
@section('title', '| View Project')

@section('content')
<div class="container">
    <h1>{{ $equipment->name }}</h1>
    <ul class="list-group">
        @forelse($equipmentCategory as $Category)
            <li>{{ $Category->name }}</li>
        @empty
        <p>Aucun equipements</p>
        @endforelse
    </ul>
</div>

@endsection
