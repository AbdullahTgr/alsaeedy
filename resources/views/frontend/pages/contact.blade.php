@extends('frontend.layouts.master')

@section('main-content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{route('home')}}">{{ Lang::get('msg.home') }}<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="javascript:void(0);">{{ Lang::get('msg.contact') }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">





  <!-- Send Message -->
  <section class="page-section bg-light" id="sendmsg" style="direction: ltr">
    <div class="container">
        <div class="row col-12">
            <div class="col-lg-8 offset-lg-2 col-xs-12">
                <div class="card">
                    <div class="card-header bg-info" style="
                    --bs-bg-opacity: 1;
    background-color: #0a7bb7!important;
    text-align: center;
                    ">
                        <h3 class="text-white">{{ trans('sentence.sendusmsg')}}</h3>
                    </div> 
                    <div class="card-body"> 
                        
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif 
                   
                        <form method="POST" action="{{ route('contact-form.store') }}"  style="@if(session()->get('locale')=="ar") text-align:right @else  text-align:left @endif">                  
                            {{ csrf_field() }}
                            <div class="row" >
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <strong>{{ trans('sentence.name')}}:</strong>
                                        <input type="text" required name="name" class="form-control" placeholder="{{ trans('sentence.name')}}" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>{{ trans('sentence.email')}}:</strong>
                                        <input type="text" name="email" class="form-control" placeholder="{{ trans('sentence.email')}}" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>{{ trans('sentence.phone')}}:</strong>
                                        <input type="text" required name="phone" class="form-control" placeholder="{{ trans('sentence.phone')}}" value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('Phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>{{ trans('sentence.subject')}}:</strong>
                                        <input type="text" name="subject" class="form-control" placeholder="{{ trans('sentence.subject')}}" value="{{ old('subject') }}">
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>{{ trans('sentence.message')}}:</strong>
                                        <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>  
                                </div>
                            </div>
                   
                            <div class="form-group text-center" style="padding:5px;">
                               
                               <button class="btn btn-success btn-submit" style="
 background: #ffc107;
    color: #0a7bb7;  "> {{ trans('sentence.send')}}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>









								<div class="title">
									@php
										$settings=DB::table('settings')->get();
									@endphp
									<h4>{{ Lang::get('msg.getintouch') }}</h4>
									<h3>{{ Lang::get('msg.writeusmsg') }}@auth @else<span style="font-size:12px;" class="text-danger">[{{ Lang::get('msg.youneedtolog') }}]</span>@endauth</h3>
								</div>
								<form class="form-contact form contact_form" method="post" action="{{route('contact.store')}}" id="contactForm" novalidate="novalidate">
									@csrf
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>{{ Lang::get('msg.yourname') }}<span>*</span></label>
												<input name="name" id="name" type="text" placeholder="{{ Lang::get('msg.yourname') }}">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>{{ Lang::get('msg.yoursubject') }}<span>*</span></label>
												<input name="subject" type="text" id="subject" placeholder="{{ Lang::get('msg.yoursubject') }}">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>{{ Lang::get('msg.youremail') }}<span>*</span></label>
												<input name="email" type="email" id="email" placeholder="{{ Lang::get('msg.youremail') }}">
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>{{ Lang::get('msg.yourphone') }}<span>*</span></label>
												<input id="phone" name="phone" type="number" placeholder="{{ Lang::get('msg.yourphone') }}">
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label>{{ Lang::get('msg.yourmessage') }}<span>*</span></label>
												<textarea name="message" id="message" cols="30" rows="9" placeholder="{{ Lang::get('msg.yourmessage') }}"></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">{{ Lang::get('msg.sendmessage') }}</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">{{ Lang::get('msg.callusnow') }}</h4>
									<ul>
										<li>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">{{ Lang::get('msg.email') }}:</h4>
									<ul>
										<li><a href="mailto:info@yourwebsite.com">@foreach($settings as $data) {{$data->email}} @endforeach</a></li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">{{ Lang::get('msg.ouraddress') }}:</h4>
									<ul>
										<li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
	

	
	<!-- Start Shop Newsletter  -->
	@include('frontend.layouts.newsletter')
	<!-- End Shop Newsletter -->
	<!--================Contact Success  =================-->
	<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-success">{{ Lang::get('msg.thanku') }}</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-success">{{ Lang::get('msg.urmsgsnt') }}</p>
			</div>
		  </div>
		</div>
	</div>
	
	<!-- Modals error -->
	<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<h2 class="text-warning">{{ Lang::get('msg.sorry') }}</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-warning">{{ Lang::get('msg.somethingwentwrong') }}</p>
			</div>
		  </div>
		</div>
	</div>
@endsection

@push('styles')
<style>
	.modal-dialog .modal-content .modal-header{
		position:initial;
		padding: 10px 20px;
		border-bottom: 1px solid #e9ecef;
	}
	.modal-dialog .modal-content .modal-body{
		height:100px;
		padding:10px 20px;
	}
	.modal-dialog .modal-content {
		width: 50%;
		border-radius: 0;
		margin: auto;
	}
</style>
@endpush
@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush