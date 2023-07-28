<!doctype html>
<html lang="en">

<head>
	
    <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('frontend/assets/images/favicon-32x32.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('frontend/assets/plugins/OwlCarousel/css/owl.carousel.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/plugins/nouislider/nouislider.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('frontend/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('frontend/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="{{ asset('frontend/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/assets/css/icons.css') }}" rel="stylesheet">
	<title>MKShop - User Dashboard</title>
</head>

<body class="bg-theme bg-theme1">	<b class="screen-overlay"></b>
	<!--wrapper-->
	<div class="wrapper">
		@include('frontend.body.header')
		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('user')
		</div>
		<!--end page wrapper -->
		@include('frontend.body.footer')
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	</div>
	<!--end wrapper-->
    <!-- Bootstrap JS -->
	<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/OwlCarousel/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('frontend/assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	@if (Session::has('message'))
	<script>
		var type = "{{ Session::get('alert-type', 'info') }}";
		switch (type) {
			case 'success': toastr.success("{{ Session::get('message') }}"); break;
			case 'info': toastr.info("{{ Session::get('message') }}"); break;
			case 'warning': toastr.warning("{{ Session::get('message') }}");
			case 'error': toastr.error("{{ Session::get('message') }}"); break;
		}
	</script>
	@endif
</body>

</html>
