<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h1 class="mb-2">Blog Fauzan Agra</h1>
        <a href="{{ url('posts/create') }}" class="btn btn-success mb-2">
            Buat Postingan
        </a>

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
    </div>

    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
