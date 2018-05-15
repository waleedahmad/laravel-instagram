@extends('layouts.app')

@section('content')
    <div class="container app">
        <div class="posts col-xs-12 col-sm-12 col-md-8 col-lg-6">
            @if(count($posts))
                @foreach($posts as $post)
                    <div class="post">
                        <div class="caption">
                            <h4>{{$post->caption->text}}</h4>
                        </div>

                        @if($post->type === 'image')
                            <div class="image">
                                <img src="{{$post->images->standard_resolution->url}}" alt="">
                            </div>
                        @else

                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
