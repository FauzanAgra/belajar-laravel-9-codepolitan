@extends('layouts.app')
@section('title', "Judul: $post->title")

@section('content')
    <article>
        <h2 class="">{{ $post->title }}</h2>
        <p class="text-muted mb-3">
            {{ date('d M Y H:i', strtotime($post->updated_at)) }}, by <a href="">Fauzan Agra</a>
        </p>

        <p>{{ $post->content }}</p>

        <p class="text-muted mb-2">{{ $totalComments }} Komentar</p>

        @foreach ($comments as $comment)
            <div class="card  mb-3">
                <div class="card-body pl-2 pt-2 pb-1">
                    <p>{{ $comment->comment }}</p>
                </div>
            </div>
        @endforeach

    </article>
    <a href="{{ url('posts') }}" class="btn btn-primary">Kembali</a>
@endsection
