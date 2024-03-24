<!DOCTYPE html>
<html lang="zxx">
@include('order.header.head')

<body>
	<!-- header -->
	@include('order.header.header')
	<!-- menu -->
	@include('order.header.menu')
	<!-- //header -->
	@yield('content')

	<!--footer -->
	@include('order.footer.footer')
	<!-- //footer -->
	@include('order.footer.foot')
</body>

</html>