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
									@foreach ($topmonthComic as $comic)
									<ul class="list-unstyled relative">
										<li class="clearfix" style="display:block">
											{{-- <span class="txt-rank fn-order pos1">01</span> --}}
											<div class="t-item">
												<a class="thumb" title="{{ $comic->comic_name }}" href="{{ route('details', ['comicId' => $comic->id]) }}">
													<img class=" ls-is-cached lazyloaded" src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}" style="display: inline;">
												</a>
												<h3 class="title">
													<a href="{{ route('details', ['comicId' => $comic->id]) }}">{{ $comic->comic_name }}</a>
												</h3>
												<p class="chapter top">
												<ul style=" list-style-type: none;">
													@foreach($comic->chapters as $chapter)
													<li class="chapter clearfix">
														<a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a>
														{{-- <i class="time">{{ $chapter->created_at->diffForHumans() }}</i> --}}
														<span class="view pull-right">
															<i class="fa fa-eye"></i> {{ $comic->day_views }}
														</span>
													</li>
													@endforeach
												</ul>

												</p>
											</div>
										</li>

									</ul>
									@endforeach
									{{-- <a href="topmonth:;" class="tr-topthang-viewmore "><i class="fa fa-plus"></i> Xem tiếp</a> --}}
								</div>
								<div id="topWeek">
								</div>
								<div id="topDay">
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="content-topweek" role="tabpanel" aria-labelledby="tab-topweek">
							@foreach ($topweekComic as $comic)
							<ul class="list-unstyled relative">
								<li class="clearfix" style="display:block">
									{{-- <span class="txt-rank fn-order pos1">01</span> --}}
									<div class="t-item">
										<a class="thumb" title="{{ $comic->comic_name }}" href="{{ route('details', ['comicId' => $comic->id]) }}">
											<img class=" ls-is-cached lazyloaded" src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}" style="display: inline;">
										</a>
										<h3 class="title">
											<a href="{{ route('details', ['comicId' => $comic->id]) }}">{{ $comic->comic_name }}</a>
										</h3>
										<p class="chapter top">
										<ul style=" list-style-type: none;">
											@foreach($comic->chapters as $chapter)
											<li class="chapter clearfix">
												<a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a>
												{{-- <i class="time">{{ $chapter->created_at->diffForHumans() }}</i> --}}
												<span class="view pull-right">
													<i class="fa fa-eye"></i> {{ $comic->day_views }}
												</span>
											</li>
											@endforeach
										</ul>

										</p>
									</div>
								</li>

							</ul>
							@endforeach
						</div>
						<div class="tab-pane fade" id="content-topday" role="tabpanel" aria-labelledby="tab-topday">
							@foreach ($topdayComic as $comic)
							<ul class="list-unstyled relative">
								<li class="clearfix" style="display:block">
									{{-- <span class="txt-rank fn-order pos1">01</span> --}}
									<div class="t-item">
										<a class="thumb" title="{{ $comic->comic_name }}" href="{{ route('details', ['comicId' => $comic->id]) }}">
											<img class=" ls-is-cached lazyloaded" src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}" style="display: inline;">
										</a>
										<h3 class="title">
											<a href="{{ route('details', ['comicId' => $comic->id]) }}">{{ $comic->comic_name }}</a>
										</h3>
										<p class="chapter top">
										<ul style=" list-style-type: none;">
											@foreach($comic->chapters as $chapter)
											<li class="chapter clearfix">
												<a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a>
												{{-- <i class="time">{{ $chapter->created_at->diffForHumans() }}</i> --}}
												<span class="view pull-right">
													<i class="fa fa-eye"></i> {{ $comic->day_views }}
												</span>
											</li>
											@endforeach
										</ul>

										</p>
									</div>
								</li>

							</ul>
							@endforeach
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