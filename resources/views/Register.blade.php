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
<body style="padding-top:4em; background-color: rgb(230, 254, 238)" class="text-center">
    <div>
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <div data-mdb-input-init class="form-outline mb-4">
                <input name="name" type="text" placeholder="Name">
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
                <input name="email" type="text" placeholder="Email">
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
                <input name="password" type="password" placeholder="Password">
            </div>

            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark">Register</button>

            <div class="text-center">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
