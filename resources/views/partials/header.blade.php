@auth
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <!-- Left side buttons -->
            <div class="navbar-nav mr-auto">
                <a href="{{ route('home') }}" class="btn btn-outline-light mr-2">Home</a>
                <a href="{{ route('myPosts') }}" class="btn btn-outline-light mr-2">My Posts</a>
                <a href="{{ route('createPost') }}" class="btn btn-outline-light">Create a Post</a>
            </div>
            <!-- Right side buttons -->
            <div class="navbar-nav ml-auto">
                <form action="/logout" method='POST' style="margin:0; padding:0;">
                    @csrf
                    <button class="btn btn-outline-light" s >Log out</button>
                </form>
            </div>
        </div>
    </nav>
@else
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <!-- Left side buttons -->
            <div class="navbar-nav mr-auto">
                <a href="{{ route('home') }}" class="btn btn-outline-light mr-2">Home</a>
                <a href="{{ route('myPosts') }}" class="btn btn-outline-light mr-2">My Posts</a>
                <a href="{{ route('createPost') }}" class="btn btn-outline-light">Create a Post</a>
            </div>
            <!-- Right side buttons -->
            <div class="navbar-nav ml-auto">
                <a href="{{ route('login') }}" class="btn btn-outline-light mr-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
            </div>
        </div>
    </nav>
@endauth



