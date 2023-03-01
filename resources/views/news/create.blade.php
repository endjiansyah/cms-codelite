@extends('template')
@section('title','Codelite Add News')

@section('content')
    <div class="card card-secondary">
        <div class="card-header">
            <a href="{{ route('news.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <div class="card">
                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <label for="title" class="form-label">title</label>
                        <input type="text" name="title" placeholder="title" id="title" class="form-control mb-3" required>

                        <label for="banner" class="form-label">banner</label>
                        <input type="file" name="banner" placeholder="banner" id="banner" class="form-control mb-3">

                        <label for="content" class="form-label">content</label>
                        <textarea name="content" id="content" class="form-control mb-3"></textarea>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="Save" class="btn btn-success px-4">
                        @if ($message = Session::get('error'))
                            <span class="text-danger">{{$message}}</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection