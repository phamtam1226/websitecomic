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
					<div class="d-flex flex-column height100">
						<div class="image">
							<a href="{{ route('details', ['comicId' => $comic->id]) }}" title="{{ $comic->comic_name }}">
								<img src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}">
							</a>
							<div class="view clearfix">
								<span class="pull-left">

									<!-- Cần thêm logic để hiển thị số lượt xem, số bình luận và số yêu thích -->
									<i class="fa fa-eye">{{ $comic->number_views}}</i> <i class="fa fa-comment">{{ $comic->number_comments}}</i> <i class="fa fa-heart">{{ $comic->number_follows}}</i>

								</span>
							</div>
						</div>
						<figcaption>
							<h3>
								<a class="jtip" data-jtip="#truyen-tranh-229" href="{{ route('details', ['comicId' => $comic->id]) }}">{{ $comic->comic_name }}</a>
							</h3>
							<ul style=" list-style-type: none;">
								<?php $check = 0 ?>
								<?php $paychap = 0 ?>
								@foreach($comic->chapters as $chapter)
								<li class="chapter clearfix">
									@if(session()->has('infoUser'))
									<?php $infoUser = session()->get('infoUser') ?>
									@foreach($history as $historyct)
									@if($chapter->id == $historyct->chapter_id)

									<a style="margin-left: -25px;color: silver;" href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapter chapterview" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a>
									<?php $check = 1 ?>

									@endif

									@endforeach

									@if($check != 1)
									<input type="hidden" name="user_id" hidden class="form-control" id="id_userhistory" value="{{$infoUser['id']}}">
									@if($chapter->coin == 0)
									<a style="margin-left: -25px;" href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview chapterhistory" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a>
									@else
									@foreach($opchapter as $openchap)
									@if($chapter->id == $openchap->chapter_id)
									<?php $paychap = 1 ?>
									@endif
									@endforeach
									@if($paychap == 1)
									<a style="margin-left: -25px;" href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview chapterhistory" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a>
									<?php $paychap = 0 ?>
									@else
									<a style="margin-left: -25px;" data-bs-toggle="modal" data-bs-target="#myModal{{$chapter->id}}" type="button" title="{{ $chapter->chapter_name }}" class=" chapterview" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }} <i class='fas fa-lock'></i></a>


									@endif


									@endif
									@else
									<?php $check = 0 ?>
									@endif

									<!-- <a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview chapterhistory" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a> -->
									<input type="hidden" name="user_id" hidden class="form-control" id="id_userhistory" value="{{$infoUser['id']}}">

									<div class="modal" id="myModal{{$chapter->id}}">
										<div class="modal-dialog modal-dialog-centered">

											<form method="POST" enctype="multipart/form-data" id="save1">
												@csrf
												<div class="modal-content">

													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title">Mở chap</h4>
														<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
													</div>

													<!-- Modal body -->

													<div class="modal-body">
														Bạn có muốn dùng 300 xu để mở khóa {{$chapter->chapter_name}}
													</div>

													<!-- Modal footer -->
													<div class="modal-footer">
														<input type="hidden" name="user_id" hidden class="form-control" id="id_user" value="{{$infoUser['id']}}">
														<input type="hidden" name="chapter_id" hidden class="form-control" id="id_chapter" value="{{$chapter->id}}">
														<input type="hidden" name="coin" hidden class="form-control" id="coin" value="{{$chapter->coin}}">

														<button type="button" class="submitchapter btn btn-primary" data-bs-dismiss="modal" data-id="{{$chapter->id}}">Xác nhận</button>
														<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Thoát</button>
													</div>
												</div>
											</form>

										</div>
									</div>
									@else
									@if($chapter->coin ==0)
									<a style="margin-left: -25px;" href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a>
									@else
									<a style="margin-left: -25px;" type="button" onclick="alert('Bạn cần đăng nhập trước')" title="{{ $chapter->chapter_name }}" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }} <i class='fas fa-lock'></i></a>
									@endif
									<!-- <a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a> -->
									@endif <i class="time">{{ $chapter->created_at->diffForHumans() }}</i>
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
				{{$comics->links()}}
			</ul>
		</div>

		<!-- truyện theo dõi -->
		<div class="col-md-4 col-sm-6">
			<div class="col-12 col-sm-6 col-md-12 p-2" style="margin-top: 40px;">
				<div class="d-flex flex-column text-center border height100">

					<h5>Truyện theo dõi</h5>
					@if (session()->has('infoUser') == null)
					<p>Không có dữ liệu</p>
					@else
					<?php $infoUser = session()->get('infoUser') ?>
					<form class="hidden" id="form" enctype="multipart/form-data">
						@csrf
						<input style="display: none" name='user_id' type="text" value="{{$infoUser['id']}}">
					</form>
					@include('user.pages.f_panel')
					@endif
				</div>
				<br>
				@if(session()->has('infoUser'))
				<div class="d-flex flex-column text-center border height100">

					<a href="{{ url('/history') }}">
						<h5>Lịch sử đọc truyện</h5>
					</a>

					<hr>

					<?php $infoUser = session()->get('infoUser') ?>
					@foreach($history as $history)
					<li class="clearfix" style="display:block">
						<div class="t-item">
							<a class="thumb" title="{{ $history->comic->comic_name }}" href="{{ route('details', ['comicId' => $history->comic->id]) }}">
								<img class=" ls-is-cached lazyloaded" src="{{ Storage::url($history->comic->cover_image) }}" alt="{{ $history->comic->comic_name }}" style="display: inline;">
							</a>
							<h3 class="title title_history">
								<a href="{{ route('details', ['comicId' => $history->comic->id]) }}">{{ $history->comic->comic_name }}</a>

							</h3>
							<span class="chapter clearfix">
								<br>
								<a href="{{ route('chapter.details', ['chapterId' => $history->chapter_id]) }}" class="chapter clearfix" title="{{ $history->chapter->chapter_name }}">Đọc tiếp {{ $history->chapter->chapter_name }} <i class="fa fa-angle-right"></i></a>

							</span>
						</div>
					</li>
					@endforeach

				</div>
				@endif
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