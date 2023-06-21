@extends('user.layout')
@section('content')


<!-- Slider truyện đề cử -->

<div class="container-fluid">
	<div class="inner-sec-shop px-lg-4 px-3">
		<h3 class="tittle-w3layouts my-lg-4 my-4">TRUYỆN ĐỀ CỬ > </h3>
		<div class="owl-carousel owl-theme">
			@foreach($nominatedComics as $comic)
			<div class="item">
				<a href="{{ route('details', ['comicId' => $comic->id]) }}" title="{{ $comic->comic_name }}"><img class="lazyOwl" src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}" style="display: inline;"></a>
				<div class="slide-caption">
					<h3><a href="{{ route('details', ['comicId' => $comic->id]) }}" title="{{ $comic->comic_name }}">{{ $comic->comic_name }}</a></h3>
					@if($comic->chapters->isNotEmpty())
					@php
					$latestChapter = $comic->chapters->last();
					@endphp
					<a href="{{ route('chapter.details', ['chapterId' => $latestChapter->id]) }}" title="{{ $latestChapter->chapter_name }}">{{ $latestChapter->chapter_name }}</a>
					<span class="time"><i class="fa fa-clock-o"></i> {{ $latestChapter->created_at->diffForHumans() }}</span>
					@endif
				</div>

			</div>
			@endforeach
		</div>
	</div>
</div>

<!-- Slider truyện mới cập nhật -->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-sm-6" style="margin-top: 40px;">
			<p style="font-style:italic;">Truyện mới cập nhật</p>
			<div class="row">
				@foreach($comics as $comic)
				<div class="col-6 col-sm-6 col-md-3 p-2">
					<div class="d-flex flex-column border height100">
						<div class="image">
							<a href="{{ route('details', ['comicId' => $comic->id]) }}" title="{{ $comic->comic_name }}">
								<img src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}">
							</a>
							<div class="view clearfix">
								<span class="pull-left">

									<!-- Cần thêm logic để hiển thị số lượt xem, số bình luận và số yêu thích -->
									<i class="fa fa-eye">{{ $comic->number_views}}</i> <i class="fa fa-comment">{{ $comic->number_comments}}</i> <i class="fa fa-heart"></i>

								</span>
							</div>
						</div>
						<figcaption>
							<h3>
								<a class="jtip" data-jtip="#truyen-tranh-229" href="{{ route('details', ['comicId' => $comic->id]) }}">{{ $comic->comic_name }}</a>
							</h3>
							<ul style=" list-style-type: none;">
								@foreach($comic->chapters as $chapter)
								<li class="chapter clearfix">
									<a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a>
									<i class="time">{{ $chapter->created_at->diffForHumans() }}</i>
								</li>
								@endforeach
							</ul>
						</figcaption>
					</div>
				</div>
				@endforeach
			</div>
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
			<div class="col-12 col-sm-6 col-md-12 p-2" style="margin-top: 40px;">
				<div class="d-flex flex-column text-center border height100">

					<h5>Truyện theo dõi</h5>
					<p>Không có dữ liệu</p>
				</div>
				<br>
				<div class="d-flex flex-column text-center border height100">

					<h5>Lịch sử đọc truyện</h5>
					<hr>
					@if(session()->has('infoUser'))
					<?php $infoUser = session()->get('infoUser') ?>
					
					@else
					<p>Không có dữ liệu</p>
					@endif
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
				<!-- Bình luận -->
				<div class="new-comments d-flex flex-column border height100">

					<h5>Bình luận mới</h5>
					<ul class="list-unstyled">
						<div data-spy="scroll" data-target="#myScrollspy" data-offset="10" style="height:500px;overflow-y: scroll;padding:5px; ">
							@foreach($comment as $comment)
							<li id="cmt-57469">
								<h3 class="title">
									<a href="{{ route('details', ['comicId' => $comment->comic_id]) }}">{{ $comment->comic->comic_name }}</a>
									<a class="cmchapter-link" href="{{ route('chapter.details', ['chapterId' => $comment->chapter_id]) }}"><span class="cmchapter">{{$comment->chapter->chapter_name}}</span></a>
								</h3>
								<a class="thumb" title="Kiếm Sư Cấp 9 Trở Lại" href="{{ route('details', ['comicId' => $comic->id]) }}">
									<img alt="Author" class=" ls-is-cached lazyloaded" src="{{ Storage::url($comment->user->avatar) }}" style="display: inline;">
								</a>
								<span class="authorname">{{$comment->user->name}}</span><abbr title="5/25/2023 1:09:55 PM"><i class="fa fa-clock-o"></i> {{ $comment->created_at->diffForHumans() }}</abbr>

								<p class="wrapper-content-cmt"><br>{{$comment->content}}</p>
							</li>
							<hr>
							@endforeach
						</div>
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>
<br>

<!--//banner-sec-->

<!-- about -->
@stop