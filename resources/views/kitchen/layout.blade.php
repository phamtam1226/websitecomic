<!DOCTYPE html>
<html lang="zxx">
@include('kitchen.header.head')

<body>
	<!-- header -->
	@include('kitchen.header.header')
	<!-- menu -->
	@include('kitchen.header.menu')
	<!-- //header -->
	@yield('content')

	<!--footer -->
	@include('kitchen.footer.footer')
	<!-- //footer -->
	@include('kitchen.footer.foot')
</body>

</html>