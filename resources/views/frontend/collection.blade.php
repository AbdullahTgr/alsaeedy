
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<style>
    
	
h1, h2, h3, h4, h5, h6 {
	font-family: unset;
}
.content-item {
	font-family: unset;
    padding:30px 0;
	background-color:#FFFFFF;
}

.content-item.grey {
	background-color:#F0F0F0;
	padding:50px 0;
    
}

.content-item h2 {
	font-weight:700;
	font-size:35px;
	line-height:45px;
	text-transform:uppercase;
	margin:20px 0;
}

.content-item h3 {
	font-weight:400;
	font-size:20px;
	color:#555555;
	margin:10px 0 15px;
	padding:0;
}

.content-headline {
	height:1px;
	text-align:center;
	margin:20px 0 70px;
}

.content-headline h2 {
	background-color:#FFFFFF;
	display:inline-block;
	margin:-20px auto 0;
	padding:0 20px;
}

.grey .content-headline h2 {
	background-color:#F0F0F0;
}

.content-headline h3 {
	font-size:14px;
	color:#AAAAAA;
	display:block;
}


#blog-timeline h2,
#blog-item h2 {
    margin:0 0 15px;
}

#blog-timeline .sidebar h3,
#blog-item .sidebar h3 {
	margin-top:15px;
}

.timeline {
    border-left:3px solid #BBBBBB;
    margin-left:110px;
    padding-left:25px;
}

.blog-post {
    background-color: #FFFFFF;
    padding: 25px;
    margin-bottom: 102px;
    display: grid;
    text-align: right;
}

.blog-post .date-xs {
	display:none;
}

.blog-post p {
	font-size: 14px;
    line-height: 23px;
    text-align: right;
    padding: 10px 0px;
}

.blog-post p img {
    max-width: 60%;
}

.blog-post p img.pull-right {
	margin-left:15px;
}

.blog-post p img.pull-left {
	margin-right:15px;
}

.blog-post .blog-info {
	position: absolute;
    left: 15px;
    margin-top: -50px;
    width: 100px;
    background-color: #ffffff;
    box-shadow: 0 0 2px 1px rgb(0 0 0 / 20%);
}

.blog-post .blog-info:after {
    width:20px;
	height:20px;
    position: absolute;
    right:-37px;
    top:21px;
	content:"";
	text-align:center;
	border-radius:50%;
	border:5px solid #F0F0F0;
}

.blog-post .blog-info .date {
	background-color: #FFFFFF;
    font-size: 13px;
    text-align: center;
    padding: 0 3px;
    color: #62a4f7;
}

.blog-post .blog-info .date div {
	float:left;
	padding:8px 0 0 12px;
	font-weight:600;
}

.blog-post .blog-info .date div.number {

}

.box {
    background-color:#FFFFFF;
	padding:10px 20px;
	box-shadow:0 1px 2px 0 rgba(0,0,0,0.1);
	margin-bottom:20px;
}

.box h3 {
    margin:30px 0 5px;
	font-weight:bold;
}

.box ul {
	margin:0;
}

.box ul li {
	font-size:13px;
	border-bottom:1px dashed #DDDDDD;
	padding:10px 0;
	font-weight:600;
}

.box ul li:last-child {
	border-bottom:0;
}

.box ul li i {
	font-size:18px;
	margin-right:20px;
}

.box.categories ul li i {
	color:#BBBBBB;	
	position:relative;
	top:2px;
	width:20px;
}

.posts ul li a {
	font-size:14px;
	line-height:23px;
}

.posts ul li a:hover {
	color:#333333;	
}

.posts ul li div {
	font-size:13px;
	color:#999999;
	font-weight:bold;
	text-align:right;
	margin-top:5px;
}

.box.posts ul li i {
    color:#333333;
    font-size:14px;
    margin-right:10px;
}

.box.tags ul.blog-tags li {
	border:0;
}

ul.blog-tags li {
    padding: 7px 0;
    float: right;
    display: contents;
    color: #2196f3;
}

div ul.blog-tags li i,
div .box.tags ul li i {
	color:#FFFFFF;
	position:relative;
	top:1px;
	font-size:14px;
}
@media (max-width:1024px) {
    .blog-post p,
	.blog p,
	#comments .media p {
		text-align: right;
	}
}

/*------------------------------
    SMALL DEVICES
------------------------------*/

@media (min-width:768px) and (max-width:991px) {
	.overlay-wrapper .overlay a {
		font-size:15px;
		width:40px;
		height:40px;
		padding-top:9px;
	}
	
	#reference {
		min-height:430px;
	}
	
	#blog-timeline h2, 
	#blog-item h2 {
		font-size:30px;
	}
	
	.blog-post p img {
		max-width:100%;
		margin-bottom:10px;
	}
}

/*------------------------------
	EXTRA SMALL DEVICES
------------------------------*/

@media (max-width:767px) {
	.blog-post p img,
	.blog p img {
		max-width:100%;
		margin-bottom:10px;
	}
	
	#blog-timeline .sidebar,
	#blog-item .sidebar {
		margin-top:40px;
	}
	
	#gallery-item h2 {
		margin-top:20px;
	}
	
	.recent-post {
		margin-bottom:30px;
		text-align:center;
	}
	
	#event-info {
		padding-bottom:20px;
	}
	
	.event-info-item {
		margin-bottom:30px;
	}
}


</style>








<section class="content-item grey" id="blog-timeline">
        <div class="container">
            <div class="row">
                
                <!-- BLOG POSTS - START -->
                <div class="col-sm-8">
                  <h2>مقالات</h2>
                    <div class="timeline">
                        @if($posts)
                        @foreach($posts as $post)
                                 
                        
						
							@php 
								$author_info=DB::table('users')->where('id',$post->added_by)->get();
							@endphp
								<i class="fa fa-calendar" aria-hidden="true"></i>
								<a href="{{route('blog.detail',$post->slug)}}" style="padding: 14px;
									font-size: 13px;
									font-weight: bold;">
								{{ $post->created_at->format('d M, y') }}
								
</a>
								
									
							
									
     <!-- BLOG POST 1 - START -->
     <div class="blog-post">
					@foreach($author_info as $data)

        <div class="blog-info">

            <img src="{{ $data->photo }}" class="img-responsive" alt="{{$post->photo}}">
		
	
			<div class="date">
				
					@if($data->name)
						{{$data->name}}
					@else
					{{ Lang::get('msg.anonymous') }} 
					@endif
				
			</div>
          </div>

				@endforeach
		  
          <h2><a href="{{route('blog.detail',$post->slug)}}">{!! $post->{'title-ar'} !!} </a></h2>
          <div class="date-xs"> {{$post->created_at->format('d M , Y. D')}}</div>

          <p>
			<a href="{{route('blog.detail',$post->slug)}}" style="padding: 14px;
				font-size: 13px;
				font-weight: bold;">
			<img class="img-responsive pull-right" src="{{$post->photo}}" alt="">{!! $post->{'summary-ar'} !!}
</a>
		 </p>

        <ul class="blog-tags list-unstyled list-inline">
			@foreach (explode(",",$post->{'tags'}) as $item)
				
              <li><a href="#"><i class="fa fa-tag"></i>{{$item}}</a></li>
			@endforeach
			
          </ul>
      </div>
      <!-- BLOG POST 1 - END -->



                        @endforeach
                    @endif
                 
                        
                        
                    </div>
                    
                    <div class="text-center">
                      <a href="##" class="btn btn-danger btn-lg">Load More</a>
                    </div>
                    
                </div>
                <!-- BLOG POSTS - END --> 
                
                <!-- SIDEBAR - START -->
                <div class="col-sm-4" style="direction: rtl;">
                  <div class="sidebar">
                        <h3>فئات</h3>
                        <div class="box categories">
                            <ul class="list-unstyled">
								@foreach ($categories as $category)
                                	<li><a href="#"><i class="fa fa-female"></i>{{$category->{'title-ar'} }}</a></li>
								@endforeach
								
                            </ul>
                        </div>
                        <h3>Recent Posts</h3>
                        <div class="box posts">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-chevron-right"></i><a href="#">Introducing WordPress 4.0 “Benny”</a><div>27/02/2014</div></li>
                                <li><i class="fa fa-chevron-right"></i><a href="#">Nature Center: Earth Day Festival</a><div>18/02/2014</div></li>
                                <li><i class="fa fa-chevron-right"></i><a href="#">Two New Stores Set to Open in Downtown</a><div>05/02/2014</div></li>
                            </ul>
                        </div>
                        <h3>Tags</h3>
                        <div class="box tags">
                            <ul class="blog-tags list-unstyled list-inline">
                                <li><a href="#"><i class="fa fa-tag"></i>book</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i>music</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i>nature</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i>read</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i>songs</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i>sunshine</a></li>                            
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- SIDEBAR - END -->
            </div>
        </div>
    </section>