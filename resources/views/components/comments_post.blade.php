<div class="comments heading">
    <h3>Comments</h3>
    @foreach($comments as $comment)
        <div class="media">
            <div class="media-left">
                <a href="#">
                    <img src="{{ asset("images/si.png") }}" alt="blog avatar"> </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">	{{ $comment->name }}</h4>
                <h6><label>{{ date("F j, Y", strtotime($comment->created_at)) }}</label></h6>
                <p> @if(session('user'))
                        @if(session()->get('user')->id == $comment->id_user || session()->get('user')->role == 'admin')
                            <a href="{{ route("deleteComment", ['id' => $comment->id]) }}"> <i class="fa fa-trash"></i></a>
                        @endif
                        @if(session()->get('user')->id == $comment->id_user)
                            <a href="#comments"><i class="fa fa-edit" onclick="editComment({{ $comment->id }})"></i></a>
                        @endif
                    @endif
                    <span id="comment{{$comment->id}}">{{ $comment->content }}</span>
                </p>
            </div>
        </div>
    @endforeach
</div>
