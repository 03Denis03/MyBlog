<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: rgb(230, 254, 238)">
    <header class="custom-header">
        @include('partials.header')
    </header>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div style="margin-left:5%; margin-right:5%;">
        <h1>Edit Post</h1>
        <form action="/edit-post/{{$post->id}}" method="POST">
            @csrf
            @method('PUT')
            <div  class="form-group">
                <input type="text" name="title" value="{{$post->title}}" class="form-control">
            </div>
            <div  class="form-group">
                <textarea name="body" class="form-control">{{$post->body}}</textarea>
            </div>
            <button class="btn btn-outline-dark">Save Changes</button>
        </form>
    </div>
    <footer class="mt-auto text-center  bg-dark" style="height: 3rem; padding-top:1rem">
        <p style="color:white; font-size:1rem; padding:0; margin:0;">Thanks for using our blog</p>
    </footer>
</body>
</html>
