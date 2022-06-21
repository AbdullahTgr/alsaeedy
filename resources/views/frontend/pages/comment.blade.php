@foreach($comments as $comment)
{{-- {{dd($comments)}} --}}
@php $dep = $depth-1; @endphp
<div class="display-comment"   @if($comment->parent_id != null) style="margin-left:40px;" @endif>
    <div class="comment-list">
        <div class="single-comment">
            @if($comment->user_info['photo'])
                <img src="{{$comment->user_info['photo']}}" alt="#">
            @else 
                <img src="{{asset('backend/img/avatar.png')}}" alt="">
            @endif
            <div class="content">
                {{-- {{$post}} --}}
            <h4>{{$comment->user_info['name']}} <span>{{ Lang::get('msg.at') }} {{$comment->created_at->format('g: i a')}} {{ Lang::get('msg.on') }} {{$comment->created_at->format('M d Y')}}</span></h4>
                <p>{{$comment->comment}}</p>
                @if($dep)
                <div class="button">
                    <a href="#" class="btn btn-reply reply" data-id="{{$comment->id}}"><i class="fa fa-reply" aria-hidden="true"></i>{{ Lang::get('msg.reply') }}</a>
                    <a href="" class="btn btn-reply cancel" style="display: none;" ><i class="fa fa-trash" aria-hidden="true"></i>{{ Lang::get('msg.cancel') }}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    @include('frontend.pages.comment', ['comments' => $comment->replies, 'depth' => $dep])

</div>    
@endforeach


@foreach($commentsno as $comment_n)



<div class="display-comment"   style="margin-left:40px;" >
    <div class="comment-list">
        <div class="single-comment" style="background:#ddd">
          
                <img src="{{asset('backend/img/avatar.png')}}" alt="">
            <div class="content">
                
            <h4>{{$comment_n->name}}  <span>{{ Lang::get('msg.at') }} {{$comment_n->created_at->format('g: i a')}} {{ Lang::get('msg.on') }} {{$comment_n->created_at->format('M d Y')}}</span></h4>
                <p>{{$comment_n->comment}}</p>
            
                    {{$comment_n->Email}}
                
            </div>
        </div>
    </div>

    
</div>    
@endforeach