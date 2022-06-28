@extends('frontend.layouts.master')

@section('title',"اتفاقية الاستخدام")
@php
								$settings=DB::table('settings')->get();
							@endphp
@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">{{ Lang::get('msg.home') }}<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">اتفاقية الاستخدام</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<section class="tracking_box_area section_gap py-5">
    <div class="container">
        {!! $settings[0]->privacyandpolicy !!}   
    </div>
</section>
@endsection