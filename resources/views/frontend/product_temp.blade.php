














<!-- Start Small Banner  -->
<section class="small-banner section">
    <div class="container-fluid">
        <div class="row">
            @php 
            $category_lists=DB::table('categories')->where('status','active')->limit(3)->get();
            @endphp
            @if($category_lists)
                @foreach($category_lists as $cat)
                    @if($cat->is_parent==1)
                        <!-- Single Banner  -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-banner">
                                @if($cat->photo)
                                    <img src="{{$cat->photo}}" alt="{{$cat->photo}}">
                                @else
                                    <img src="https://via.placeholder.com/600x370" alt="#">
                                @endif
                                <div class="content">
                                    <h3>
                                        @if(session()->get('locale')=="en")
                                            {{-- english --}}
                                        {{$cat->title}}
                                        @elseif(session()->get('locale')=="fr")
                                            {{-- french --}}
                                        {{$cat->{'title-fr'} }}
                                        @else
                                            {{-- Arabic --}}
                                        {{$cat->{'title-ar'} }}
                                        @endif
                                    </h3>
                                        <a href="{{route('product-cat',$cat->slug)}}">{{ Lang::get('msg.discovernow') }}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- /End Single Banner  -->
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- End Small Banner -->






















<!-- Start Product Area -->
<div class="product-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>{{ Lang::get('msg.trendingitems') }}</h2>
                </div>
            </div>
        </div>
     
{{-- @include('frontend.oldprd') --}}
                    @include('frontend.newprd')
    </div>
</div>
<!-- End Product Area -->
{{-- @php
$featured=DB::table('products')->where('is_featured',1)->where('status','active')->orderBy('id','DESC')->limit(1)->get();
@endphp --}}
<!-- Start Midium Banner  -->
<section class="midium-banner">
<div class="container">
    <div class="row"> 
        @if($featured)
            @foreach($featured as $data)
                <!-- Single Banner  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner">
                        @php 
                            $photo=explode(',',$data->photo);
                        @endphp
                        <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                        <div class="content">
                            <p>
                                @if(session()->get('locale')=="en")
                                    {{-- english --}}
                                {{$data->cat_info['title']}}
                                @elseif(session()->get('locale')=="fr")
                                    {{-- french --}}
                                {{$data->cat_info['title-fr']}}
                                @else
                                    {{-- Arabic --}}
                                {{$data->cat_info['title-ar']}}
                                @endif

                                
                            </p>
                            <h3>
                                @if(session()->get('locale')=="en")
                                    {{-- english --}}
                               {{$data->title}} 
                                @elseif(session()->get('locale')=="fr")
                                    {{-- french --}}
                                {{$data->{'title-fr'} }} 
                                @else
                                    {{-- Arabic --}}
                                {{$data->{'title-ar'} }} 
                                @endif
                                
                                <br>{{ Lang::get('msg.upto') }}<span> {{$data->discount}}%</span></h3>
                            <a href="{{route('product-detail',$data->slug)}}">{{ Lang::get('msg.shopnow') }}</a>
                        </div>
                    </div>
                </div>
                <!-- /End Single Banner  -->
            @endforeach
        @endif
    </div>
</div>
</section>
<!-- End Midium Banner -->

<!-- Start Most Popular -->
<div class="product-area most-popular section">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h2>{{ Lang::get('msg.hotitem') }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="owl-carousel popular-slider">
                @foreach($product_lists as $product)
                    @if($product->condition=='hot')
                        <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{route('product-detail',$product->slug)}}">
                                @php 
                                    $photo=explode(',',$product->photo);
                                // dd($photo);
                                @endphp
                                <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                {{-- <span class="out-of-stock">Hot</span> --}}
                            </a>
                            <div class="button-head">
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>{{ Lang::get('msg.quickshop') }}</span></a>
                                    <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" ><i class=" ti-heart "></i><span>{{ Lang::get('msg.addtowishlist') }}</span></a>
                                </div>
                                <div class="product-action-2">
                                    <a href="{{route('add-to-cart',$product->slug)}}">{{ Lang::get('msg.addtocart') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{route('product-detail',$product->slug)}}">
                                
                                
                                @if(session()->get('locale')=="en")
                                    {{-- english --}}
                               {{$product->title}} 
                                @elseif(session()->get('locale')=="fr")
                                    {{-- french --}}
                                {{$product->{'title-fr'} }} 
                                @else
                                    {{-- Arabic --}}
                                {{$product->{'title-ar'} }} 
                                @endif
                            </a></h3>
                            <div class="product-price">
                                <span class="old">${{number_format($product->price,2)}}</span>
                                @php 
                                $after_discount=($product->price-($product->price*$product->discount)/100)
                                @endphp
                                <span>${{number_format($after_discount,2)}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Most Popular Area -->

<!-- Start Shop Home List  -->
<section class="shop-home-list section">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="row">
                <div class="col-12">
                    <div class="shop-section-title">
                        <h1>{{ Lang::get('msg.latestitems') }}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    $product_lists=DB::table('products')->where('status','active')->orderBy('id','DESC')->limit(6)->get();
                @endphp
                @foreach($product_lists as $product)
                    <div class="col-md-4"  style="{{ session()->get('locale') == 'ar' ? 'direction: rtl;' : '' }}"  >
                        <!-- Start Single List  -->
                        <div class="single-list">
                            <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    @php 
                                        $photo=explode(',',$product->photo);
                                        // dd($photo);
                                    @endphp
                                    <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                    <a href="{{route('add-to-cart',$product->slug)}}" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h4 class="title"><a href="#">
                                        @if(session()->get('locale')=="en")
                                            {{-- english --}}
                                       {{$product->title}} 
                                        @elseif(session()->get('locale')=="fr")
                                            {{-- french --}}
                                        {{$product->{'title-fr'} }} 
                                        @else
                                            {{-- Arabic --}}
                                        {{$product->{'title-ar'} }} 
                                        @endif
                                    </a></h4>
                                    <p class="price with-discount">${{number_format($product->discount,2)}}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- End Single List  -->
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
</section>






<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
     	<h4>{{ Lang::get('msg.freeshipping') }}</h4>
                        <p>{{ Lang::get('msg.ordersover100') }} </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
             	     <h4>{{ Lang::get('msg.freereturn') }}</h4>
                        <p>{{ Lang::get('msg.wthin30daysreturn') }} </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
      		  <p>{{ Lang::get('msg.100securepayment') }}</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
        			   <h4>{{ Lang::get('msg.bestprice') }}</h4>
                        <p>{{ Lang::get('msg.guarantedprice') }}</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->






<!-- Modal -->
@if($product_lists)
    @foreach($product_lists as $key=>$product)
        <div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Product Slider -->
                                        <div class="product-gallery">
                                            <div class="quickview-slider-active">
                                                @php 
                                                    $photo=explode(',',$product->photo);
                                                // dd($photo);
                                                @endphp
                                                @foreach($photo as $data)
                                                    <div class="single-slider">
                                                        <img src="{{$data}}" alt="{{$data}}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    <!-- End Product slider -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="quickview-content">
                                        <h2>
                                            @if(session()->get('locale')=="en")
                                                {{-- english --}}
                                           {{$product->title}} 
                                            @elseif(session()->get('locale')=="fr")
                                                {{-- french --}}
                                            {{$product->{'title-fr'} }} 
                                            @else
                                                {{-- Arabic --}}
                                            {{$product->{'title-ar'} }} 
                                            @endif
                                        </h2>
                                        <div class="quickview-ratting-review">
                                            <div class="quickview-ratting-wrap">
                                                <div class="quickview-ratting">
                                                    {{-- <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="fa fa-star"></i> --}}
                                                    @php
                                                        $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                                        $rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
                                                    @endphp
                                                    @for($i=1; $i<=5; $i++)
                                                        @if($rate>=$i)
                                                            <i class="yellow fa fa-star"></i>
                                                        @else 
                                                        <i class="fa fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <a href="#"> ({{$rate_count}} {{ Lang::get('msg.customerreview') }})</a>
                                            </div>
                                            <div class="quickview-stock">
                                                @if($product->stock >0)
                                                <span><i class="fa fa-check-circle-o"></i> {{$product->stock}} {{ Lang::get('msg.instock') }}</span>
                                                @else 
                                                <span><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} {{ Lang::get('msg.outofstock') }}</span>
                                                @endif
                                            </div>
                                        </div> 
                                        @php
                                            $after_discount=($product->price-($product->price*$product->discount)/100);
                                        @endphp
                                        <h3><small><del class="text-muted">${{number_format($product->price,2)}}</del></small>    ${{number_format($after_discount,2)}}  </h3>
                                        <div class="quickview-peragraph">
                                            <p>{!! html_entity_decode($product->summary) !!}</p>
                                        </div>
                                        @if($product->size)
                                            <div class="size">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <h5 class="title">{{ Lang::get('msg.size') }}</h5>
                                                        <select>
                                                            @php 
                                                            $sizes=explode(',',$product->size);
                                                            // dd($sizes);
                                                            @endphp
                                                            @foreach($sizes as $size)
                                                                <option>{{$size}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-lg-6 col-12">
                                                        <h5 class="title">Color</h5>
                                                        <select>
                                                            <option selected="selected">orange</option>
                                                            <option>purple</option>
                                                            <option>#581845</option>
                                                            <option>pink</option>
                                                        </select>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        @endif
                                        <form action="{{route('single-add-to-cart')}}" method="POST" class="mt-4">
                                            @csrf 
                                            <div class="quantity">
                                                <!-- Input Order -->
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
													<input type="hidden" name="slug" value="{{$product->slug}}">
                                                    <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--/ End Input Order -->
                                            </div>
                                            <div class="add-to-cart">
                                                <button type="submit" class="btn">{{ Lang::get('msg.addtocart') }}</button>
                                                <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn min"><i class="ti-heart"></i></a>
                                            </div>
                                        </form>
                                        <div class="default-social">
                                        <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
@endif
<!-- Modal end -->

  
<!-- Start Shop Blog  -->
<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>{{ Lang::get('msg.fromourblog') }}</h2>
                </div>
            </div>
        </div>
        <div class="row" style="padding-bottom: 100px;">
            @if($posts)
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog  -->
                        <div class="shop-single-blog">
                            <img src="{{$post->photo}}" alt="{{$post->photo}}">
                            <div class="content">
                                <p class="date">{{$post->created_at->format('d M , Y. D')}}</p>
                                <a href="{{route('blog.detail',$post->slug)}}" class="title">
                                    @if(session()->get('locale')=="en")
                                        {{-- english --}}
                                   {{$post->title}} 
                                    @elseif(session()->get('locale')=="fr")
                                        {{-- french --}}
                                    {{$post->{'title-fr'} }} 
                                    @else
                                        {{-- Arabic --}}
                                    {{$post->{'title-ar'} }} 
                                    @endif    
                                </a>
                                <a href="{{route('blog.detail',$post->slug)}}" class="more-btn">{{ Lang::get('msg.continuereading') }}</a>
                            </div>
                        </div>
                        <!-- End Single Blog  -->
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
</section>
<!-- End Shop Blog  -->