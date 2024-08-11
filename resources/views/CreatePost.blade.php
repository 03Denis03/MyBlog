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
                <h2>Create a new Post</h2>
                <form action="/create-post" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" placeholder="post title" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea name="body" placeholder="body content..." class="form-control"></textarea>
                    </div>
                    <button class="btn btn-outline-dark">Save Post</button>
                </form>
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
