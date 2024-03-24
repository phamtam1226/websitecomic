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
    function AddOrder(e) {


        $.ajax({
            url: "{{ route('order.addorder') }}",
            type: 'POST',
            data: {
                user_id: $("#user_id").val(),
                board_id: $("#board_id").val(),
                note: $("#note" + e).val(),
                quantity: $("#inputquantity").val(),
                food_id: e,

                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                toastr.success('Đã thêm sản phẩm vào giỏ hàng');
                $(".circle-count").html(data);
            }
        });
    }
</script>



<script>
    function AddBill(e) {

        $.ajax({
            url: "{{ route('order.add_bill') }}",
            type: 'POST',
            data: {
                board_id: e,

                _token: '{{ csrf_token() }}'
            },
            success: function(data) {

            }
        });
    }
</script>

<script>
    function deletefood(e) {

        $.ajax({
            url: "{{ route('order.deletefood') }}",
            type: 'POST',
            data: {
                order_id: e,
                bill_id: $("#bill_id").val(),


                _token: '{{ csrf_token() }}'
            },
            success: function(data) {

            }
        });
    }
</script>
<script>
    function deleteorder(e) {

        $.ajax({
            url: "{{ route('order.deleteorder') }}",
            type: 'POST',
            data: {
                id: e,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {

            }
        });
    }
</script>

<script>
    function RequestPay(e) {
        $.ajax({
            url: "{{ route('order.requestpay') }}",
            type: 'POST',
            data: {
                bill_id: e,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {

            }
        });
    };
</script>
<script>
    function note(id) {



        var formnote = '.formnote' + id;

        $('.formnote').slideUp();
        $(formnote).slideDown();


    };
</script>