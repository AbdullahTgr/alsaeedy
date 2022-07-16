









<section class="content-item grey" id="blog-timeline">
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
        <div class="container" style="
    padding-top: 15px;
		">





            <div class="row">
				{{-- @foreach ($posts_o as $posts_o_p)
					   {{ $posts_o_p->postcat }}
				@endforeach --}}
             
                <!-- BLOG POSTS - START -->
                <div class="col-sm-10">
                  <h2>مقالات</h2>
                    <div class="timeline">
                        @if($news)
                        @foreach($news as $post)
                                 @if ($post->postcat[0]->{'title-ar'}!="اخبار")
									 
                        {{ $post->postcat[0]->{'title-ar'} }}
						
							@php 
								$author_info=DB::table('users')->where('id',$post->added_by)->get();
							@endphp
<div><i class="fa fa-eye"></i> {{ intval($post->{'description-fr'}) }} </div>
 

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

            <img src="{{ $data->photo }}" class="img-responsive"  alt="{{$data->{'name'} }}">
		
	
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
@php
$arr=explode("/",$post->photo);
$arrcount=count($arr);
$newpath="/";

@endphp

@for ($i = 1; $i < $arrcount; $i++)

	@php
	if($i==$arrcount-1){
		$newpath.='thumbs/'.$arr[$i];
	}else{
		$newpath.=$arr[$i]."/";
	}
		
	@endphp
	
@endfor



			<img class="img-responsive pull-right" src="{{$newpath}}"  alt="{{$post->{'title-ar'} }}">{!! $post->{'summary-ar'} !!}
</a>
		 </p>

		  
      </div>
      <!-- BLOG POST 1 - END --> 
								 
									 
								 @endif



                        @endforeach
                    @endif
                 
                        
                        
                    </div>
                    
                    <div class="text-center">
                      <a href="##" class="btn btn-danger btn-lg">Load More</a>
                    </div>
                    
                </div>
                <!-- BLOG POSTS - END --> 
                
                <!-- SIDEBAR - START -->
                <div class="col-sm-2" style="direction: rtl;">
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
					<div class="sidebar"> 
						  <h3>فئات</h3>
						  <div class="box categories">
							  <ul class="list-unstyled">
								  @foreach ($categories as $category)
									  <li><a href="{{route('blog.category',$category->{'slug'})}}"><i class="fa fa-female"></i>{{$category->{'title-ar'} }}</a></li>
								  @endforeach
								  
							  </ul>
						  </div>
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
						  {{-- <h3>Recent Posts</h3>
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
						  </div> --}}
					  </div>
				  </div>
				  <!-- SIDEBAR - END -->
        
				  
            </div>
        </div>
    </section>