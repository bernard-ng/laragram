@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body p-5">
                        <form
                            method="POST"
                            action="{{ route('profiles.update', ['user' => $user->profile->id]) }}"
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="title" class="col-form-label">title</label>
                                <input
                                    id="title"
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ old('title') ?? $user->profile->title }}"
                                    autocomplete="title"
                                    autofocus
                                >
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-form-label">description</label>
                                <input
                                    id="description"
                                    type="text"
                                    class="form-control @error('description') is-invalid @enderror"
                                    name="description"
                                    value="{{ old('description') ?? $user->profile->description }}"
                                    autocomplete="description"
                                >
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="url" class="col-form-label">url</label>
                                <input
                                    id="url"
                                    type="text"
                                    class="form-control @error('url') is-invalid @enderror" name="url"
                                    value="{{ old('url') ?? $user->profile->url }}"
                                    autocomplete="url"
                                >
                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-form-label">Profile Image</label>
                                <input type="file" class="form-control-file" name="image" id="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
