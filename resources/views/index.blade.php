@extends('layouts.app')

@section('content')
    <div class="container app">
        @if(Auth::user()->instagram)
            <div class="profile-header">
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 picture">
                    <img src="{{$user->profile_picture}}" alt="...">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 info">
                    <h1>{{$user->username}}</h1>

                    <span>
                        Posts({{$user->counts->media}}) .
                        Followers({{$user->counts->followed_by}}) .
                        Following({{$user->counts->follows}})
                    </span>
                </div>
            </div>

            <div class="posts col-xs-12 col-sm-12 col-md-8 col-lg-6">
                @if($posts)
                    @foreach($posts as $post)
                        <div class="post">
                            <div class="caption">
                                <h4>{{isset($post->caption->text) ? $post->caption->text : ''}}</h4>
                            </div>

                            @if($post->type === 'image')
                                <div class="image">
                                    <img src="{{$post->images->standard_resolution->url}}" alt="">
                                </div>
                            @else

                            @endif
                        </div>
                    @endforeach
                @else
                    No Instagram posts
                @endif
            </div>
        @else
            <a href="/instagram" class="btn btn-default">
                Authenticate with Instagram
            </a>
        @endif
    </div>
@endsection
