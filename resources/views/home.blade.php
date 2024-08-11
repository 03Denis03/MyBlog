<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyBolg</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: 'textarea',
                menubar: false,
                plugins: 'link image code',
                toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code'
            });
        });
    </script>
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: rgb(230, 254, 238)">
    <header class="custom-header">
        @include('partials.header')
    </header>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div style="margin-left:5%; margin-right:5%; margin-top:2%">
        @auth
            <h2>All Posts</h2>
            <ul class="list-group list-group-flush bg-transparent">
                @foreach ($posts as $post)
                    <li class="list-group-item bg-transparent">
                        <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                    </li>
                @endforeach
            </ul>

        @else
                <h2>All Posts</h2>
                <ul class="list-group list-group-flush">
                    @foreach ($posts as $post)
                        <li class="list-group-item bg-transparent">
                            <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                        </li>
                    @endforeach
                </ul>
        @endauth
    </div>
    <footer class="mt-auto text-center  bg-dark" style="height: 3rem; padding-top:1rem">
        <p style="color:white; font-size:1rem; padding:0; margin:0;">Thanks for using our blog</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
