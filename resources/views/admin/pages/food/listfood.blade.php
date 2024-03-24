<div class="col-12 col-xl-8 mb-4 mb-xl-0">
    <div class="card-body">
        <table id="book" class="table" broder="1">
            <thead>
                <tr>
                    <th>MSP</th>
                    <th>Hình Ảnh</th>
                    <th>Tên Món</th>
                    <th>Giá</th>
                    <th>Trạng Thái</th>
                    <th>Loại</th>
                    <th>Tùy Chỉnh</th>
                </tr>
            </thead>
            <tbody>
                @foreach($food as $food)
                <tr>
                    <td><b>M{{$food->id}}</b></td>
                    <td><img src="{{ Storage::url($food->food_img) }}" alt="{{ $food->food_name }}" style="width:50px; height:50px; border-radius:0%"></td>
                    <td>{{$food->food_name}}</td>
                    <td>{{$food->food_price}}đ </td>
                    @if($food->status == 1)
                    <td>Còn hàng</td>
                    @else
                    <td>Hết hàng</td>
                    @endif
                    @if($food->gener == 1)
                    <td>Đồ ăn</td>
                    @else
                    <td>Nước uống</td>
                    @endif



                    <td>
                        <a href="{{ route('admin.food.edit', $food) }}" class="btn btn-warning" style="padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-edit' style='font-size:15px'></i></a>
                        <form action="{{ route('admin.food.destroy', $food) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return ComfirmDelete();" class="btn btn-danger" style="margin-top:10px; padding: 0.5rem 1.5rem; border-radius: 10px;"><i class='fas fa-trash-alt' style='font-size:15px'></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>