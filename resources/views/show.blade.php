<!-- resources/views/post/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: rgb(230, 254, 238)">
    <header class="custom-header">
        @include('partials.header')
    </header>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div style="margin-left:5%; margin-right:5%; margin-top:2%;">
        <h1>{{ $post->title }} by {{$post->user->name}}</h1>
        <p style="margin-top:3%;">{{ $post->body }}</p>
        <a href="{{ route('home') }}" class="btn btn-outline-dark" style="margin-top:1%">Back to Posts</a>
        <div style="margin-top: 20px;">
            <h4>Comments</h4>
            @foreach($post->comments as $comment)
                <div style="border-top: 1px solid gray; margin-top: 10px; padding-top: 10px;">
                    <p>{{$comment->body}}</p>
                    <p>by {{$comment->user->name}}</p>
                </div>
            @endforeach

            @auth
                <form action="/comments" method="POST" style="margin-bottom: 1%">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div data-mdb-input-init class="form-outline w-100">
                        <textarea name = "body" class="form-control" id="textAreaExample" rows="4"
                          style="background: #fff;"></textarea>
                        <label class="form-label" for="textAreaExample">Message</label>
                    </div>
                    <button type="submit"  class="btn btn-outline-dark" >Post Comment</button>
                </form>
            @endauth
        </div>
    </div>
    <footer class="mt-auto text-center  bg-dark" style="height: 3rem; padding-top:1rem">
        <p style="color:white; font-size:1rem; padding:0; margin:0;">Thanks for using our blog</p>
    </footer>
</body>
</html>
