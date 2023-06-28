<ul class="d-none">
    <li id="012" class="clearfix" style="display:block">
        {{-- <span class="txt-rank fn-order pos1">01</span> --}}
        <div class="t-item">
            <a class="thumb" href="">
                <img id="img" class=" ls-is-cached lazyloaded" src="" alt="">
            </a>
            <h3 class="title d-flex justify-content-start">
                <a id='name' href="">Until Your Sword Breaks</a>
            </h3>
            <p class="d-flex justify-content-start">
                <a href="">Chapter 1</a>
                {{-- <span class="view pull-right">
                    <i class="fa fa-eye"></i> 127K
                </span> --}}
            </p>
        </div>
    </li>
</ul>
<hr>
<ul id='test'>

</ul>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> 
<script>
    $(window).on('load',async function(){
        var form = document.getElementById ("form");
        var data = new FormData (form);
        var a='';
        await fetch('/list', { method: "POST", body: data })
            .then(res => res.json())
            .then(data => {
                a = data[0];
            })
        var limit = 0;
        for (const e of a) {
            if (limit > 5) {
                break;
            } else {
                await fetch('/gett/'+e.comic_id)
                .then(res => res.json())
                .then(data => {
                    const limit = 0;
                    //console.log(data[0]);
                    $('.d-none #name').text(data[0].comic_name);
                    $('.d-none #img').attr('src','storage'+data[0].cover_image.substring(6))
                    $('.d-none .thumb').attr('href','/details/'+data[0].id)
                    $('#test').append($('.d-none #012').html())
                })
                limit = limit + 1;
            }
            
        }
            
        
    })
    
</script>