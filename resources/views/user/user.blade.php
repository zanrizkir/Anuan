<!DOCTYPE html>
<html lang="en">
	<head>
		@include('user.components.topscript')
    </head>
	<body>
		

		<!-- NAVIGATION -->
        @include('user.layouts.components.navbar')
		<!-- /NAVIGATION -->

		@yield('content')

		<!-- FOOTER -->
		@include('user.layouts.components.footer')
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		@include('user.components.bottomscript')
	</body>
</html>
