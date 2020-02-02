@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img class="rounded-circle"
                     src="https://scontent-jnb1-1.cdninstagram.com/v/t51.2885-19/s150x150/81339546_2457344691181321_108807275547721728_n.jpg?_nc_ht=scontent-jnb1-1.cdninstagram.com&_nc_ohc=XxDnJJlDVHwAX-iqdSR&oh=e359f1ce233dce6f3753373e51372ef2&oe=5EB9300C"
                     alt="profile">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Add new post</a>
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
                    <img alt="{{ $post->title  }}" class="w-100" src="/storage/{{ $post->image }}">
                </div>
            @endforeach
        </div>
    </div>
@endsection
