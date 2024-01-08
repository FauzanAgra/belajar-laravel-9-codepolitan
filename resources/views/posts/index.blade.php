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
            @php
                $post = explode(',', $post);
            @endphp
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $post[1] }}</h5>
                    <p class="card-text">{{ $post[2] }}</p>
                    <p class="card-text">
                        <small class="text-body-secondary">Last updated at
                            {{ date('d M Y H:i', strtotime($post[3])) }}
                        </small>
                    </p>
                    <a href="{{ url("posts/$post[0]") }}" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        @endforeach
    </div>

    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
