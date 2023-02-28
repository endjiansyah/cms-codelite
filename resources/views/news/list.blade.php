@extends('template')
@section('title','codelite')
@section('content')
<div class="card card-secondary">
    <div class="card-header">
        <a href="{{ route('news.create') }}" class="btn btn-secondary">Tambah article</a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr class="card-info">
                    <th>title</th>
                    <th>Banner</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item['title'] }}</td>
                    <td><img src="{{ $item['banner'] }}" alt="codelite {{ $item['title'] }}" width="100px"></td>
                    <td>
                        <a href="{{ route('news.edit',$item['id']) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a onclick="return confirm('Hapus {{ $item['title'] }}?')" href="{{ route('news.destroy', ['id' => $item['id']]) }}" class="btn btn-danger btn-sm">delete</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
