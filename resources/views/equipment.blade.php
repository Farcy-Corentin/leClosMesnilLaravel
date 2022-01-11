@extends('layouts.app')
@section('title', 'home')
@section('content')
<section class='section-blog col-12 mt-xl-4 mt-2'>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-xl-10">
                <div class="row" id="data-wrapper">
                    @forelse($equipments as $equipment)
                    <p><i class="fas {{ $equipment->icon }}"></i> {{ $equipment->name }}</p>
                    <p>{{ $equipment->description }}</p>
                    <ul class="list-group">
                        @forelse($underCategories as $underCategory)
                            <li>{{ $underCategory->name }}</li>
                            <li>{{ $underCategory->number }}</li>
                            <li>
                                @if ($underCategory->is_outside == '1')
                                    <span class="badge rounded-pill bg-primary">En dehors de l'établissement</span>
                                @endif
                                </li>
                        @empty
                        <p>Aucun equipements</p>
                        @endforelse
                    </ul>
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
