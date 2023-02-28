@extends('template')
@section('title','codelite')
@section('content')
<h2>Selamat Datang {{ $data['name'] }}</h2>
<h5>{{ $data['email'] }}</h5>
<div class="row">
    <div class="col col-lg-6 p-2">
        <div class="card">
            <div class="card-header">Change Password</div>
            <div class="card-body">
                <form action="changepass" method="POST">
                    @csrf
                    <label for="pw" class="form-label">Password</label>
                    <input type="password" id="pw" class="form-control" name="password" placeholder="password">

                    <label for="kpw" class="form-label mt-3">repeat Password</label>
                    <input type="password" id="kpw" class="form-control" name="kpassword" placeholder="repeat password">
                    <hr>
                    <button type="submit" class="btn btn-success">
                        save
                    </button>
                    @if ($message = Session::get('successcp'))
                        <span class="text-success">{{ $message }}</span>
                    @endif
                    @if ($message = Session::get('error'))
                        <span class="text-danger">{{$message}}</span>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
