@extends("layouts.front")

@section("title") Blog - Single Post @endsection

@section("content")
    <div class="technology-1">
        <div class="container">
            <div class="col-md-9 technology-left">
                <div class="business">
                    <div class=" blog-grid2">
                        <img src="{{ asset('/'.$post->path) }}" class="img-responsive" alt="{{ $post->alt }}">
                        <div class="blog-text">
                            <h5>{{ $post->title }}</h5>
                            <p>{{ $post->content }}</p>
                        </div>
                    </div>

                    @component("components.comments_post", [
                'comments' => $post->comments
            ])@endcomponent
                    @if(session()->get('user'))
                        @include('components.comments_form')
                    @else
                        <h4>In order to comment, you must <a href="{{ route('loginForm') }}">login</a> first.</h4>
                    @endif
                    <br><br><br

                    </div>

                </div>
            </div>

        </div>
    @endsection
@section('appendScripts')
    <script src="{{ asset("js/editComment.js") }}"></script>
@endsection