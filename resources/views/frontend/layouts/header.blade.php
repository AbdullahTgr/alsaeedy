<header class="header shop">

    
    <div class="middle-inner">
        
@if(session()->get('locale')=="ar" || session()->get('locale')=="" )
<link rel="stylesheet" href="{{asset('frontend/css/arabic.css')}}">
@endif
            
        

        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                       
                    </div>
                    <!--/ End Logo --> 
              
                    
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>

                
                <div class="col-lg-2 col-md-3 col-12">
              
                    
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
                                                <li class="{{Request::path()=='writers' ? 'active' : ''}}"><a href="{{route('writers')}}">{{ Lang::get('msg.writers') }}</a></li>
                                              
                                                
                                                {{-- <li class="{{Request::path()=='videos' ? 'active' : ''}}"><a href="{{route('videos')}}">{{ Lang::get('msg.videos') }}</a></li>									
                                                --}}
                                            <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}">{{ Lang::get('msg.contactus') }}</a></li>
                                        
                                            @php
                            $settings=DB::table('settings')->get();
                            
                        @endphp           
                        
                        <li class="pull-left" style="
                            position: absolute;
    left: 0;
                        "><a href="{{route('home')}}" style="padding:0;"><img width="50px" src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="السعدي"></a> </li>         
                        
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

