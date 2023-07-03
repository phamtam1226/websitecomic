@extends('user.layout')
@section('content')
<!-- banner -->
<div class="banner_inner">
  <div class="services-breadcrumb">
    <div class="inner_breadcrumb">

      <ul class="breadcrumb bg-white">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Quản lý tài khoản</li>
      </ul>
    </div>
  </div>

</div>

</div>
<!--//banner -->
<div class="container">
  <div class="row">
    <!--/tabs-->
    @if (session()->has('infoUser') != null)
    <?php
    $user = session()->get('infoUser');
    ?>
    <div class="responsive_tabs">
      <h4 style="text-align:center;color: #828284;">QUẢN LÝ TÀI KHOẢN</h4>
      <hr width="100%">
      <br>
      <div style="padding-bottom:10px; text-align:center">
        <img src="{{ Storage::url($user['avatar']) }}" alt="" style="width:150px; height:150px; border-radius:50%">
      </div>
      <br>
      <h6 style="font-weight:700; width:1100px; padding-bottom:10px">THÔNG TIN CÁ NHÂN</h6>
      <table class="thong-tin" style="border-style:double">
        <tbody>
          <tr>
            <td>Họ và tên:</td>
            <td>{{$user['name']}}</td>
          </tr>
          <tr>
            <td>Email:</td>
            <td>{{$user['email']}}</td>
          </tr>
          <tr>
            <td><button class="btn btn-success" style="font-size:90%" data-toggle="modal" data-target="#exampleEditModalCenter">CẬP NHẬT</button>
            <td><button type="button" class="btn btn-success" style="font-size:90%" data-bs-toggle="modal" data-bs-target="#myModal">
                NẠP XU
              </button>
            <td>
          </tr>
        </tbody>
      </table>
      <br>
      @endif
    </div>
  </div>
</div>
</div>



</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    @if (session()->has('infoUser') != null)
    <?php
    $myaccount = session()->get('infoUser');
    ?>
    <form action="{{ route('payment', $myaccount) }}" method="POST" enctype="multipart/form-data" id="save1">
      @csrf
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Nạp xu</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <input type="radio" class="btn-check" name="options" id="option1" value="100000" autocomplete="off" checked>
          <label class="btn btn-secondary" for="option1">100.000 vnd<br>20.000 coin</label>
        
          <input type="radio" class="btn-check" name="options" id="option2"  value="200000" autocomplete="off" checked>
          <label class="btn btn-secondary" for="option2">200.000 vnd<br>40.000 coin</label>
          <input type="radio" class="btn-check" name="options" id="option3"  value="500000" autocomplete="off" checked>
          <label class="btn btn-secondary" for="option3">500.000 vnd<br>100.000 coin</label>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Thanh toán</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endif

<div class="modal fade" id="exampleEditModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#ffa500a8;">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color:white; font-size:120%; padding-left:130px">THÔNG TIN CÁ NHÂN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if (session()->has('infoUser') != null)
      <?php
      $myaccount = session()->get('infoUser');
      ?>
      <form action="{{ route('user.updateinfomation', $myaccount) }}" method="POST" enctype="multipart/form-data" id="save1">
        @csrf
        <div class="modal-body" style="margin-top:10px; padding-left:10px; padding-right:10px">
          <div class="row">
            <div class="col-lg-12">
              <label for="exampleInputTopic">Ảnh đại diện</label>
              <div class="custom-file">
                <img width="15%" hight="10%" src="{{ Storage::url($user['avatar']) }}" class="img-thumbnail" />
                <input accept="*.png|*.jpg|*.jpeg" title="" type="file" class="form-control" name="avatar" id="avatar" placeholder="Chọn ảnh" />

              </div>
            </div>
            <div class="col-lg-12" style="margin-top:20px">
              <label for="exampleInputTopic">Họ tên</label>
              <input type="text" class="form-control" value="{{$user['name']}}" name="name" placeholder="Họ tên">
            </div>
          </div>
        </div>
        <div class="modal-footer" style="background-color:#ffa50099">
          <button type="submit" class="btn btn-primary" id="btnsave"><i class="fa fa-save"></i></button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-window-close"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endif
<!--//tabs-->
</div>
</div>

@stop