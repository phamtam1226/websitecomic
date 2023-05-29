<style>
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 85%;
  bottom: 70px;
  font-size: 17px;
}

.count {
    border-radius: 100%;
    border: 2px solid red;
	background-color: red;
	color: white;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

#addcart {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #26d326;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 85%;
  bottom: 70px;
  font-size: 17px;
}

#addcart.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 70px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 70px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 70px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 70px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

.setting-sidebar {
    position: fixed;
    top: 239px;
    transform: translateY(-50%);
    background-color: #fff;
    width: 40px;
    height: 40px;
    right: 0px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    box-shadow: 0px 0px 5px 0px rgb(154 154 154 / 54%);
    transition: all 0.5s ease;
    z-index: 9;
}

.d-lg-block {
    display: block!important;
	background: #cdc9d8;
}



.miniview-inner .miniview-inner-content {
    position: fixed;
    top: 369px;
    transform: translateY(-50%);
    background-color: #fff;
    width: 250px;
    height: 300px;
    right: 0px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    box-shadow: 0px 0px 5px 0px rgb(154 154 154 / 54%);
    transition: all 0.5s ease;
    z-index: 9;
	opacity: 0;
	visibility: hidden;
}

.miniview-inner-content.show {
    opacity: 1;
    visibility: visible;
}

.miniview-content-box {
    overflow: auto;
    height: 97%;
}



.miniview-inner .miniview-close {
    width: 40px;
    height: 40px;
    text-align: center;
    background-color: #cdc9d8;
    color: #fff;
    font-size: 40px;
    cursor: pointer;
    top: 0;
    right: 250px;
    position: absolute;
	border-radius: 10%;
}
.fa-3x {
  font-size: 3em;
}
.circle-count {
  display: flex;
  border: 3px solid #fff;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  justify-content: center;
  background:red;
  color:white;
  align-items: center;
  box-shadow: 0 1px 10px rgba(255, 0, 0, 0.46);
  margin-right: 60px;
  margin-bottom:16px;
}
</style>
<!-- End Modal -->
<div class="banner-top container-fluid" id="home">
		<!-- header -->
		<header>
			<div class="row">
				<!-- LOGO của trang web -->
				<div class="col-md-3 top-info text-left mt-lg-4">
					<!-- <img width="40%" height="30%" src="{!! asset('user\images\logo_min.png')!!}" class="img-fluid" alt="" > -->
				</div>
				<!-- BANNER của trang web -->
				<div class="col-md-6 logo-w3layouts top-info text-center">
					<h1 class="logo-w3layouts">
						<a class="navbar-brand" href="{{ url('/') }}">
							COMIC </a>
					</h1>
				</div>
				<!--Cá nhân -->
				<div class="col-md-3 text-right mt-lg-4">
        <ul class="cart-inner-info">
           
						<!-- Đăng nhập -->
						<li class="dropdown">
					
							<span class="fa fa-user" aria-hidden="true" style="color: rgb(35, 175, 156);"></span><a href="{{ route('login') }}" class="hover-nut"> Đăng Nhập </a>
						
					
						</li>

            
					</ul>	
          
				</div>
			</div>
      <!--Model-->
      
  
  </div>
</div>

