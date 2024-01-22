@extends('layouts.app')
@section('title', 'Buat Postingan')
@section('content')
    <h1 class="mb-3">Buat Postingan Baru</h1>
    <form action="{{ url('posts') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>

        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
