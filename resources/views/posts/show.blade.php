<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts | Judul: {{ $post->title }}</title>
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
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
    </div>

    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
