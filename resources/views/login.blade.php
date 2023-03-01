@extends('template')
@section('title','Codelite Login')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-md-8">
            @if ($message = Session::get('error'))
                <p class="alert alert-danger">{{$message}}</p>
            @endif
            <div class="card card-secondary">
                <div class="card-header text-center h3">
                    Login
                </div>
                <form action="{{route('auth')}}" method="POST">
                    @csrf
                    <div class="card-body" style="background: rgb(167, 255, 167)">
                        <div class="text-left">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="ex@email.com...">
                        </div>
                        <div class="text-left">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="password...">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">Login</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
