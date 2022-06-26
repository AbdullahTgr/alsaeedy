@section('style')
<style>


.box_rr{
    border: 1px solid #ddd;
    box-shadow: 1px 1px 12px #e9e9e9;
    
}
</style>

@endsection

<div class="container">
    <div class="row" style="direction: rtl;">


        @foreach ($maincatroot as $category)
 <!-- SIDEBAR - START -->
<div class="col-sm-3" >
    <div class="sidebar">
            
            <div class="box categories box_rr">
                <ul class="list-unstyled">
                <li><a href=""><h3>{{$category->{'title-ar'} }}</h3></a></li>
                    @foreach ($category->maincategory as $cat)
                        <li><a href="{{route('video.maincategory',$cat->{'slug'})}}"><i class="fa fa-female"></i>{{$cat->{'title-ar'} }}</a></li>
                    @endforeach 
                    
                </ul>
            </div>
    </div> 
</div> 
<!-- SIDEBAR - END -->       
        @endforeach











    </div>
</div>

















