@include('user.header.head')




<div class="row">

    <!-- truyện -->

    @foreach($comics as $comic)

    <div class="col-6 col-sm-6 col-md-2 p-2">

        <div class="d-flex flex-column border height100">

            <div class="image">

                <a href="{{ route('details', ['comicId' => $comic->id]) }}" title="{{ $comic->comic_name }}">

                    <img src="{{ Storage::url($comic->cover_image) }}" alt="{{ $comic->comic_name }}">

                </a>

                <div class="view clearfix">

                    <span class="pull-left">

                        <!-- Cần thêm logic để hiển thị số lượt xem, số bình luận và số yêu thích -->

                <i class="fa fa-eye">{{ $comic->number_views }}</i> <i class="fa fa-comment">{{ $comic->number_comments }}</i> <i class="fa fa-heart">{{ $comic->number_follows }}</i>

                    </span>

                </div>

            </div>

            <figcaption>

                <h3>

                    <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ route('details', ['comicId' => $comic->id]) }}">{{ $comic->comic_name }}</a>

                </h3>

                <ul style=" list-style-type: none;">

                    @foreach($comic->chapters as $chapter)

                        <li class="chapter clearfix">

                            <a href="{{ route('chapter.details', ['chapterId' => $chapter->id]) }}" title="{{ $chapter->chapter_name }}">{{ $chapter->chapter_name }}</a>

                            <i class="time">{{ $chapter->created_at->diffForHumans() }}</i>

                        </li>

                    @endforeach

                </ul>

            </figcaption>

        </div>

    </div>

    @endforeach




    <br>

    <ul class="pagination justify-content-center ">




        <li class="page-item active"><a class="page-link" href="#">1</a></li>

        <li class="page-item"><a class="page-link" href="#">2</a></li>

        <li class="page-item"><a class="page-link" href="#">3</a></li>

        <li class="page-item"><a class="page-link" href="#">...</a></li>

        <li class="page-item"><a class="page-link" href="#">20</a></li>

        <li class="page-item">

            <a class="page-link" href="#">></a>

        </li>

    </ul>

</div>