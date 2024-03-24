@extends('kitchen.layout')
@section('content')


<div id="content-wrapper" class="ng-scope">



	<div class="row" id="content-header">

		<div class="row">
			<div class="col-sm-8">
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

					<div class="row">
						@foreach($board as $board)
						<div class="col-sm-3">
							@if($board->board_status == 1 )
							<div class="card-body" style="margin-bottom: 20px;" onclick="showbill('{{$board->id}}')">
								<div class="card-body " style="margin-bottom: 20px;"><button class="board-button2" type="button">{{$board->board_number}}</button>
								</div>
							</div>
							@elseif($board->board_status == 2 )
							<div class="card-body" style="margin-bottom: 20px;" onclick="showbill('{{$board->id}}')">
								<div class="card-body " style="margin-bottom: 20px; "><button class="board-button2" style="background-color: yellow;" type="button">{{$board->board_number}}</button>
								</div>
							</div>
							@elseif($board->board_status == 3 )
							<div class="card-body" style="margin-bottom: 20px;" onclick="showbill('{{$board->id}}')">
								<div class="card-body " style="margin-bottom: 20px; "><button class="board-button2" style="background-color: #ffc107;;" type="button">{{$board->board_number}}</button>
								</div>
							</div>
							@else
							<div class="card-body" style="margin-bottom: 20px;" onclick="showbill('{{$board->id}}')">
								<div class="card-body " style="margin-bottom: 20px; "><button class="board-button2" style="background-color: green;" type="button">{{$board->board_number}}</button>
								</div>
							</div>
							@endif
						</div>

						@endforeach
					</div>

				</div>
			</div>

			<div class="col-sm-4">
				<div class="row">


					<div class="card-body board">

						<div>
							<h1>Chi Tiết Hóa Đơn <button type="button" class="btn btn-success" onclick="showtotal()" style="    margin-left: 338px;
    font-size: small;
">
									Kết Toán Trong Ngày
								</button>
						</div>

						<div id="billdetail"></div>
						<div id="showtotal"></div>
					</div>

				</div>
			</div>



		</div>

	</div>

</div>
@stop



<script>
	function showtotal() {
		$.ajax({
			url: "{{ route('cashier.showtotal') }}",
			type: 'GET',
			data: {

				_token: '{{ csrf_token() }}'
			},
			success: function(data) {
				$("#showtotal").html(data);



			}
		});
	};
</script>

<script>
	function showbill(e) {
		$.ajax({
			url: "{{ route('cashier.billdetail') }}",
			type: 'POST',
			data: {
				board_id: e,
				_token: '{{ csrf_token() }}'
			},
			success: function(data) {
				$("#billdetail").html(data);


			}
		});
	};
</script>

<script>
	function Pay(e) {
		$.ajax({
			url: "{{ route('cashier.pay') }}",
			type: 'POST',
			data: {
				bill_id: e,
				_token: '{{ csrf_token() }}'
			},
			success: function(data) {

			}
		});
	};
</script>