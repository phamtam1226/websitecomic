@extends('user.layout')
@section('content')


<!-- Slider truyện đề cử -->

<div class="container-fluid">
    <ul class="breadcrumb bg-white">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang Chủ</a></li>
        <li class="breadcrumb-item " aria-current="page">Toàn Chức Pháp Sư</li>
        <li class="breadcrumb-item active" aria-current="page">Chapter 10</li>
    </ul>
    <div id="tr-menu-fix2">
    <div class="container">
    </div>
  </div>
    <h3 class="title-chapter" itemprop="name">TOÀN CHỨC PHÁP SƯ - Chapter 10</h3>
    <div class="reading-control text-center">
        <form action="/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" id="formToken" method="post"><input name="__RequestVerificationToken" type="hidden" value="eN3VPBjCanBN2pdnd_s2WkANat5bTBHwUuwpK-suCipmVryCbIHLyLsFJtakRiEOOTm7NjnX2i-mU31Lf8EZMqaTjRbcgnRgwz8TIdT4fzI1"></form> <span class="chapter-id hidden" data-cdn="https://baotangtruyengo.com" data-cdn2="" data-suffix=""></span>
        <button type="button" class="btn btn-warning" id="chapter_error" style="display: inline-block;" onclick="ErrorSubmit()"><span class="mdi mdi-information-outline"></span> Báo lỗi chương</button>

        <div class="chapter-nav" id="chapter-nav" style="z-index: 1000;">
            <a class="home" href="https://baotangtruyengo.com" title="Trang chủ"><i class="fa fa-home"></i></a>
            <a class="home backward" href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su-229#nt_listchapter" title="TOÀN CHỨC PHÁP SƯ"><i class="fa fa-list"></i></a>
            <a class="home changeserver" href="javascript:;" title="Đổi server"><i class="fa fa-undo error"></i><span>1</span></a>
            <a id="prevChapter" href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1034/780545" class="prev a_prev"><i class="fa fa-angle-left"></i></a>
            <select name="ctl00$mainContent$ddlSelectChapter" class="select-chapter ctl00_mainContent_ddlSelectChapter">
                <option value="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1037/783051">Chapter 12</option>
                <option value="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611">Chapter 11</option>
                <option selected="" value="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826">Chapter 10</option>
                <option value="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-9/13538">Chapter 9</option>
                <option value="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-8/13537">Chapter 8</option>
                <option value="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-7/13536">Chapter 7</option>
                <option value="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-6/13535">Chapter 6</option>
                <option value="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-5/13534">Chapter 5</option>
                <option value="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-4/13532">Chapter 4</option>
                <option value="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-3/13531">Chapter 3</option>
                <option value="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-2/13530">Chapter 2</option>
                <option value="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1/13529">Chapter 1</option>
                
            </select>
            <a id="nextChapter" href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1036/782611" class="next a_next"><i class="fa fa-angle-right"></i></a>
            <a class="follow-link btn btn-success" href="javascript:void(0)" data-id="229" onclick="story.FollowStory('229')"><i class="fa fa-heart"></i> <span>Theo dõi</span></a>
        </div>
    </div>


    <div class="reading-control" style="height: auto !important;">

        <ins class="adsbygoogle" style="display: block; height: 280px;" data-ad-client="ca-pub-3591848586350978" data-ad-slot="3117028099" data-ad-format="auto" data-full-width-responsive="true" data-adsbygoogle-status="done">
            <div id="aswift_1_host" tabindex="0" title="Advertisement" aria-label="Advertisement" style="border: none; height: 280px; width: 1010px; margin: 0px; padding: 0px; position: relative; visibility: visible; background-color: transparent; display: inline-block; overflow: visible;"><iframe id="aswift_1" name="aswift_1" style="left:0;position:absolute;top:0;border:0;width:1010px;height:280px;" sandbox="allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation" width="1010" height="280" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allow="attribution-reporting" src="https://googleads.g.doubleclick.net/pagead/ads?client=ca-pub-3591848586350978&amp;output=html&amp;h=280&amp;slotname=3117028099&amp;adk=2606179060&amp;adf=3767957398&amp;pi=t.ma~as.3117028099&amp;w=1010&amp;fwrn=4&amp;fwrnh=100&amp;lmt=1685113017&amp;rafmt=1&amp;format=1010x280&amp;url=https%3A%2F%2Fbaotangtruyengo.com%2Ftruyen-tranh%2Ftoan-chuc-phap-su%2Fchapter-1035%2F781826&amp;fwr=0&amp;fwrattr=true&amp;rpe=1&amp;resp_fmts=3&amp;wgl=1&amp;uach=WyJXaW5kb3dzIiwiMTUuMC4wIiwieDg2IiwiIiwiMTEzLjAuNTY3Mi4xMjciLFtdLDAsbnVsbCwiNjQiLFtbIkdvb2dsZSBDaHJvbWUiLCIxMTMuMC41NjcyLjEyNyJdLFsiQ2hyb21pdW0iLCIxMTMuMC41NjcyLjEyNyJdLFsiTm90LUEuQnJhbmQiLCIyNC4wLjAuMCJdXSwwXQ..&amp;dt=1685272247787&amp;bpp=2&amp;bdt=3680&amp;idt=205&amp;shv=r20230523&amp;mjsv=m202305230101&amp;ptt=9&amp;saldr=aa&amp;abxe=1&amp;cookie=ID%3D773acd14b35f187b-222359eab2e000a7%3AT%3D1684936030%3ART%3D1685271766%3AS%3DALNI_MYvy1_aVm_8-Jv-luaNHEAJVrkgcg&amp;gpic=UID%3D00000c0a35854e88%3AT%3D1684936030%3ART%3D1685271766%3AS%3DALNI_MbPZq2N8new8HLBUSdZ4t-j8sa4qA&amp;correlator=3659675915845&amp;frm=20&amp;pv=2&amp;ga_vid=1304014450.1684936028&amp;ga_sid=1685272248&amp;ga_hid=584355277&amp;ga_fc=1&amp;u_tz=420&amp;u_his=5&amp;u_h=864&amp;u_w=1536&amp;u_ah=816&amp;u_aw=1536&amp;u_cd=24&amp;u_sd=1.125&amp;dmc=8&amp;adx=339&amp;ady=356&amp;biw=1688&amp;bih=372&amp;scr_x=0&amp;scr_y=0&amp;eid=44759875%2C44759926%2C44759842%2C31074822%2C42531706%2C44788441%2C44790154%2C44788469%2C31067146%2C31067147%2C31067148%2C31068556%2C44776501&amp;oid=2&amp;pvsid=963559395932544&amp;tmod=375849155&amp;uas=0&amp;nvt=1&amp;topics=ARTwLgIEPiT7jcGVoquCQr7AbaG27D6Ne27AooaU0ZbioD-54UX_mFtQ4aPflr_E6VAwLPhdkMUJL1-n5kBVnjcKnAo4GgMtz1dEvyBLeWASXAo6CfTQq-ab7z_LggN4aRuB2ieIkEZq3aZyE3Ml9TILeWub9ploNLXJQjR0STAjxaG1Rxmux0jTn68nBXt2HwVDpKTVIc5G1TfUkcUs&amp;ref=https%3A%2F%2Fbaotangtruyengo.com%2Ftruyen-tranh%2Ftoan-chuc-phap-su%2Fchapter-1036%2F782611&amp;fc=1920&amp;brdim=0%2C0%2C0%2C0%2C1536%2C0%2C1536%2C816%2C1707%2C372&amp;vis=1&amp;rsz=%7C%7CoeE%7C&amp;abl=CS&amp;pfx=0&amp;fu=128&amp;bc=31&amp;td=1&amp;nt=1&amp;ifi=2&amp;uci=a!2&amp;fsb=1&amp;xpc=A3pqAnsBy7&amp;p=https%3A//baotangtruyengo.com&amp;dtd=233" data-google-container-id="a!2"></iframe></div>
        </ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <ins class="adsbygoogle" style="display: block; height: 280px;" data-ad-client="ca-pub-3591848586350978" data-ad-slot="3117028099" data-ad-format="auto" data-full-width-responsive="true" data-adsbygoogle-status="done">
            <div id="aswift_2_host" tabindex="0" title="Advertisement" aria-label="Advertisement" style="border: none; height: 280px; width: 1010px; margin: 0px; padding: 0px; position: relative; visibility: visible; background-color: transparent; display: inline-block; overflow: visible;"><iframe id="aswift_2" name="aswift_2" style="left:0;position:absolute;top:0;border:0;width:1010px;height:280px;" sandbox="allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation" width="1010" height="280" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allow="attribution-reporting" src="https://googleads.g.doubleclick.net/pagead/ads?client=ca-pub-3591848586350978&amp;output=html&amp;h=280&amp;slotname=3117028099&amp;adk=2606179060&amp;adf=2411509132&amp;pi=t.ma~as.3117028099&amp;w=1010&amp;fwrn=4&amp;fwrnh=100&amp;lmt=1685113017&amp;rafmt=1&amp;format=1010x280&amp;url=https%3A%2F%2Fbaotangtruyengo.com%2Ftruyen-tranh%2Ftoan-chuc-phap-su%2Fchapter-1035%2F781826&amp;fwr=0&amp;fwrattr=true&amp;rpe=1&amp;resp_fmts=3&amp;wgl=1&amp;uach=WyJXaW5kb3dzIiwiMTUuMC4wIiwieDg2IiwiIiwiMTEzLjAuNTY3Mi4xMjciLFtdLDAsbnVsbCwiNjQiLFtbIkdvb2dsZSBDaHJvbWUiLCIxMTMuMC41NjcyLjEyNyJdLFsiQ2hyb21pdW0iLCIxMTMuMC41NjcyLjEyNyJdLFsiTm90LUEuQnJhbmQiLCIyNC4wLjAuMCJdXSwwXQ..&amp;dt=1685272247789&amp;bpp=2&amp;bdt=3682&amp;idt=254&amp;shv=r20230523&amp;mjsv=m202305230101&amp;ptt=9&amp;saldr=aa&amp;abxe=1&amp;cookie=ID%3D773acd14b35f187b-222359eab2e000a7%3AT%3D1684936030%3ART%3D1685271766%3AS%3DALNI_MYvy1_aVm_8-Jv-luaNHEAJVrkgcg&amp;gpic=UID%3D00000c0a35854e88%3AT%3D1684936030%3ART%3D1685271766%3AS%3DALNI_MbPZq2N8new8HLBUSdZ4t-j8sa4qA&amp;prev_fmts=1010x280&amp;correlator=3659675915845&amp;frm=20&amp;pv=1&amp;ga_vid=1304014450.1684936028&amp;ga_sid=1685272248&amp;ga_hid=584355277&amp;ga_fc=1&amp;u_tz=420&amp;u_his=5&amp;u_h=864&amp;u_w=1536&amp;u_ah=816&amp;u_aw=1536&amp;u_cd=24&amp;u_sd=1.125&amp;dmc=8&amp;adx=339&amp;ady=636&amp;biw=1688&amp;bih=372&amp;scr_x=0&amp;scr_y=0&amp;eid=44759875%2C44759926%2C44759842%2C31074822%2C42531706%2C44788441%2C44790154%2C44788469%2C31067146%2C31067147%2C31067148%2C31068556%2C44776501&amp;oid=2&amp;pvsid=963559395932544&amp;tmod=375849155&amp;uas=0&amp;nvt=1&amp;topics=ARTwLgIEPiT7jcGVoquCQr7AbaG27D6Ne27AooaU0ZbioD-54UX_mFtQ4aPflr_E6VAwLPhdkMUJL1-n5kBVnjcKnAo4GgMtz1dEvyBLeWASXAo6CfTQq-ab7z_LggN4aRuB2ieIkEZq3aZyE3Ml9TILeWub9ploNLXJQjR0STAjxaG1Rxmux0jTn68nBXt2HwVDpKTVIc5G1TfUkcUs&amp;ref=https%3A%2F%2Fbaotangtruyengo.com%2Ftruyen-tranh%2Ftoan-chuc-phap-su%2Fchapter-1036%2F782611&amp;fc=1920&amp;brdim=0%2C0%2C0%2C0%2C1536%2C0%2C1536%2C816%2C1707%2C372&amp;vis=1&amp;rsz=%7C%7CoeEbr%7C&amp;abl=CS&amp;pfx=0&amp;fu=128&amp;bc=31&amp;td=1&amp;nt=1&amp;ifi=3&amp;uci=a!3&amp;btvi=1&amp;fsb=1&amp;xpc=LNdieTimFl&amp;p=https%3A//baotangtruyengo.com&amp;dtd=271" data-google-container-id="a!3"></iframe></div>
        </ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <div class="reading-detail box_doc text-center">
        <div id="page_0" class="page-chapter">
            <img class=" ls-is-cached lazyloaded" src="https://img.baotangtruyenvip.com/Upload02/Content/images/chapter/top.jpg" style="width:700px;aspect-ratio:1.5">
            <img class=" ls-is-cached lazyloaded" alt="TOÀN CHỨC PHÁP SƯ Chapter 1035 - Trang 0" data-index="0" src="https://img.baotangtruyenvip.com/Upload02/ImageContent/API/20230522/229/b98cbde1-e14a-497a-9ebd-9d8918de240b-201380.png">
        </div>
        
        <div id="page_1" class="page-chapter">
            <img class=" lazyloading" alt="TOÀN CHỨC PHÁP SƯ Chapter 1035 - Trang 1" data-index="1" src="https://img.baotangtruyenvip.com/Upload02/ImageContent/API/20230522/229/ea33b194-e0b1-4e8b-952a-5d2031c9f8b5-524304.png">
        </div>
        <div id="page_2" class="page-chapter">
            <img class="lazyload" alt="TOÀN CHỨC PHÁP SƯ Chapter 1035 - Trang 2" data-index="2" src="https://img.baotangtruyenvip.com/Upload02/ImageContent/API/20230522/229/f3b6b10e-f6d0-498e-aa83-b545c99065ff-699970.png">
        </div>
        <div id="page_3" class="page-chapter">
            <img class="lazyload" alt="TOÀN CHỨC PHÁP SƯ Chapter 1035 - Trang 3" data-index="3" src="https://img.baotangtruyenvip.com/Upload02/ImageContent/API/20230522/229/4baf8cf9-54dc-42b5-ac53-29efda2f3609-122895.png">
        </div>
        <div id="page_4" class="page-chapter">
            <img class="lazyload" alt="TOÀN CHỨC PHÁP SƯ Chapter 1035 - Trang 4" data-index="4" src="https://img.baotangtruyenvip.com/Upload02/ImageContent/API/20230522/229/f078071d-c711-45e4-8118-7646563ec3b8-298561.png">
        </div>
        <div id="page_5" class="page-chapter">
            <img class="lazyload" alt="TOÀN CHỨC PHÁP SƯ Chapter 1035 - Trang 5" data-index="5" src="https://img.baotangtruyenvip.com/Upload02/ImageContent/API/20230522/229/d58cb2d3-c501-4321-bc59-60050008cd26-151303.png">
        </div>
        <div id="page_6" class="page-chapter">
            <img class="lazyload" alt="TOÀN CHỨC PHÁP SƯ Chapter 1035 - Trang 6" data-index="6" src="https://img.baotangtruyenvip.com/Upload02/ImageContent/API/20230522/229/572a2493-42c6-4a4e-91d4-ffce5097c2c7-151303.png">
        </div>
        <div id="page_7" class="page-chapter">
            <img class="lazyload" alt="TOÀN CHỨC PHÁP SƯ Chapter 1035 - Trang 7" data-index="7" src="https://img.baotangtruyenvip.com/Upload02/ImageContent/API/20230522/229/9907989e-0dc2-46d5-96e2-27593d3438c7-474227.png">
        </div>
        <div id="page_8" class="page-chapter">
            <img class="lazyload" alt="TOÀN CHỨC PHÁP SƯ Chapter 1035 - Trang 8" data-index="8" src="https://img.baotangtruyenvip.com/Upload02/ImageContent/API/20230522/229/dee36c40-e8b7-497f-9252-33636831da5c-797152.png">
        </div>
        <div id="page_9" class="page-chapter">
            <img class="lazyload" alt="TOÀN CHỨC PHÁP SƯ Chapter 1035 - Trang 9" data-index="9" src="https://img.baotangtruyenvip.com/Upload02/ImageContent/API/20230522/229/09975f6d-393a-4596-a256-18a38abf1170-649894.png">
        </div>
        <div id="page_10" class="page-chapter">
            <img class="lazyload" alt="TOÀN CHỨC PHÁP SƯ Chapter 1035 - Trang 10" data-index="10" src="https://img.baotangtruyenvip.com/Upload02/ImageContent/API/20230522/229/6ffdd489-7beb-46a8-98ab-8487243e7ea5-972818.png">
        </div>
        <div id="page_11" class="page-chapter">
            <img class="lazyload" alt="TOÀN CHỨC PHÁP SƯ Chapter 1035 - Trang 11" data-index="11" src="https://img.baotangtruyenvip.com/Upload02/ImageContent/API/20230522/229/5813724f-8fa1-4635-bafc-bec8a047dc90-395743.png">
            <img class="lazyload" src="https://img.baotangtruyenvip.com/Upload02/Content/images/chapter/top.jpg" style="width:700px;aspect-ratio:1.5">
        </div>
    </div>
    <div class="reading-control" style="height: auto !important;">

        <ins class="adsbygoogle" style="display: block; height: 280px;" data-ad-client="ca-pub-3591848586350978" data-ad-slot="3117028099" data-ad-format="auto" data-full-width-responsive="true" data-adsbygoogle-status="done">
            <div id="aswift_1_host" tabindex="0" title="Advertisement" aria-label="Advertisement" style="border: none; height: 280px; width: 1010px; margin: 0px; padding: 0px; position: relative; visibility: visible; background-color: transparent; display: inline-block; overflow: visible;"><iframe id="aswift_1" name="aswift_1" style="left:0;position:absolute;top:0;border:0;width:1010px;height:280px;" sandbox="allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation" width="1010" height="280" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allow="attribution-reporting" src="https://googleads.g.doubleclick.net/pagead/ads?client=ca-pub-3591848586350978&amp;output=html&amp;h=280&amp;slotname=3117028099&amp;adk=2606179060&amp;adf=3767957398&amp;pi=t.ma~as.3117028099&amp;w=1010&amp;fwrn=4&amp;fwrnh=100&amp;lmt=1685113017&amp;rafmt=1&amp;format=1010x280&amp;url=https%3A%2F%2Fbaotangtruyengo.com%2Ftruyen-tranh%2Ftoan-chuc-phap-su%2Fchapter-1035%2F781826&amp;fwr=0&amp;fwrattr=true&amp;rpe=1&amp;resp_fmts=3&amp;wgl=1&amp;uach=WyJXaW5kb3dzIiwiMTUuMC4wIiwieDg2IiwiIiwiMTEzLjAuNTY3Mi4xMjciLFtdLDAsbnVsbCwiNjQiLFtbIkdvb2dsZSBDaHJvbWUiLCIxMTMuMC41NjcyLjEyNyJdLFsiQ2hyb21pdW0iLCIxMTMuMC41NjcyLjEyNyJdLFsiTm90LUEuQnJhbmQiLCIyNC4wLjAuMCJdXSwwXQ..&amp;dt=1685272247787&amp;bpp=2&amp;bdt=3680&amp;idt=205&amp;shv=r20230523&amp;mjsv=m202305230101&amp;ptt=9&amp;saldr=aa&amp;abxe=1&amp;cookie=ID%3D773acd14b35f187b-222359eab2e000a7%3AT%3D1684936030%3ART%3D1685271766%3AS%3DALNI_MYvy1_aVm_8-Jv-luaNHEAJVrkgcg&amp;gpic=UID%3D00000c0a35854e88%3AT%3D1684936030%3ART%3D1685271766%3AS%3DALNI_MbPZq2N8new8HLBUSdZ4t-j8sa4qA&amp;correlator=3659675915845&amp;frm=20&amp;pv=2&amp;ga_vid=1304014450.1684936028&amp;ga_sid=1685272248&amp;ga_hid=584355277&amp;ga_fc=1&amp;u_tz=420&amp;u_his=5&amp;u_h=864&amp;u_w=1536&amp;u_ah=816&amp;u_aw=1536&amp;u_cd=24&amp;u_sd=1.125&amp;dmc=8&amp;adx=339&amp;ady=356&amp;biw=1688&amp;bih=372&amp;scr_x=0&amp;scr_y=0&amp;eid=44759875%2C44759926%2C44759842%2C31074822%2C42531706%2C44788441%2C44790154%2C44788469%2C31067146%2C31067147%2C31067148%2C31068556%2C44776501&amp;oid=2&amp;pvsid=963559395932544&amp;tmod=375849155&amp;uas=0&amp;nvt=1&amp;topics=ARTwLgIEPiT7jcGVoquCQr7AbaG27D6Ne27AooaU0ZbioD-54UX_mFtQ4aPflr_E6VAwLPhdkMUJL1-n5kBVnjcKnAo4GgMtz1dEvyBLeWASXAo6CfTQq-ab7z_LggN4aRuB2ieIkEZq3aZyE3Ml9TILeWub9ploNLXJQjR0STAjxaG1Rxmux0jTn68nBXt2HwVDpKTVIc5G1TfUkcUs&amp;ref=https%3A%2F%2Fbaotangtruyengo.com%2Ftruyen-tranh%2Ftoan-chuc-phap-su%2Fchapter-1036%2F782611&amp;fc=1920&amp;brdim=0%2C0%2C0%2C0%2C1536%2C0%2C1536%2C816%2C1707%2C372&amp;vis=1&amp;rsz=%7C%7CoeE%7C&amp;abl=CS&amp;pfx=0&amp;fu=128&amp;bc=31&amp;td=1&amp;nt=1&amp;ifi=2&amp;uci=a!2&amp;fsb=1&amp;xpc=A3pqAnsBy7&amp;p=https%3A//baotangtruyengo.com&amp;dtd=233" data-google-container-id="a!2"></iframe></div>
        </ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <ins class="adsbygoogle" style="display: block; height: 280px;" data-ad-client="ca-pub-3591848586350978" data-ad-slot="3117028099" data-ad-format="auto" data-full-width-responsive="true" data-adsbygoogle-status="done">
            <div id="aswift_2_host" tabindex="0" title="Advertisement" aria-label="Advertisement" style="border: none; height: 280px; width: 1010px; margin: 0px; padding: 0px; position: relative; visibility: visible; background-color: transparent; display: inline-block; overflow: visible;"><iframe id="aswift_2" name="aswift_2" style="left:0;position:absolute;top:0;border:0;width:1010px;height:280px;" sandbox="allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation" width="1010" height="280" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allow="attribution-reporting" src="https://googleads.g.doubleclick.net/pagead/ads?client=ca-pub-3591848586350978&amp;output=html&amp;h=280&amp;slotname=3117028099&amp;adk=2606179060&amp;adf=2411509132&amp;pi=t.ma~as.3117028099&amp;w=1010&amp;fwrn=4&amp;fwrnh=100&amp;lmt=1685113017&amp;rafmt=1&amp;format=1010x280&amp;url=https%3A%2F%2Fbaotangtruyengo.com%2Ftruyen-tranh%2Ftoan-chuc-phap-su%2Fchapter-1035%2F781826&amp;fwr=0&amp;fwrattr=true&amp;rpe=1&amp;resp_fmts=3&amp;wgl=1&amp;uach=WyJXaW5kb3dzIiwiMTUuMC4wIiwieDg2IiwiIiwiMTEzLjAuNTY3Mi4xMjciLFtdLDAsbnVsbCwiNjQiLFtbIkdvb2dsZSBDaHJvbWUiLCIxMTMuMC41NjcyLjEyNyJdLFsiQ2hyb21pdW0iLCIxMTMuMC41NjcyLjEyNyJdLFsiTm90LUEuQnJhbmQiLCIyNC4wLjAuMCJdXSwwXQ..&amp;dt=1685272247789&amp;bpp=2&amp;bdt=3682&amp;idt=254&amp;shv=r20230523&amp;mjsv=m202305230101&amp;ptt=9&amp;saldr=aa&amp;abxe=1&amp;cookie=ID%3D773acd14b35f187b-222359eab2e000a7%3AT%3D1684936030%3ART%3D1685271766%3AS%3DALNI_MYvy1_aVm_8-Jv-luaNHEAJVrkgcg&amp;gpic=UID%3D00000c0a35854e88%3AT%3D1684936030%3ART%3D1685271766%3AS%3DALNI_MbPZq2N8new8HLBUSdZ4t-j8sa4qA&amp;prev_fmts=1010x280&amp;correlator=3659675915845&amp;frm=20&amp;pv=1&amp;ga_vid=1304014450.1684936028&amp;ga_sid=1685272248&amp;ga_hid=584355277&amp;ga_fc=1&amp;u_tz=420&amp;u_his=5&amp;u_h=864&amp;u_w=1536&amp;u_ah=816&amp;u_aw=1536&amp;u_cd=24&amp;u_sd=1.125&amp;dmc=8&amp;adx=339&amp;ady=636&amp;biw=1688&amp;bih=372&amp;scr_x=0&amp;scr_y=0&amp;eid=44759875%2C44759926%2C44759842%2C31074822%2C42531706%2C44788441%2C44790154%2C44788469%2C31067146%2C31067147%2C31067148%2C31068556%2C44776501&amp;oid=2&amp;pvsid=963559395932544&amp;tmod=375849155&amp;uas=0&amp;nvt=1&amp;topics=ARTwLgIEPiT7jcGVoquCQr7AbaG27D6Ne27AooaU0ZbioD-54UX_mFtQ4aPflr_E6VAwLPhdkMUJL1-n5kBVnjcKnAo4GgMtz1dEvyBLeWASXAo6CfTQq-ab7z_LggN4aRuB2ieIkEZq3aZyE3Ml9TILeWub9ploNLXJQjR0STAjxaG1Rxmux0jTn68nBXt2HwVDpKTVIc5G1TfUkcUs&amp;ref=https%3A%2F%2Fbaotangtruyengo.com%2Ftruyen-tranh%2Ftoan-chuc-phap-su%2Fchapter-1036%2F782611&amp;fc=1920&amp;brdim=0%2C0%2C0%2C0%2C1536%2C0%2C1536%2C816%2C1707%2C372&amp;vis=1&amp;rsz=%7C%7CoeEbr%7C&amp;abl=CS&amp;pfx=0&amp;fu=128&amp;bc=31&amp;td=1&amp;nt=1&amp;ifi=3&amp;uci=a!3&amp;btvi=1&amp;fsb=1&amp;xpc=LNdieTimFl&amp;p=https%3A//baotangtruyengo.com&amp;dtd=271" data-google-container-id="a!3"></iframe></div>
        </ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <div class="top bottom">
        <div class="chapter-nav-bottom" style="margin:5px 0;text-align:center">
            <div class="chapter-nav-bottom text-center mrt5 mrb5">
                <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1035/781826" class="btn btn-danger prev"><em>&lt;</em> Chap trước</a>
                <a href="https://baotangtruyengo.com/truyen-tranh/toan-chuc-phap-su/chapter-1037/783051" class="btn btn-danger next">Chap sau <em>&gt;</em></a>
            </div>
        </div>
    </div>


    <!-- bình luận -->
    <div class="comment-detail">
        <ul class="nav nav-tabs lazy-module" id="nav-lick">
            <li class="active" data-id="1">
                <a href="javascript:;">
                    <i class="fa fa-comments"></i> Tổng bình luận (<span class="comment-count">15</span>)
                </a>
            </li>
        </ul>
        <div class="tab-content">



        </div>
        <div class="journalrow" id="jid-32956">
            <div class="author">
                <img alt="Author" src="https://img.baotangtruyenvip.com/Content/Images/avata.png" onerror="this.onerror=null;this.src='https://img.baotangtruyenvip.com/upload02/content/images/avata.png';">
                <span class="cmreply" onclick="addreplyclick(this)" id="cmtbtn-32956">Trả lời</span>
            </div>
            <div class="journalitem">
                <div class="journalsummary">

                    <span class="authorname">Bee</span>
                    <span class="member">Thành viên</span>
                    <abbr title="7/7/2022 1:04:18 AM">
                        <i class="fa fa-clock-o"></i> 10 tháng trước
                    </abbr>
                    <span class="cmchapter">Chapter 7</span>
                    <span onclick="journalReport(this);" class="cmreport" id="report-32956">Báo vi phạm</span>
                    <div class="summary">Má chap này bùn ghê tự nhiên 2 người này die lun<img src="http://4.bp.blogspot.com/_1Jw2fzSntT0/TZDLE6-U1TI/AAAAAAAABQw/_34TK1gvp-A/w1600/019.gif" alt="emo">&nbsp;mé cay tác giả quáaaa</div>
                </div>
            </div>
            <ul class="jcmt" id="jcmt-32999">

                <li id="cmt-34431">
                    <img alt="Author" src="https://baotangtruyengo.com/content/images/avata.png" onerror="this.onerror=null;this.src='https://img.baotangtruyenvip.com/upload02/content/images/avata.png';">
                    <div class="jsummary">
                        <i class="fa fa-angle-up"></i>
                        <span class="authorname">Ri đỗ</span>
                        <span class="member">Thành viên</span>
                        <abbr title="7/17/2022 7:10:43 PM">
                            <i class="fa fa-clock-o"></i> 10 tháng trước
                        </abbr>
                        <span onclick="journalReport(this);" class="cmreport" id="report-34431">Báo vi phạm</span>
                        <div class="summary">sao pháp sư trong chuyện này ko bá như mấy pháp sư trong truyện khác nhờ</div>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</div>
<br>
@stop