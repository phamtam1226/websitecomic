<!DOCTYPE html>
<html lang="zxx">
@include('user.header.head')
<body>
	<!-- header -->
	@include('user.header.header')
	<!-- menu -->
	@include('user.header.menu')
	<!-- //header -->
	@yield('content')
	
	<!--footer -->
	@include('user.footer.footer')
	<!-- //footer -->
	@include('user.footer.foot')
</body>

</html>