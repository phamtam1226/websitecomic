<div class="row">
    @foreach($follows as $follow)
    <div class="col-6 col-sm-6 col-md-2 p-2">

        <div class="d-flex flex-column border height100">
            <div class="image">
                <img src="{{ Storage::url($follow->comic->cover_image) }}" alt="{{$follow->comic->comic_name}}">


            </div>
            <figcaption>
                <h3>
                    <a class="jtip" data-jtip="#truyen-tranh-229" href="{{ route('details', ['comicId' => $follow->comic_id]) }}">{{ $follow->comic->comic_name }}</a>
                </h3>
                <ul style=" list-style-type: none;">
               
                </ul>
            </figcaption>
        </div>
    </div>

    @endforeach
</div>