
@extends('layouts.app')
@section('title', 'home')
@section('content')
    <section class='section-blog col-12 mt-xl-4 mt-2'>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-xl-10">
                    <div class="row" id="data-wrapper">
                        @forelse($hotels as $hotel)
                            <p>{{ $hotel->name }}</p>
                            <p>{{ $hotel->description }}</p>
                        @empty
                            <p>Aucun déscription</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection
