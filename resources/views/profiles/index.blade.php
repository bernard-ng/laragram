@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img
                    style="max-width: 150px"
                    class="rounded rounded-circle w-100"
                    src="/storage/{{ $user->profile->image }}"
                    alt="profile"
                >
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="pr-3">{{ $user->username }}</h4>
                        <follow-button url="{{ route('follow.store', ['user' => $user->id]) }}"></follow-button>
                    </div>

                    @can('update', $user->profile)
                        <div class="btn-group">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">Add new post</a>
                            <a href="{{ route('profiles.edit', ['user' => $user->id]) }}" class="btn btn-primary">
                                Edit Profile
                            </a>
                        </div>
                    @endcan
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                    <div class="pr-5"><strong>2,4k</strong> followers</div>
                    <div class="pr-5"><strong>212</strong> following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{ $user->profile->title  }}</div>
                <div>{{ $user->profile->description  }}</div>
                @if($user->profile->url)
                    <div>
                        <a href="{{ $user->profile->url }}" target="_blank">{{ $user->profile->url  }}</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4 pb-5">
                    <a href="{{ route('posts.show', ['post' => $post->id])  }}">
                        <img alt="{{ $post->title  }}" class="w-100" src="/storage/{{ $post->image }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
