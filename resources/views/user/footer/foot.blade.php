<script defer src="/your-path-to-fontawesome/js/brands.js"></script>
<script defer src="/your-path-to-fontawesome/js/solid.js"></script>
<script defer src="/your-path-to-fontawesome/js/fontawesome.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!--Jquery -->

<script type="text/javascript" src="{!! asset('user/css/slide.js') !!}"></script>

<script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0" nonce="Qm2ykszD"></script>

<script>
    function redirectToChapter(chapterId) {
        var redirectUrl = "{{ route('chapter.details', ['chapterId' => ':chapterId']) }}";
        redirectUrl = redirectUrl.replace(':chapterId', chapterId);
        window.location.href = redirectUrl;
    }
</script>

<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        items: 6,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true
    })
</script>
<script type="text/javascript">

</script>
<script>
    $(document).ready(function() {

        load_comment();

        function load_comment() {

            $.ajax({

                url: "{{route('loadComment')}}",
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "chapter_id": $("#inputid_chapter").val(),
                    "comment_id": $("#inputid_chapter").val(),
                },
                success: function(data) {
                    update_numbercomment();
                    $('#comment_show').html(data);
                }
            });
        }

        function update_numbercomment() {

            $.ajax({

                url: "{{route('loadNumbercomment')}}",
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "chapter_id": $("#inputid_chapter").val(),
                },
                success: function(data) {
                    $('#number_comment').html(data);
                }
            });
        }


        $("#submitBinhLuan").click(function() {
            $.ajax({

                url: "{{route('postComment')}}",
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "user_id": $("#inputid_user").val(),
                    "chapter_id": $("#inputid_chapter").val(),
                    "comic_id": $("#inputid_comic").val(),
                    "content": $("#inputcontent").val(),
                    "status": $("#inputstatus").val(),
                },

                success: function(data) {
                    $('#notify_comment').html('<span>Gửi bình luận thành công</span>');
                    load_comment();
                    $('#notify_comment').fadeOut(2000);
                    $("#inputcontent").val('');
                    $('#comment_show').html(res);
                }

            });
        });
        $(document).on('click', '.cmreply', function(ev) {
            ev.preventDefault();
            var id = $(this).data('id');
            var formreply = '.formreply' + id;

            $('.formReply').slideUp();
            $(formreply).slideDown();
            $('comment_show').show();

        });
        $(document).on('click', '#submitCmtreply', function() {
            var id = $(this).data('id');
            var id_userreply = '#id_userreply' + id;
            var id_comment = '#id_comment' + id;
            var contentreply = '#contentreply' + id;
            var inputstatus = '#inputstatus' + id;
            $.ajax({

                url: "{{route('postCommentReply')}}",
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "userreply_id": $(id_userreply).val(),
                    "comment_id": $(id_comment).val(),
                    "content_reply": $(contentreply).val(),
                    "status": $(inputstatus).val(),
                },

                success: function(data) {

                    load_comment();

                    $('#comment_show').html();
                }

            });
        });
    });
</script>

<script>
    $(document).on('click', '.chapterview', function() {
        var id = $(this).data('id');
        $.ajax({

            url: "{{route('postView')}}",
            method: 'POST',
            data: {
                "_token": '{{csrf_token()}}',
                "chapter_id": id,
                
            },
        });
    });
</script>