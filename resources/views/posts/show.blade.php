<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts | Judul: {{ $post[1] }}</title>
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <article>
            <h2 class="">{{ $post[1] }}</h2>
            <p class="text-muted mb-3">
                {{ date('d M Y H:i', strtotime($post[3])) }}, by <a href="">Fauzan Agra</a>
            </p>

            <p>{{ $post[2] }}</p>
        </article>
        <a href="{{ url('posts') }}" class="btn btn-primary">Kembali</a>
    </div>



    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
