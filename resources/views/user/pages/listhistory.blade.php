<div class="row">
@foreach($history as $history)
<div class="col-6 col-sm-6 col-md-3 p-2">
    <div class="d-flex flex-column border height100">
        <div class="image">
            <img src="{{ Storage::url($history->comic->cover_image) }}" alt="{{$history->comic->comic_name}}">

            <div class="view text-center">

                <a  href="" style="color:white;" class="remove" data-id="{{$history->id}}"><i class="fa fa-times"></i> Xóa</a>

            </div>
        </div>
        <figcaption>
            <h3>
                <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ route('details', ['comicId' => $history->comic_id]) }}">{{$history->comic->comic_name}}</a>
            </h3>
            <li class="chapter clearfix">
                <a href="{{ route('chapter.details', ['chapterId' => $history->chapter_id]) }}">Đọc tiếp {{$history->chapter->chapter_name}} <i class="fa fa-angle-right"></i></a>
            </li>
        </figcaption>
    </div>
</div>
{{$hítory->links()}}
@endforeach
</div>