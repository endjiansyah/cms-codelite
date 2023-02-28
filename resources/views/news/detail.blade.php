@extends('template')
@section('content')
    <div class="card mb-3">
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
