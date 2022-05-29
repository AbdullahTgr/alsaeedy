
<div class="row">
    @foreach($product_lists as $key=>$product)
    @php 
                                $photo=explode(',',$product->photo);
                            // dd($photo);
                            @endphp
    <div class="col-lg-4 col-md-6 text-center {{$product->cat_id}}">
        <div class="single-product-item">
            <div class="product-image">
                <a href="{{route('product-detail',$product->slug)}}"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
            </div>
            <h3>
                            
                            
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
              </h3>
            
            <p class="product-price">
                <span>
                    <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>{{ Lang::get('msg.quickshop') }}</span></a>
             </span>
            
                @php
                $after_discount=($product->price-($product->price*$product->discount)/100);
            @endphp
            <span><del style="padding-left:4%;">L.E {{number_format($product->price,2)}}</del></span>
            L.E {{number_format($after_discount,2)}}
            
            </p>
            <a class="cart-btn" href="{{route('add-to-cart',$product->slug)}}">{{ Lang::get('msg.addtocart') }}<i class="fa fa-shopping-cart"></i></a>
        </div>
    </div>

   @endforeach
</div>