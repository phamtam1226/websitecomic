@foreach($comment as $comment)

<div class="journalrow" id="jid-32956">
    <div class="author">
        <img alt="Author" src="{{ Storage::url($comment->user->avatar) }}">
        <button type="button" class="cmreply" onclick="addreplyclick(this)" data-id="{{$comment->id}}">Trả lời</button>
    </div>
    <div class="journalitem">
        <div class="journalsummary">
            <span class="authorname">{{$comment->user->name}}</span>
            <span class="member">Thành viên</span>
            <abbr title="7/7/2022 1:04:18 AM">
                <i class="fa fa-clock-o"></i>{{ $comment->created_at->diffForHumans() }}
            </abbr>
            <span class="cmchapter">{{$comment->chapter->chapter_name}}</span>
            <span onclick="journalReport(this);" class="cmreport" id="report-32956">Báo vi phạm</span>
            <div class="summary">{{$comment->content}}</div>
        </div>
    </div>
    <div class="listcmt">
        <div style="display:none;" class="formReply formreply{{$comment->id}}">
            <form action="" method="POST">
                @csrf
                <div class="replycomment">
                    @if(session()->has('infoUser'))
                    <?php $infoUser = session()->get('infoUser') ?>
                    <input class="form-control" type="text" name="user_name" readonly placeholder="Bạn hãy nhập tên..." id="namecmtreply" value="{{$infoUser['name']}}" required="">
                    <div class="form-outline  mb-4">
                        <textarea name="content" id="contentreply{{$comment->id}}" class="form-control" id="textAreaExample6" rows="3" required=""></textarea>
                    </div>
                    <input type="hidden" name="userreply_id" hidden class="form-control" id="id_userreply{{$comment->id}}" value="{{$infoUser['id']}}">
                    <input type="hidden" name="comment_id" hidden class="form-control" id="id_comment{{$comment->id}}" value="{{$comment->id}}">
                    <input type="hidden" name="status" hidden class="form-control" id="inputstatus{{$comment->id}}" value="1">

                    <button type="button" class="btn btn-primary" id="submitCmtreply" data-id="{{$comment->id}}">Gửi</button>
                    @else
                    <a href="{{route('getLogin')}}" class="btn hvr-hover">Vui lòng đăng nhập để bình luận</a>
                    @endif
            </form>
        </div>

    </div>

    @foreach($commentreply as $cmtreply)
    @if($comment->id == $cmtreply->comment_id)
    <ul class="jcmt" id="jcmt-32999">
        <li id="cmt-34431">
            <img alt="Author" src="{{ Storage::url($cmtreply->user->avatar) }}">
            <div class="jsummary">
                <i class="fa fa-angle-up"></i>
                <span class="authorname">{{$cmtreply->user->name}}</span>
                <span class="member">Thành viên</span>
                <abbr title="">
                    <i class="fa fa-clock-o"></i> {{ $cmtreply->created_at->diffForHumans() }}
                </abbr>
                <span onclick="journalReport(this);" class="cmreport" id="report-34431">Báo vi phạm</span>
                <div class="summary"> <span>
                        <i class="fa fa-mail-forward"> {{$comment->user->name}}</i> {{ $cmtreply->content_reply }}
                    </span>
                </div>
            </div>
        </li>
    </ul>
    @endif
    @endforeach
</div>

@endforeach