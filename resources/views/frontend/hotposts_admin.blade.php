
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
                        <img class="img-responsive pull-right" width="100%;" src="{{$post->photo}}"  alt="{{$post->{'title-ar'} }}">
            </a>
                        <li><a href="{{ route('post.visitors',$post->id) }}"><i class="fa fa-fire"></i>عرض المشاهدات</a></li>
                     
                    </ul>
                </div>
        </div> 
    </div> 
    <!-- SIDEBAR - END -->       
            @endforeach
    
    
    
    
    
    
    
    
    
    
    
        </div>
    </div>

</section>