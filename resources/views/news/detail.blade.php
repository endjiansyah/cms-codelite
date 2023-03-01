@extends('template')
@section('title',$data['title'])
@section('content')
<a href="{{ route('index') }}" class="btn btn-secondary">Back</a>
    <div class="card my-1">
        <div class="card-header">
            <div class="d-flex justify-content-between my-auto">
                <h5>{{ $data['title'] }}</h5>
            </div>
        </div>
        <div class="card-body row">
            <div class="col-lg-7 pt-3">
                <p>{{ $data['content'] }}</p>
            </div>
            <div class="col-lg-5">
                <img src="{{ $data['banner'] }}" alt="Codelite {{ $data['title'] }}" class="img-fluid">
            </div>
        </div>
    </div>
@endsection
