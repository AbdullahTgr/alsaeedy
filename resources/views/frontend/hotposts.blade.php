
<section>

    <div class="container">
        <h2 style="
        padding: 18px;
    text-align: center;
        ">اكثر قراءة</h2>
        <div class="row" >
    
     
            @foreach ($hotposts as $post)


     <!-- SIDEBAR - START -->
    <div class="col-sm-4 col-lg-3" >
        <div class="sidebar">
                
                <div class="box categories box_rr">
                    <ul class="list-unstyled">

                    <li>
                        {{ $post->postcat[0]->{'title-ar'} }}
                        <a href=""><h3> {!! $post->{'title-ar'} !!}</h3></a></li>
                        <div><i class="fa fa-eye"></i> {{ intval($post->{'description-fr'}) }} </div>
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






                        <img class="img-responsive pull-right" width="100%;" src="{{$newpath}}" alt="{{$post->{'title-ar'} }}">
            </a>
                        <li><a href="{{route('blog.detail',$post->slug)}}"><i class="fa fa-fire"></i>{!! $post->{'summary-ar'} !!}</a></li>
                     
                    </ul>
                </div>
        </div> 
    </div> 
    <!-- SIDEBAR - END -->       
            @endforeach
    
    
    
    
    
    
    
    
    
    
    
        </div>
    </div>

</section>