@extends('layouts.app')

@section('title', 'Selamat Datang')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between">
        <h1 class="mb-2">Blog Fauzan Agra</h1>
        <div class="text-end">
            <a href="{{ url('posts/create') }}" class="btn btn-success mb-2">
                Buat Postingan
            </a>
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text">
                    <small class="text-body-secondary">Last updated at
                        {{ date('d M Y H:i', strtotime($post->updated_at)) }}
                    </small>
                </p>
                <a href="{{ url("posts/$post->id") }}" class="btn btn-primary">Selengkapnya</a>
                <a href="{{ url("posts/$post->id/edit") }}" class="btn btn-warning">Edit</a>
                <form method="POST" action="{{ url("posts/$post->id") }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger mt-3">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
