<div class="row">
    <div class="col-12">        

        

        <div class="product-info">

            <div class="nav-main">
                <!-- Tab Nav -->
                <ul class="nav nav-tabs filter-tope-group" id="myTab" role="tablist">
                    @php 
                        $categories=DB::table('categories')->where('status','active')->where('is_parent',1)->get();
                        // dd($categories);
                    @endphp
                    @if($categories)
                    <button class="btn" style="background:#581845"data-filter="*">
                        {{ Lang::get('msg.allproducts') }}
                    </button>
                        @foreach($categories as $key=>$cat)
                        
                        <button class="btn" style="background:none;color:#581845;"data-filter=".{{$cat->id}}">
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
                        </button>
                        @endforeach
                    @endif
                </ul>
                <!--/ End Tab Nav -->
            </div>


            <div class="tab-content isotope-grid" id="myTabContent">
                <!-- Start Single Tab -->
               @if($product_lists)
                   @foreach($product_lists as $key=>$product)
                   <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->cat_id}}">
                       <div class="single-product">
            
            
                           <div class="product-img">
                               <a href="{{route('product-detail',$product->slug)}}">
                                   @php 
                                       $photo=explode(',',$product->photo);
                                   // dd($photo);
                                   @endphp
                                   <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                   <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                   @if($product->stock<=0)
                                       <span class="out-of-stock">{{ Lang::get('msg.saleout') }}</span>
                                   @elseif($product->condition=='new')
                                       <span class="new">{{ Lang::get('msg.new') }}</span>
                                   @elseif($product->condition=='hot')
                                       <span class="hot">{{ Lang::get('msg.hot') }}</span>
                                   @else
                                       <span class="price-dec">{{$product->discount}}{{ Lang::get('msg.off%') }}</span>
                                   @endif
            
            
                               </a>
                               <div class="button-head">
                                   <div class="product-action">
                                       <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>{{ Lang::get('msg.quickshop') }}</span></a>
                                       <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" ><i class=" ti-heart "></i><span>{{ Lang::get('msg.addtocart') }}{{ Lang::get('msg.addtowishlist') }}</span></a>
                                   </div>
                                   <div class="product-action-2">
                                       <a title="Add to cart" href="{{route('add-to-cart',$product->slug)}}">{{ Lang::get('msg.addtocart') }}</a>
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
                                   @php
                                       $after_discount=($product->price-($product->price*$product->discount)/100);
                                   @endphp
                                   <span>${{number_format($after_discount,2)}}</span>
                                   <del style="padding-left:4%;">${{number_format($product->price,2)}}</del>
                               </div>
                           </div>
            
            
            
                       </div>
                   </div>
                   @endforeach
            
                <!--/ End Single Tab -->
               @endif
            
            <!--/ End Single Tab -->
            
            </div>
            
           
        </div>
    </div>
</div>


