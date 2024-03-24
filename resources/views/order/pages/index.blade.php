@extends('order.layout')
@section('content')


<div id="content-wrapper" class="ng-scope">
	@if(session()->has('infoUser'))


	<div class="row" id="content-header">
		<h1>Danh sách bàn ăn</h1>
		<br>
		<br>

		<div class="card-body board">
			<div class="row">
				<div class="col-sm-2">

				</div>
				<div class="col-sm-2">
					<h5><span style="background-color: #828fca;">&ensp;&ensp;</span>
						<span>
							&ensp;Trống
						</span>
						<h5>
				</div>
				<div class="col-sm-2">
					<h5><span style="background-color: yellow;">&ensp;&ensp;</span>
						<span>
							&ensp; Đang đợi món
						</span>
						<h5>
				</div>
				<div class="col-sm-2">
					<h5><span style="background-color: #ffc107;">&ensp;&ensp;</span>
						<span>
							&ensp; Chờ thanh toán
						</span>
						<h5>
				</div>
				<div class="col-sm-2">
					<h5><span style="background-color: #45ca45;">&ensp;&ensp;</span>
						<span>
							&ensp; Đang thanh toán
						</span>
						<h5>
				</div>
				<div class="col-sm-2">

				</div>

			</div>
			<br>
			<br>
			<div class="row rowboard">
				@foreach($board as $board)
				<div class="col-sm-3">
					@if($board->board_status == 1 )
					<div class="card-body" style="margin-bottom: 20px;">
						<a href="{{ route('order.order', ['board_id' => $board->id]) }}" class="card-body " style="margin-bottom: 20px;"><button class="board-button" type="button">Bàn số {{$board->board_number}}</button>
						</a>
					</div>
					@elseif($board->board_status == 2 )
					<div class="card-body" style="margin-bottom: 20px;">
						<a href="{{ route('order.order', ['board_id' => $board->id]) }}" class="card-body " style="margin-bottom: 20px;"><button class="board-button" style="background-color: yellow;" type="button">Bàn số {{$board->id}}</button>
						</a>
					</div>
					@elseif($board->board_status == 3 )
					<div class="card-body" style="margin-bottom: 20px;">
						<a href="{{ route('order.order', ['board_id' => $board->id]) }}" class="card-body " style="margin-bottom: 20px;"><button class="board-button" style="background-color: #ffc107;" type="button">Bàn số {{$board->id}}</button>
						</a>
					</div>
					@else
					<div class="card-body" style="margin-bottom: 20px;">
						<a href="{{ route('order.order', ['board_id' => $board->id]) }}" class="card-body " style="margin-bottom: 20px;"><button class="board-button" style="background-color: #45ca45;" type="button">Bàn số {{$board->id}}</button>
						</a>
					</div>
					@endif
				</div>
				@endforeach

			</div>
		</div>
	</div>
</div>
@endif
</div>
@stop