@extends('template')
@section('title','Codelite News')
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
                    <th>Last Update</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $hitung = 0; ?>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item['title'] }}</td>
                    <td><img src="{{ $item['banner'] }}" alt="codelite {{ $item['title'] }}" width="100px"></td>
                    <td>{{ \Carbon\Carbon::parse($item['updated_at'])->translatedFormat('d F Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('news.edit',$item['id']) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a onclick="return confirm('Hapus {{ $item['title'] }}?')" href="{{ route('news.destroy', ['id' => $item['id']]) }}" class="btn btn-danger btn-sm">delete</a>

                    </td>
                </tr>
                <?php $hitung++; ?>
                @endforeach
                @if ($hitung == 0)
                <tr>
                    <td colspan="3" class="text-center"><h3>Empty News</h3></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
