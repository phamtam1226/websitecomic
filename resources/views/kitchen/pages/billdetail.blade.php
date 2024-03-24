<div class="box-scroll" style="  height: 580px;">

    @foreach($billdetail as $billdetail)


    <table class="table">

        <tbody>


            <tr>
                <td class="col" style="width: 20%;"><img src="{{ Storage::url($billdetail->food->food_img) }}" alt="{{ $billdetail->food->food_name }}" style=" width: 80px;"></td>
                <td style="width: 50%;">
                    <h4>{{$billdetail->food->food_name}}</h4><b>Ghi chú:</b> {{$billdetail->note}}
                </td>
                <td style="width: 30%;">x{{$billdetail->quantity}}</td>
                <td><button type="sumit" class="btn btn-success" onclick="return Complete('{{$bill->id}}')" style="margin-right: 28px;
    width: 86px;
    margin-top: 9px;
">Hoàn thành</button> &nbsp;</td>
            </tr>

        </tbody>

    </table>

    @endforeach
</div>

@if($bill->status == 1)
<div class="row" style="margin-left: 3px;width: 99%;">
    <button type="sumit" class="btn btn-success" onclick="return Complete('{{$bill->id}}')">Hoàn Thành Tất Cả</button> &nbsp;
</div>
@else
<div class="row" style="margin-left: -1px;">
    <button type="button" class="btn btn-danger"> Đã Hoàn thành</button> &nbsp;
</div>
@endif

<script>
    function ef() {
        var txt;
        if (confirm("Bạn có muốn xóa tài khoản đã chọn?")) {
            return true;
        }
        return false;
    }
</script>