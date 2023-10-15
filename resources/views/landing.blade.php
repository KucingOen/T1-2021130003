@extends('layouts.template')

@section('title', 'Landing Page')

@section('content')
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic"> {{$featured ->judulBuku}}</h1>
            <p class="lead my-3">{{ $featured->isbn }}, {{ $featured->halaman }},
                {{ $featured->kategori }}, {{ $featured->penerbit }}</p>
            <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
        </div>
    </div>

    {{-- Articles Card --}}
    <div class="row mb-2">
        @forelse ($articles as $article)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Book</strong>
                        <h3 class="mb-0">{{ $article->judulBuku }}</h3>
                        <div class="mb-1 text-muted">{{ $article->updated_at }}</div>
                        <p class="card-text mb-auto">{{ $featured->isbn }}, {{ $featured->halaman }},
                            {{ $featured->kategori }}, {{ $featured->penerbit }}</p>
                        <a href="{{ route('articles.show', $article) }}" class="stretched-link">Continue reading</a>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-md-12">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="card-text mb-auto">No Book found.</h2>
                    </div>
                </div>
            </div>
        @endforelse

        {{ $articles->links() }}
    </div>
@endsection
