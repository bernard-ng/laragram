@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Post</div>
                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="caption" class="col-form-label">caption</label>
                                <input id="caption" type="text"
                                       class="form-control @error('caption') is-invalid @enderror" name="caption"
                                       value="{{ old('caption') }}"
                                       autocomplete="caption"
                                       autofocus
                                >
                                @error('caption')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-form-label">Image</label>
                                <input type="file" class="form-control-file" name="image" id="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary">
                                    Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
