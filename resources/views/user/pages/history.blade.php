@extends('user.layout')
@section('content')


<div class="container-fluid">
	<ul class="breadcrumb bg-white">
		<li class="breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
		<li class="breadcrumb-item active" aria-current="page">Lịch Sử</li>
	</ul>
	<div class="row">
		<!-- truyện mới -->
		<div class="col-md-8 col-sm-6 ">
			
			<h3 class="tittle-w3layouts my-lg-4 my-4">LỊCH SỬ ĐỌC TRUYỆN > </h3>
		
				<!-- truyện -->
				
				<form method="POST">
					@csrf
					@if(session()->has('infoUser'))
					<?php $infoUser = session()->get('infoUser') ?>
					<input type="hidden" name="user_id" hidden class="form-control" id="id_userhistory" value="{{$infoUser['id']}}">
					<div id="history_show"></div>
					@endif
				</form>
				
			
			<br>
			<ul class="pagination justify-content-center ">

				<li class="page-item active"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item"><a class="page-link" href="#">...</a></li>
				<li class="page-item"><a class="page-link" href="#">20</a></li>
				<li class="page-item">
					<a class="page-link" href="#">></a>
				</li>
			</ul>
		</div>
		<!-- truyện theo dõi -->
		<div class="col-md-4 col-sm-6">
			<div class="col-12 col-sm-6 col-md-12 p-2">
				<div class="d-flex flex-column text-center border height100">

					<h5>Truyện theo dõi</h5>
					<p>Không có dữ liệu</p>
				</div>
				<br>
				<!-- top -->
				<div class="d-flex flex-column  border height100">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link  active" id="tab-topmonth" data-toggle="tab" href="#content-topmonth" role="tab" aria-controls="content-topmonth" aria-selected="true">
								Top tháng
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab-topweek" data-toggle="tab" href="#content-topweek" role="tab" aria-controls="content-topweek" aria-selected="false">
								Top tuần
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab-topday" data-toggle="tab" href="#content-topday" role="tab" aria-controls="content-topday" aria-selected="false">
								Top ngày
							</a>
						</li>
					</ul>

					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade  show active" id="content-topmonth" role="tabpanel" aria-labelledby="tab-topmonth">
							<div class="tab-pane">
								<div id="topMonth">
									<ul class="list-unstyled relative">
										<li class="clearfix" style="display:block">
											<span class="txt-rank fn-order pos1">01</span>
											<div class="t-item">
												<a class="thumb" title="Until Your Sword Breaks" href="https://baotangtruyengo.com/truyen-tranh/until-your-sword-breaks-30994">
													<img class=" ls-is-cached lazyloaded" src="https://img.baotangtruyenvip.com/Upload02/AvatarStory/API/20230511/until-your-sword-breaks.jpg" alt="Until Your Sword Breaks" style="display: inline;">
												</a>
												<h3 class="title">
													<a href="https://baotangtruyengo.com/truyen-tranh/until-your-sword-breaks-30994">Until Your Sword Breaks iusdui uec eegfe ehfuehu eheu</a>
												</h3>
												<p class="chapter top">
													<a href="https://baotangtruyengo.com/truyen-tranh/until-your-sword-breaks/chapter-1/778897" title="Chapter 1">Chapter 1</a>
													<span class="view pull-right">
														<i class="fa fa-eye"></i> 127K
													</span>
												</p>
											</div>
										</li>
										<li class="clearfix" style="display:block">
											<span class="txt-rank fn-order pos1">02</span>
											<div class="t-item">
												<a class="thumb" title="Until Your Sword Breaks" href="https://baotangtruyengo.com/truyen-tranh/until-your-sword-breaks-30994">
													<img class=" ls-is-cached lazyloaded" src="https://img.baotangtruyenvip.com/Upload02/AvatarStory/API/20230511/until-your-sword-breaks.jpg" alt="Until Your Sword Breaks" style="display: inline;">
												</a>
												<h3 class="title">
													<a href="https://baotangtruyengo.com/truyen-tranh/until-your-sword-breaks-30994">Until Your Sword Breaks</a>
												</h3>
												<p class="chapter top">
													<a href="https://baotangtruyengo.com/truyen-tranh/until-your-sword-breaks/chapter-1/778897" title="Chapter 1">Chapter 1</a>
													<span class="view pull-right">
														<i class="fa fa-eye"></i> 127K
													</span>
												</p>
											</div>
										</li>
										<li class="clearfix" style="display:block">
											<span class="txt-rank fn-order pos1">03</span>
											<div class="t-item">
												<a class="thumb" title="Until Your Sword Breaks" href="https://baotangtruyengo.com/truyen-tranh/until-your-sword-breaks-30994">
													<img class=" ls-is-cached lazyloaded" src="https://img.baotangtruyenvip.com/Upload02/AvatarStory/API/20230511/until-your-sword-breaks.jpg" alt="Until Your Sword Breaks" style="display: inline;">
												</a>
												<h3 class="title">
													<a href="https://baotangtruyengo.com/truyen-tranh/until-your-sword-breaks-30994">Until Your</a>
												</h3>
												<p class="chapter top">
													<a href="https://baotangtruyengo.com/truyen-tranh/until-your-sword-breaks/chapter-1/778897" title="Chapter 1">Chapter 1</a>
													<span class="view pull-right">
														<i class="fa fa-eye"></i> 127K
													</span>
												</p>
											</div>
										</li>




									</ul>
									<a href="topmonth:;" class="tr-topthang-viewmore "><i class="fa fa-plus"></i> Xem tiếp</a>
								</div>
								<div id="topWeek">
								</div>
								<div id="topDay">
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="content-topweek" role="tabpanel" aria-labelledby="tab-topweek">
							top thang
						</div>
						<div class="tab-pane fade" id="content-topday" role="tabpanel" aria-labelledby="tab-topday">
							top ngay
						</div>
					</div>
				</div>
				<br>
			</div>
		</div>

	</div>
</div>
<br>
@stop