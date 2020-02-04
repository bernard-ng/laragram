@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img class="w-100" src="/storage/{{  $post->image }}" alt="{{ $post->caption }}">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img
                                style="max-width: 40px"
                                src="/storage/{{ $post->user->profile->image }}"
                                class="w-100 rounded rounded-circle"
                                alt="profile"
                            >
                        </div>
                        <div>
                            <div class="font-weight-bold">
                                <a class="text-dark" href="{{ route('profiles.show', ['user' => $post->user->id]) }}">
                                    {{  $post->user->username }}
                                </a>
                                <a href="" class="pl-3">follow</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p>
                        <span class="font-weight-bold">
                            <a class="text-dark" href="{{ route('profiles.show', ['user' => $post->user->id]) }}">
                                {{  $post->user->username }}
                            </a>
                        </span>
                        {{ $post->caption }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
