<script src="{!! asset('admin/vendors/js/vendor.bundle.base.js ')!!}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
{{-- <script src="{!! asset('admin/vendors/chart.js ')!!}/Chart.min.js ')!!}"></script> --}}
<script src="{{ asset('admin/js/chart.js') }}"></script>
<script src="{!! asset('admin/vendors/datatables.net/jquery.dataTables.js ')!!}"></script>
<script src="{!! asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js ')!!}"></script>
<script src="{!! asset('admin/js/dataTables.select.min.js ')!!}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{!! asset('admin/js/off-canvas.js ')!!}"></script>
<script src="{!! asset('admin/js/hoverable-collapse.js ')!!}"></script>
<script src="{!! asset('admin/js/template.js ')!!}"></script>
<script src="{!! asset('admin/js/settings.js ')!!}"></script>
<script src="{!! asset('admin/js/todolist.js ')!!}"></script>
<!-- endinject -->
<!-- Custom js for this page-->

<script src="{!! asset('admin/js/Chart.roundedBarCharts.js ')!!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- End custom js for this page-->
<script>
    function updateImagePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var coverImage = document.getElementById('comic-cover-image');
                coverImage.src = e.target.result;
                coverImage.style.display = "block";
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<!-- <script>
    $(document).on('click', '.checktype', function(ev) {
        ev.preventDefault();
        var id = $(this).data('id');
        alert(id);
        $.ajax({
            url: "{{route('admin.food.checktype')}}",
            method: 'POST',
            data: {
                "_token": '{{csrf_token()}}',
                "type": id,

            },
            success: function(data) {

                $('#food_show').html(data);
            }

        });

    });
</script> -->