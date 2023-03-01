@extends('template')
@section('title','codelite')
@section('content')
<div class="row">
    <?php $hitung = 0; ?>
    @foreach ($data as $item)
    <div class="col col-lg-4 p-2">
    
        <div class="card">
            <img class="card-img-top" src="{{ $item['banner'] }}" alt="codelite {{ $item['title'] }}">
            <div class="card-body">
                <h4 class="card-title">{{ $item['title'] }}</h4>
                <p class="card-text">{{ strip_tags(substr($item['content'], 0, 120)) . " ..." }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('news.detail',$item['id']) }}" class="btn btn-outline-primary">Detail</a>
                    <p>{{ \Carbon\Carbon::parse($item['updated_at'])->translatedFormat('d F Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
    <?php $hitung++ ?>
    @endforeach
    @if ($hitung == 0)
        <h4>News Not Found</h4>
    @endif
</div>
@endsection