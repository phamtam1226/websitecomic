@include('user.header.head')

{{-- <form class="hidden" id="FORM" enctype="multipart/form-data">
    @csrf
    <input style="display: none" name='comic_id' type="text" value="{{ $comic->id }}">
    <input style="display: none" name='user_id' type="text" value="{{ $user_id }}">
    <input style="display: none" name='chapter' type="text" value="1">
</form> --}}

<a class="follow-link btn btn-success d-none" id="123"><i class="fa fa-heart"></i> <span>Theo dõi</span></a>

<a class="follow-link btn btn-danger d-none" id="456"><i class="fa fa-heart"></i> <span>Bỏ theo dõi</span></a>



<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> 
<script>
    $(window).on('load',async function(){
        var form = document.getElementById ("FORM");
        var data = new FormData (form);
        var a='';
        await fetch('/check', { method: "POST", body: data })
            .then(res => res.json())
            .then(data => {
                a = data;
            })
        console.log('load');
        if (a!='') {
            //console.log('show follow');
            var element = document.getElementById("456");
            element.classList.remove("d-none");
        } else {
            //console.log('show unfollow');
            var element = document.getElementById("123");
            element.classList.remove("d-none");
        }        
    })
    
    
    //Theo dõi
    $('#123').on('click',function () {
        //var btn = document.getElementById('123');
        var form = document.getElementById ("FORM");
        var data = new FormData (form);
        try {
            fetch ("/theodoi", { method: "POST", body: data })
            .then(res => $("#123, #456").toggleClass('d-none'));
            $('#f_count').load(location.href + ' #f_count');
        } catch (error) {
            alert("Có lỗi xảy ra, thử lại sau!")
        }
    })

    //Bỏ theo dõi
    $('#456').on('click',function () {
        var form = document.getElementById ("FORM");
        var data = new FormData (form);
        try {
            fetch ("/botheodoi", { method: "POST", body: data })
            .then(res => $("#123, #456").toggleClass('d-none'));
            $('#f_count').load(location.href + ' #f_count');
        } catch (error) {
            alert("Có lỗi xảy ra, thử lại sau!")
        }
        
    })
    
    
</script>