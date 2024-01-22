@extends('layouts.app')

@section('title', 'Ubah Postingan')

@section('content')
    <h1 class="mb-3">Ubah Postingan Baru</h1>
    <form action="{{ url("posts/$post->id") }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea name="content" class="form-control" id="content" rows="3">{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-danger" href="{{ url('posts') }}">Kembali</a>
    </form>
@endsection
