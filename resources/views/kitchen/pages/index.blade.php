@extends('kitchen.layout')
@section('content')


<div id="content-wrapper" class="ng-scope">



	<div class="row" id="content-header">

		<div class="row">

			<div class="col-sm-3">
				<div class="card-body board">

					<h1>Đơn Đặt Món <div class="btn-group">

							<a type="button" class="dropdown" data-bs-toggle="dropdown"><i class="fas fa-bell"></i><i class="fas fa-circle" style="color: red;font-size: 7px;float: right;"></i></a>
							<div class="dropdown-menu">
								<p>CÓ ĐƠN MỚI BÀN SỐ 1</p>
								<P></P>
							</div>
						</div>
					</h1>
					<div class="box-scroll">
						<table class="table">

							<tbody>
								@if($bill != null)
								@foreach($bill as $bill)
								<tr data-bs-toggle="collapse" data-bs-target="#demo{{$bill->id}}" onclick="Billdetail('{{$bill->id}}')">
									<td>
										<div class="board-number">{{$bill->board->board_number}}</div>
									</td>
									<td><b>Đơn đặt từ bàn số {{$bill->board->board_number}}</b>
										<div>{{$bill->created_at}}</div>
									</td>
								</tr>
								@endforeach
								@endif
							</tbody>

						</table>
					</div>
				</div>
			</div>

			<div class="col-sm-5">
				<div class="row">


					<div class="card-body board">

						<div>
							<h1>Chi Tiết Đơn Đặt Bàn <i class="fas fa-bars"></i>
						</div>
						<div id="billdetail"></div>
					</div>

				</div>
			</div>
			<div class="col-sm-4">
				<div class="card-body board">

					<h1>Danh Sách Món Ăn</h1>
					<div class="search-container">
						<form id="" method="POST" action="{{ route('kitchen.search')}}" style="text-align: center;">
							@csrf
							<input type="hidden" name="food_type" hidden class="form-control" id="food_type" value="{{$food_type}}">
							<input style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:1.55rem; margin-bottom:1.55rem; width:350px" type="text" name="namesearch" placeholder="Nhập tên món ăn">
							<button id="btnsearch" class="btn-search" type="submit" style="padding: 0.5rem 1.5rem; border-radius: 10px;background:#a3a4a5c2"><i class='fas fa-search' style='font-size:15px'></i></button>

						</form>

						@if($food_type == 1)

						<a type="button" href="{{route('kitchen.checktype', ['food_type' => $food_type =1])}}" class="btn btn-warning checktype" id="1" style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:40px; margin-bottom:5px">Món ăn</a>
						<a class="btn btn-light checktype" href="{{route('kitchen.checktype', ['food_type' => $food_type =2])}}" id="2" style=" padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:5px; margin-bottom:5px">Nước uống</a>
						@else
						<a type="button" href="{{route('kitchen.checktype', ['food_type' => $food_type =1])}}" class="btn btn-light checktype" id="1" onclick="return CheckType(1);" style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:40px; margin-bottom:5px">Món ăn</a>
						<a class="btn btn-warning checktype" href="{{route('kitchen.checktype', ['food_type' => $food_type =2])}}" id="2" onclick="return CheckType(2);" style="padding: 0.5rem 1.5rem; border-radius: 10px; margin-left:5px;margin-bottom:5px">Nước uống</a>
						@endif
						<div id="food_show"></div>
						<div class="box-scroll" style=" height: 560px;">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Hình ảnh</th>
										<th scope="col">Tên món</th>
										<th scope="col">Trạng thái</th>
									</tr>
								</thead>
								<tbody>
									@foreach($food as $food)

									<tr>
										<td style="width: 20%;"><img src="{{ Storage::url($food->food_img) }}" alt="{{ $food->food_name }}" style=" width: 80px;"></td>
										<td style="width: 50%;">
											<h4>{{$food->food_name}}</h4>
										</td>
										<td style="width: 30%;">
											@if($food->status == 1)
											<label class="switch ">
												<input type="checkbox" checked onclick="Over('{{$food->id}}')">
												<span class="slider round"></span>
											</label>
											@else
											<label class="switch ">
												<input type="checkbox" onclick="Still('{{$food->id}}')">
												<span class="slider round"></span>
											</label>
										</td>
									</tr>
									@endif
								</tbody>
								@endforeach
							</table>
						</div>
					</div>
				</div>


			</div>

		</div>

	</div>
	@stop