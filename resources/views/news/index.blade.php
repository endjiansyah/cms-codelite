@extends('template')
@section('title','codelite')
@section('content')
<div class="row">
    @foreach ($data as $item)
    <div class="col col-lg-4 p-2">
    
        <div class="card">
            <img class="card-img-top" src="{{ $item['banner'] }}" alt="codelite {{ $item['title'] }}">
            <div class="card-body">
                <h4 class="card-title">{{ $item['title'] }}</h4>
                <p class="card-text">{{ $item['content'] }}</p>
                <div class="d-flex justify-content-between">
                    <a href="" class="btn btn-sm btn-primary">Detail</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
