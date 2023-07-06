@extends('user.layout')
@section('content')


<div class="container-fluid">
	<ul class="breadcrumb bg-white">
		<li class="breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
		<li class="breadcrumb-item active" aria-current="page">Theo dõi</li>
	</ul>
	<div class="row">
		<!-- truyện mới -->
		<div class="col-md-12 col-sm-6 ">
			
			<h3 class="tittle-w3layouts my-lg-4 my-4">THEO DÕI TRUYỆN > </h3>
		
				<!-- truyện -->
				
				<form method="POST">
					@csrf
					@if(session()->has('infoUser'))
					<?php $infoUser = session()->get('infoUser') ?>
					<input type="hidden" name="user_id" class="form-control" id="id_userfollow" value="{{$infoUser['id']}}">
					<div id="follow_show"></div>
					@endif
				</form>
				
			
			<br>
			
		</div>
		

	</div>
</div>
<br>

@stop