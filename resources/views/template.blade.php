<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    {{-- ------------ --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">CodeLite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="d-flex justify-content-between w-100">


                    <div class="navbar-nav">
                        @if (session('id_user'))
                        <a class="nav-link  {{ $page == 'home'? 'active' : '' }}" aria-current="page" href="/admin">Home</a>
                        <a class="nav-link {{ $page == 'news'? 'active' : '' }}" href="/news">News</a>
                        @else
                        <a class="nav-link {{ $page == 'home'? 'active' : '' }}" aria-current="page" href="/">Home</a>
                        @endif
                    </div>
                    <div class="row">
                    @if (session('id_user'))
                        <h5 class="col text-light my-auto">{{ session('nama_user') }}</h5>
                        <a href="{{ route('logout') }}" class="btn btn-danger col py-auto">Logout</a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-light col font-bold py-auto">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
    {{-- ------------- --}}
    <div class="container py-5">
        @if ($message = Session::get('success'))
            <div class="alert alert-success mb-1" role="alert">{{ $message }}</div>
        @endif
        @if ($message = Session::get('hapus'))
            <div class="alert alert-danger mb-1" role="alert">{{ $message }}</div>
        @endif

        @yield('content')

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
        integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>

    @yield('script')
</body>
</html>