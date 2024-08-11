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
        <style>
            html, body {
                height: 100%;
                margin: 0;
            }
            .centered {
                display: flex;
                justify-content: center; /* Horizontally center */
                align-items: center;     /* Vertically center */          /* Full viewport height */
                background-color:transparent;
                margin-top:18% /* Light background color */
            }
            .centered2 {
                display: flex;
                justify-content: center; /* Horizontally center */
                align-items: center;     /* Vertically center */          /* Full viewport height */
                background-color:transparent;
                margin-top:1% /* Light background color */
            }
            .text-box {
                padding: 20px;
                background-color: #006c4b; /* Blue background for the text box */
                color: white;              /* White text color */
                border-radius: 5px;       /* Rounded corners */
            }
        </style>
    </head>
    <body class="d-flex flex-column min-vh-100" style="background-color: rgb(230, 254, 238)">
        <header class="custom-header">
            @include('partials.header')
        </header>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <div style="margin-left:5%; margin-right:5%; margin-top:2%; margin-bottom:2%">
            @auth
                <div>
                    <h2>Your Posts</h2>
                    @foreach($posts as $post)
                        <div style="background-color: rgb(211, 252, 224); padding: 10px; margin:10px; border-style:solid; border-width:2px; border-color:rgb(139, 252, 175)">
                            <h3>{{$post->title}} by {{$post->user->name}}</h3>
                            {!! $post->body !!}
                            <p><a href="/edit-post/{{$post->id}}"  class="btn btn-outline-dark" style="margin-top:1%">Edit</a></p>
                            <form action="/delete-post/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-outline-dark">Delete</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="centered" >
                    <div class="text-box">
                        You need to login to acces this page!!
                    </div>
                </div>
                <div class = "centered2">
                    <a href="{{ route('home') }}" class="btn btn-outline-dark mr-2">Back to Home</a>
                </div>
            @endauth
        </div>
        <footer class="mt-auto text-center  bg-dark" style="height: 3rem; padding-top:1rem">
            <p style="color:white; font-size:1rem; padding:0; margin:0;">Thanks for using our blog</p>
        </footer>
    </body>
</html>
