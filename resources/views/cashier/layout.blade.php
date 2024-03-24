<!DOCTYPE html>
<html lang="zxx">
@include('cashier.header.head')

<body>
	<!-- header -->
	@include('cashier.header.header')
	<!-- menu -->
	@include('cashier.header.menu')
	<!-- //header -->
	@yield('content')

	<!--footer -->
	@include('cashier.footer.footer')
	<!-- //footer -->
	@include('cashier.footer.foot')
</body>

</html>