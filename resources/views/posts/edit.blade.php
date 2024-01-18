<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Ubah Postingan</title>
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
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

        <form method="POST" action="{{ url("posts/$post->id") }}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Hapus</button>
        </form>
    </div>

    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
