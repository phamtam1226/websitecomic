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
    function Billdetail(e) {
        $.ajax({
            url: "{{ route('kitchen.billdetail') }}",
            type: 'POST',
            data: {
                bill_id: e,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                $("#billdetail").html(data);
            }
        });
    }
</script>
<script>
    function Complete(e) {


        $.ajax({
            url: "{{ route('kitchen.complete') }}",
            type: 'POST',
            data: {
                bill_id: e,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                alert("Đã hoàn thành đơn hàng bàn số " +
                    data);
            }
        });
    }
</script>
<script>
    function Over(e) {


        $.ajax({
            url: "{{ route('kitchen.over') }}",
            type: 'POST',
            data: {
                food_id: e,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {

            }
        });
    }
</script>
<script>
    function Still(e) {


        $.ajax({
            url: "{{ route('kitchen.still') }}",
            type: 'POST',
            data: {
                food_id: e,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {

            }
        });
    }
</script>