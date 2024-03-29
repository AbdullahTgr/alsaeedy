@extends('frontend.layouts.master')

@php
                                                        $tags=explode(',',$post->tags);
                                                    @endphp

@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<meta property="og:url" content="{!! route('blog.detail',strip_tags($post->slug)) !!}">

	<meta name="keywords" content="{{ str_replace('-',',',strip_tags($post->slug)) }}@foreach($tags as $tag),{{ $tag}}@endforeach ,السعدي">
	<meta name="description" content="{!!  strip_tags($post->{'summary-ar'} ) !!} - السعدي">


	<meta property="og:type" content="article">
	<meta property="og:title" content="{!! strip_tags($post->{'title-ar'}) !!} - السعدي">
	<meta property="og:image"  itemprop="image"  content="{{ url($post->photo) }} ">
    <meta name="twitter:image" content="{{ url($post->photo) }}">
	<meta property="og:description" content="{!!  strip_tags($post->{'summary-ar'} ) !!} - السعدي">
@endsection

@section('title',strip_tags($post->{'title-ar'}).' - السعدي')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">{{ Lang::get('msg.home') }}<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">{{ Lang::get('msg.blog') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Blog Single -->
    <section class="blog-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="blog-single-main">
                        <div class="row">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5062667702348863"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-5062667702348863"
     data-ad-slot="4854742754"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                            <div class="col-12">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5062667702348863"
                                crossorigin="anonymous"></script>
                           <!-- respo -->
                           <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-client="ca-pub-5062667702348863"
                                data-ad-slot="2257736673"
                                data-ad-format="auto"
                                data-full-width-responsive="true"></ins>
                           <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                           </script>





                                <div class="image">

                                    <img src="{{$post->photo}}" alt="{{$post->photo}}">
                                </div>
                                <div class="blog-detail">
                                    <h2 class="blog-title">{{$post->{'title-ar'} }}</h2>
                                    <div class="blog-meta">
                                        <span class="author"><a href="javascript:void(0);"><i class="fa fa-user"></i>{{ Lang::get('msg.by') }} {{$post->author_info['name']}}</a><a href="javascript:void(0);"><i class="fa fa-calendar"></i>{{$post->created_at->format('M d, Y')}}</a><a href="javascript:void(0);"><i class="fa fa-comments"></i>{{ Lang::get('msg.comment') }} ({{$post->allComments->count()}})</a></span>
                                    </div>
                                    <div class="sharethis-inline-reaction-buttons"></div>
                                    <div> مشاهدات <i class="fa fa-eye"></i> {{ $post->{'description-fr'} }} </div>

                                    <div class="content">
                                        @if($post->{'quote-ar'})
                                        <blockquote> <i class="fa fa-quote-left"></i> {!! ($post->{'quote-ar'}) !!} </blockquote>
                                        @endif
                                        <p>{!! ($post->{'summary-ar'}) !!}</p>
                                        <!-- ShareThis BEGIN --><div class="sharethis-inline-follow-buttons"></div><!-- ShareThis END -->
                                        <p>{!! ($post->{'description-ar'}) !!}</p>
                                    </div>
                                </div>


                            </div>
                            @auth
                            <div class="col-12 mt-4">
                                <div class="reply">
                                    <div class="reply-head comment-form" id="commentFormContainer">
                                        <h2 class="reply-title">{{ Lang::get('msg.leaveacomment') }}</h2>
                                        <!-- Comment Form -->
                                        <form class="form comment_form" id="commentForm" action="{{route('post-comment.store',$post->slug)}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Your Name<span>*</span></label>
                                                        <input type="text" name="name" placeholder="" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Your Email<span>*</span></label>
                                                        <input type="email" name="email" placeholder="" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group  comment_form_body">
                                                        <label>{{ Lang::get('msg.yourmessage') }}<span>*</span></label>
                                                        <textarea name="comment" id="comment" rows="10" placeholder=""></textarea>
                                                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                                        <input type="hidden" name="parent_id" id="parent_id" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group button">
                                                        <button type="submit" class="btn"><span class="comment_btn comment">{{ Lang::get('msg.postcomment') }}</span><span class="comment_btn reply" style="display: none;">{{ Lang::get('msg.replaycomment') }}</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Comment Form -->
                                    </div>
                                </div>
                            </div>

                            @else
                            <p class="text-center p-5">
                                <div class="col-12 mt-4">
                                    <div class="reply">
                                        <div class="reply-head comment-form" id="commentFormContainer">
                                            <h2 class="reply-title">{{ Lang::get('msg.leaveacomment') }}</h2>
                                            <!-- Comment Form -->
                                            <form class="form comment_form" id="commentForm" action="{{route('post-comment_no.store',$post->slug)}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Your Name<span>*</span></label>
                                                            <input type="text" name="name" placeholder="" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Your Email<span>*</span></label>
                                                            <input type="email" name="email" placeholder="" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group  comment_form_body">
                                                            <label>{{ Lang::get('msg.yourmessage') }}<span>*</span></label>
                                                            <textarea name="comment" id="comment" rows="10" placeholder=""></textarea>
                                                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                                            <input type="hidden" name="parent_id" id="parent_id" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group button">
                                                            <button type="submit" class="btn"><span class="comment_btn comment">{{ Lang::get('msg.postcomment') }}</span><span class="comment_btn reply" style="display: none;">{{ Lang::get('msg.replaycomment') }}</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- End Comment Form -->
                                        </div>
                                    </div>
                                </div>
                            </p>


                            <!--/ End Form -->
                            @endauth
                            <div class="col-12">
                                <div class="comments">
                                    <h3 class="comment-title"> {{ Lang::get('msg.comments') }} ({{$post->allComments->count()}})</h3>
                                    <!-- Single Comment -->
                                    @include('frontend.pages.comment', ['comments' => $post->comments,'commentsno' => $post->commentsno, 'post_id' => $post->id, 'depth' => 3])
                                    <!-- End Single Comment -->



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5062667702348863"
     crossorigin="anonymous"></script>
<!-- square -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5062667702348863"
     data-ad-slot="6101495379"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search">
                            <form class="form" method="GET" action="{{route('blog.search')}}">
                                <input type="text" placeholder="{{ Lang::get('msg.search') }}" name="search">
                                <button class="button" type="sumbit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->


                        @if(session()->get('locale')=="en")
{{-- ////                             english                 /// --}}


                        @elseif (session()->get('locale')=="fr")
{{-- ////                             french                 /// --}}


                        @else

{{-- ////                             arabic                 /// --}}


                        @endif


                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">{{ Lang::get('msg.recentpost') }}</h3>
                            @foreach($recent_posts as $post)
                                <!-- Single Post -->
                                <div class="single-post col-12">
                                    <div class="image ">
                                        <img src="{{$post->photo}}" alt="{{$post->{'title-ar'} }}">
                                    </div>
                                    <div class="content ">
                                        <h5><a href="{!! route('blog.detail',strip_tags($post->slug)) !!}">{{$post->{'title-ar'} }}</a></h5>
                                        <ul class="comment">
                                        @php
                                            $author_info=DB::table('users')->select('name')->where('id',$post->added_by)->get();
                                        @endphp
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$post->created_at->format('d M, y')}}</li>
                                            <li><i class="fa fa-user" aria-hidden="true"></i>
                                                @foreach($author_info as $data)
                                                    @if($data->name)
                                                        {{$data->name}}
                                                    @else
                                                    {{ Lang::get('msg.anonymous') }}
                                                    @endif
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Post -->
                            @endforeach
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->

                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget newsletter">
                            <h3 class="title">{{ Lang::get('msg.newslatter') }}</h3>
                            <div class="letter-inner">
                                <h4>{{ Lang::get('msg.subscribetogetnews') }} </h4>
                                {{-- <form action="{{route('subscribe')}}" method="POST">
                                    @csrf
                                    <div class="form-inner">
                                        <input type="email" name="email" placeholder="{{ Lang::get('msg.youremail') }}">
                                        <button type="submit" class="btn mt-2">{{ Lang::get('msg.submit') }} </button>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blog Single -->
@endsection
@push('styles')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=62246f7e58f4c4001368640a&product=inline-share-buttons' async='async'></script>
@endpush
@push('scripts')
<script>
$(document).ready(function(){

    (function($) {
        "use strict";

        $('.btn-reply.reply').click(function(e){
            e.preventDefault();
            $('.btn-reply.reply').show();

            $('.comment_btn.comment').hide();
            $('.comment_btn.reply').show();

            $(this).hide();
            $('.btn-reply.cancel').hide();
            $(this).siblings('.btn-reply.cancel').show();

            var parent_id = $(this).data('id');
            var html = $('#commentForm');
            $( html).find('#parent_id').val(parent_id);
            $('#commentFormContainer').hide();
            $(this).parents('.comment-list').append(html).fadeIn('slow').addClass('appended');
          });

        $('.comment-list').on('click','.btn-reply.cancel',function(e){
            e.preventDefault();
            $(this).hide();
            $('.btn-reply.reply').show();

            $('.comment_btn.reply').hide();
            $('.comment_btn.comment').show();

            $('#commentFormContainer').show();
            var html = $('#commentForm');
            $( html).find('#parent_id').val('');

            $('#commentFormContainer').append(html);
        });

 })(jQuery)
})
</script>
@endpush
