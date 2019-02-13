@extends('layouts.front')
@section('title')
    Blogger - Home page
@endsection

@section('content')
    <!-- banner -->
    <div class="banner">
        <div class="container">
            <h2>Contrary to popular belief, Lorem Ipsum simply</h2>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <a href="#">READ ARTICLE</a>
        </div>
    </div>
    <!-- technology -->
    <div class="technology">
        <div class="container">
            <div class="col-md-9 technology-left">
                <div class="tech-no">
                    <!-- technology-top -->
                    @isset($posts)
                        @foreach($posts as $post)
                    <div class="tc-ch">
                        <div class="tch-img">
                            <a href="{{ route("single", ['id' => $post->id]) }}"><img src="{{ asset('/'.$post->path) }}" class="img-responsive" alt="{{ $post->alt }}"/></a>
                        </div>
                        <a class="blog blue" href="{{ route("single", ['id' => $post->id]) }}">{{ $post->description }}</a>
                        <h3><a href="{{ route("single", ['id' => $post->id]) }}">{{ ($post->title) }}</a></h3>
                        <p>{{ $post->content }}</p>

                        <div class="blog-poast-info">
                            <ul>
                                <li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> {{ $post->name }} </a></li>
                                <li><i class="glyphicon glyphicon-calendar"> </i>{{ date("d.m.Y. H:i:s", $post->created_at) }}</li>
                                <li><i class="glyphicon glyphicon-comment"> </i><a class="p-blog" href="#">3 Comments </a></li>
                                <li><i class="glyphicon glyphicon-heart"> </i><a class="admin" href="#">5 favourites </a></li>
                                <li><i class="glyphicon glyphicon-eye-open"> </i>1.128 views</li>
                            </ul>
                        </div>
                    </div>
                        @endforeach
                        @endisset
                </div>
            </div>
            @include('components.sidebar')
        </div>
    </div>
    <!-- technology -->
    @endsection