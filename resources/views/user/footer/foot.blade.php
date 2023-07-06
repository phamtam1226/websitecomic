<script defer src="/your-path-to-fontawesome/js/brands.js"></script>
<script defer src="/your-path-to-fontawesome/js/solid.js"></script>
<script defer src="/your-path-to-fontawesome/js/fontawesome.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!--Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="{!! asset('user/css/slide.js') !!}"></script>

<script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0" nonce="Qm2ykszD"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
                    "user_name": $("#inputuser_name").val(),
                    "user_email": $("#inputuser_email").val(),
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
            var id_user = '#id_user' + id;
            var username = '#inputuser_name' + id;
            var useremail = '#inputuser_email' + id;
            var userreplyname = '#inputuserreply_name' + id;
            var id_comment = '#id_comment' + id;
            var contentreply = '#contentreply' + id;
            var inputstatus = '#inputstatus' + id;
            $.ajax({

                url: "{{route('postCommentReply')}}",
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "user_id": $(id_user).val(),
                    "user_name": $(username).val(),
                    "user_email": $(useremail).val(),
                    "userreply_name": $(userreplyname).val(),
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
        $(document).on('click', '.cmreplyuser', function(ev) {
            ev.preventDefault();
            var id = $(this).data('id');
            var formreplyuser = '.formreplyuser' + id;

            $('.formReplyuser').slideUp();
            $(formreplyuser).slideDown();
            $('comment_show').show();

        });
        $(document).on('click', '#submitCmtreplyuser', function() {
            var id = $(this).data('id');
            var user_id = '#id_users' + id;
            var id_comment = '#id_comments' + id;
            var username = '#inputuser_names' + id;
            var useremail = '#inputuser_emails' + id;
            var userreplyname = '#inputuserreply_names' + id;
            var contentreply = '#contentreplys' + id;
            var inputstatus = '#inputstatuss' + id;
            $.ajax({

                url: "{{route('postCmtReplyuser')}}",
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "user_id": $(user_id).val(),
                    "comment_id": $(id_comment).val(),
                    "user_name": $(username).val(),
                    "user_email": $(useremail).val(),
                    "userreply_name": $(userreplyname).val(),
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
    $(document).on('click', '.chapterhistory', function() {
        var id = $(this).data('id');


        $.ajax({

            url: "{{route('postHistory')}}",
            method: 'POST',
            data: {
                "_token": '{{csrf_token()}}',
                "chapter_id": id,
                "user_id": $("#id_userhistory").val(),


            },
        });
    });
</script>



<script>
    $(document).ready(function() {

        load_history();

        function load_history() {
            $.ajax({
                url: "{{route('loadHistory')}}",
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "user_id": $("#id_userhistory").val(),

                },
                success: function(data) {
                    $('#history_show').html(data);
                }
            });
        }
    });
    $(document).on('click', '.remove', function(ev) {
        ev.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: "{{route('destroyHistory')}}",
            method: 'POST',
            data: {
                "_token": '{{csrf_token()}}',
                "history_id": id,
                "user_id": $("#id_userhistory").val(),
            },
            success: function(data) {

                $('#history_show').html(data);
            }

        });

    });
</script>
<script>
    $(document).ready(function() {


    });
</script>
<script>
    $(document).ready(function() {
        load_coin();

        function load_coin() {
            $.ajax({
                url: "{{route('loadcoin')}}",
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',

                    "user_id": $('#id_usercoin').val(),
                },
                success: function(data) {

                    $('#coin_show').html(data);
                }
            });
        };


        load_chapter();
        var id = $(this).data('id');
        var inputid_chapter = '#inputid_chapter' + id;

        function load_chapter() {
            $.ajax({
                url: "{{route('checkchapter')}}",
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "comic_id": $('#inputid_comic').val(),
                    "user_id": $('#id_userhistory').val(),
                },
                success: function(data) {
                    load_coin();
                    $('#chapter_show').html(data);
                }
            });
        };
        $(document).on('click', '.submitchapter', function() {
            var id = $(this).data('id');
            $.ajax({
                url: "{{route('openchapter')}}",
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "chapter_id": id,
                    "user_id": $("#id_user").val(),
                    "coin": $("#coin").val(),
                },
                success: function(data) {

                    load_coin();
                    load_chapter();
                    alert(data);
                    // $('#chapter_error').;
                    // $('#chapter_error').fadeOut(20000);
                }

            });

        });
    });
</script>
<script>
    $(document).ready(function() {

        load_follow();

        function load_follow() {
            $.ajax({
                url: "{{route('loadfollow')}}",
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "user_id": $("#id_userfollow").val(),

                },
                success: function(data) {
                    $('#follow_show').html(data);
                }
            });
        }
    });
</script>