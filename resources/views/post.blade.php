@extends('layouts.layout')

@section('content')

<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">{{ $post->title }}</h1>
            <h5 class="fw-lighter mt-4">
                {{ $post->created_at->format('j F Y H:i') }}

                @if($post->updated_at != $post->created_at)
                    &bull; Updated {{ $post->updated_at->format('j F Y H:i') }}
                @endif
            </h5>
            <span>Posted in {{ $post->category->name }}</span>
        </div>
    </div>
</header>

<div class="container mb-4">
    <div class="row">
        <div class="col-lg-12">
            @if($post->image)
                <img class="card-img-top" src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->image }}" />
            @endif

            <p class="lead mt-4 mb-0">{{ $post->content }}</p>
        </div>
    </div>
</div>

@endsection
