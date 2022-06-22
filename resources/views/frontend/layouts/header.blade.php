<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row topp" >
          
                
                <div class="col-lg-6 col-md-12 col-12"> 
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                        <li><i class="ti-location-pin"></i><a href="{{route('order.track')}}">{{ Lang::get('msg.trackorder') }}</a></li>
                            {{-- <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li> --}}
                            @auth 
                                @if(Auth::user()->role=='admin') 
                                    {{-- <li><i class="ti-user"></i><a href="{{route('admin')}}"  target="_blank">{{ Lang::get('msg.dashboard') }}</a></li> --}}
                                @else 
                                    <li><i class="ti-user"></i><a href="{{route('user')}}"  target="_blank">{{ Lang::get('msg.dashboard') }}</a></li>
                                @endif
                                <li><i class="ti-power-off"></i> <a href="{{route('user.logout')}}">{{ Lang::get('msg.logout') }}</a></li>

                            @else
                                <li><i class="ti-power-off"></i><a href="{{route('login.form')}}">{{ Lang::get('msg.login') }} /</a> <a href="{{route('register.form')}}">{{ Lang::get('msg.register') }}</a></li>
                            @endauth
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        
@if(session()->get('locale')=="ar" || session()->get('locale')=="" )
<link rel="stylesheet" href="{{asset('frontend/css/arabic.css')}}">
@endif
            
        

        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        @php
                            $settings=DB::table('settings')->get();
                        @endphp                    
                        <a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"></a>
                    </div>
                    <!--/ End Logo --> 
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            
                            
     
                            

            @if(session()->get('locale')=="en")
            {{-- english --}}
            <select>
                <option >{{ Lang::get('msg.allcats') }}</option>
                @foreach(Helper::getAllCategory() as $cat)
                    <option>{{$cat->title}}</option> 
                @endforeach
            </select> 
@elseif(session()->get('locale')=="fr")
            {{-- french --}}
            <select>
                <option >{{ Lang::get('msg.allcats') }}</option>
                @foreach(Helper::getAllCategory() as $cat)
                    <option>{{$cat->{'title-fr'} }}</option>
                @endforeach
            </select> 
@else
            {{-- Arabic --}}
            <select>
                <option >{{ Lang::get('msg.allcats') }}</option>
                @foreach(Helper::getAllCategory() as $cat)
                    <option>{{$cat->{'title-ar'} }}</option>
                @endforeach
            </select> 
@endif



                            <form method="POST" action="{{route('product.search')}}">
                                @csrf
                                <input name="search" placeholder="{{ Lang::get('msg.searchforproducthere') }}" type="search">
                                <button class="btnn" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar shopping">
                            @php 
                                $total_prod=0;
                                $total_amount=0;
                            @endphp
                           @if(session('wishlist'))
                                @foreach(session('wishlist') as $wishlist_items)
                                    @php
                                        $total_prod+=$wishlist_items['quantity'];
                                        $total_amount+=$wishlist_items['amount'];
                                    @endphp
                                @endforeach
                           @endif
                            <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o"></i> <span class="total-count">{{Helper::wishlistCount()}}</span></a>
                            <!-- Shopping Item -->
                            @auth
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{count(Helper::getAllProductFromWishlist())}} {{ Lang::get('msg.items') }}</span>
                                        <a href="{{route('wishlist')}}">{{ Lang::get('msg.viewwishlist') }}</a>
                                    </div>
                                    <ul class="shopping-list">
                                        {{-- {{Helper::getAllProductFromCart()}} --}}
                                            @foreach(Helper::getAllProductFromWishlist() as $data)
                                                    @php
                                                        $photo=explode(',',$data->product['photo']);
                                                    @endphp
                                                    <li>
                                                        <a href="{{route('wishlist-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                        <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                                        <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">
                                                            @if(session()->get('locale')=="en")
                                                            {{-- english --}}
                                                        {{$data->product['title']}}
                                                            </select> 
                                                @elseif(session()->get('locale')=="fr")
                                                            {{-- french --}}
                                                       {{$data->product['title-fr']}}
                                                @else
                                                            {{-- Arabic --}}
                                                           {{$data->product['title-ar']}}
                                                @endif
                                                        </a></h4>
                                                        <p class="quantity">{{$data->quantity}} x - <span class="amount">{{number_format($data->price,2)}}</span></p>
                                                    </li>
                                            @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>{{ Lang::get('msg.total') }}</span>
                                            <span class="total-amount">${{number_format(Helper::totalWishlistPrice(),2)}}</span>
                                        </div>
                                        <a href="{{route('cart')}}" class="btn animate">{{ Lang::get('msg.cart') }}</a>
                                    </div>
                                </div>
                            @endauth
                            <!--/ End Shopping Item -->
                        </div>
                        {{-- <div class="sinlge-bar">
                            <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div> --}}
                        <div class="sinlge-bar shopping">
                            <a href="{{route('cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
                            <!-- Shopping Item -->
                            @auth
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{count(Helper::getAllProductFromCart())}} {{ Lang::get('msg.items') }}</span>
                                        <a href="{{route('cart')}}">{{ Lang::get('msg.viewcart') }}</a>
                                    </div>
                                    <ul class="shopping-list">
                                        {{-- {{Helper::getAllProductFromCart()}} --}}
                                            @foreach(Helper::getAllProductFromCart() as $data)
                                                    @php
                                                        $photo=explode(',',$data->product['photo']);
                                                    @endphp
                                                    <li>
                                                        <a href="{{route('cart-delete',$data->id)}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                        <a class="cart-img" href="#"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></a>
                                                        <h4><a href="{{route('product-detail',$data->product['slug'])}}" target="_blank">
                                                            
                                                            
                                                            
                                                        
                                                            @if(session()->get('locale')=="en")
                                                            {{-- english --}}
                                                        {{$data->product['title']}}
                                                            </select> 
                                                @elseif(session()->get('locale')=="fr")
                                                            {{-- french --}}
                                                       {{$data->product['title-fr']}}
                                                @else
                                                            {{-- Arabic --}}
                                                           {{$data->product['title-ar']}}
                                                @endif
                                                        
                                                        </a></h4>
                                                        <p class="quantity">{{$data->quantity}} x - <span class="amount">{{number_format($data->price,2)}}</span></p>
                                                    </li>
                                            @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>{{ Lang::get('msg.total') }}</span>
                                            <span class="total-amount">${{number_format(Helper::totalCartPrice(),2)}}</span>
                                        </div>
                                        <a href="{{route('checkout')}}" class="btn animate">{{ Lang::get('msg.checkout') }}</a>
                                    </div>
                                </div>
                            @endauth
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">	
                                    <div class="nav-inner" 
                                    @if(session()->get('locale')=="ar") style="direction: rtl" @endif>	
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">{{ Lang::get('msg.home') }}</a></li>
                                            <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">{{ Lang::get('msg.aboutus') }}</a></li>
                                            {{-- <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><a href="{{route('product-grids')}}">{{ Lang::get('msg.products') }}</a><span class="new">{{ Lang::get('msg.new') }}</span></li>												
                                                {{Helper::getHeaderCategory(Lang::get('msg.categories') )}}   --}}
                                                <li class="{{Request::path()=='blog' ? 'active' : ''}}"><a href="{{route('blog')}}">{{ Lang::get('msg.blog') }}</a></li>	

                                                <li class="{{Request::path()=='video' ? 'active' : ''}}"><a href="{{route('video')}}">{{ Lang::get('msg.video') }}</a></li>	

                                                {{-- <li class="{{Request::path()=='videos' ? 'active' : ''}}"><a href="{{route('videos')}}">{{ Lang::get('msg.videos') }}</a></li>									
                                                --}}
                                            <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}">{{ Lang::get('msg.contactus') }}</a></li>
                                            {{-- <select class="form-control changeLang" >
                                                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>{{ Lang::get('msg.english') }}</option>
                                                <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>{{ Lang::get('msg.france') }}</option>
                                                <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>{{ Lang::get('msg.arabic') }}</option>
                                            </select> --}}
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>

