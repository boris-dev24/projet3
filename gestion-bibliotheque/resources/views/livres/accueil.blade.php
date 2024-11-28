@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="carousel-container">
    <div class="carousel">
        @foreach ($books as $book)
            <div class="carousel-item">
                <img src="{{ $book['image'] }}" alt="{{ $book['title'] }}">
                <div class="carousel-caption">
                    <h5>{{ $book['title'] }}</h5>
                    <p>{{ $book['author'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <button class="prev-btn" onclick="prevSlide()">❮</button>
    <button class="next-btn" onclick="nextSlide()">❯</button>
</div>

@endsection
