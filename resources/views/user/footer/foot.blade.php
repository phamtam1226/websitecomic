

<script defer src="/your-path-to-fontawesome/js/brands.js"></script>
<script defer src="/your-path-to-fontawesome/js/solid.js"></script>
<script defer src="/your-path-to-fontawesome/js/fontawesome.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!--Jquery -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

<script type="text/javascript" src="{!! asset('user/css/slide.js') !!}"></script>

<script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>

<script>
	function redirectToChapter(chapterId) {
		var redirectUrl = "{{ route('chapter.details', ['chapterId' => ':chapterId']) }}";
		redirectUrl = redirectUrl.replace(':chapterId', chapterId);
		window.location.href = redirectUrl;
	}
</script>

<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        items:6,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true
    })
  
    
</script>
