









<section class="content-item grey" id="blog-timeline">
        <div class="container">
            <div class="row">
                
                <!-- BLOG POSTS - START -->
                <div class="col-sm-9">
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
				
              <li><a href="{{route('blog.tag',$item)}}"><i class="fa fa-tag"></i>{{$item}}</a></li>
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
                <div class="col-sm-3" style="direction: rtl;">
					<div class="sidebar">
						  <h3>فئات</h3>
						  <div class="box categories">
							  <ul class="list-unstyled">
								  @foreach ($categories as $category)
									  <li><a href="{{route('blog.category',$category->{'slug'})}}"><i class="fa fa-female"></i>{{$category->{'title-ar'} }}</a></li>
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