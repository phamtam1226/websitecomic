<?php $check = 0 ?>
<?php $paychap = 0 ?>

@foreach($chapters as $chapter)

@if(session()->has('infoUser'))
<?php $infoUser = session()->get('infoUser') ?>

<div id="chapter_error"></div>
<li class="row ">
    <div class="col-md-5 chapter">
   
                    
        @foreach($history as $historyct)
            @if($chapter->id == $historyct->chapter_id)
                
                <a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" style="color: silver;" title="{{ $chapter->chapter_name }}" class="chapter chapterview" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a>
                <?php $check = 1 ?>
              
            @endif
           
        @endforeach
        
        @if($check != 1)
        <input type="hidden" name="user_id" hidden class="form-control" id="id_userhistory" value="{{$infoUser['id']}}">
            @if($chapter->coin == 0)
            <a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview chapterhistory" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a>
            @else
                @foreach($opchapter as $openchap)
                @if($chapter->id == $openchap->chapter_id)        
                <?php $paychap = 1 ?>
                @endif     
                @endforeach
                @if($paychap == 1)    
                <a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview chapterhistory" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }}</a>
                <?php $paychap = 0 ?>
                @else
                <a data-bs-toggle="modal" data-bs-target="#myModal{{$chapter->id}}" type="button" title="{{ $chapter->chapter_name }}" class=" chapterview" data-id="{{ $chapter->id }}">{{ $chapter->chapter_name }} <i class='fas fa-lock' ></i></a><span style="color: gold; float:right;">{{$chapter->coin}} <i class='fas fa-coins' style="color: gold;"></i></span>

                
                @endif


        @endif
        @else 
        <?php $check = 0 ?>
        @endif
    </div>
    <div class="col-md-4 text-center small">{{ $chapter->created_at->diffForHumans() }}</div>
    <div class="col-md-3 text-center small"> {{ $chapter->number_view }}</div>
</li>
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
<li class="row ">
    <div class="col-md-5 chapter">
        <a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}" class="chapterview" data-id="{{ $chapter->id }}" style="color:silver;">{{ $chapter->chapter_name }}</a>
    </div>
    <div class="col-md-4 text-center small">{{ $chapter->created_at->diffForHumans() }}</div>
    <div class="col-md-3 text-center small"> {{ $chapter->number_view }}</div>
</li>

@endif


@endforeach