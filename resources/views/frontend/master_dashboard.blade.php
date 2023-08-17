<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="icon" href="{{ asset('frontend/assets/images/favicon-32x32.png') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('frontend/assets/plugins/OwlCarousel/css/owl.carousel.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('frontend/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('frontend/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('frontend/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/assets/css/icons.css') }}" rel="stylesheet">
	<title>MKShop - Home</title>
</head>

<body class="bg-theme bg-theme1"> <b class="screen-overlay"></b>
	<!--wrapper-->
	<div class="wrapper">
		@include('frontend.body.discount')
		@include('frontend.body.header')

		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('home')
		</div>
		<!--end page wrapper -->
		@include('frontend.body.footer')
		@include('frontend.body.quickview')
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
	<script src="{{ asset('frontend/assets/js/index.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/product-details.js') }}"></script>

	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			}
		});

		// Modal View
		function productView(id) {
			// alert(id);
			$.ajax({
				type: 'GET',
				url: '/product/view/modal/' + id,
				dataType: 'json',
				success: function(data) {
					console.log(data);
					$('#pname').text(data.product.product_name);
					$('#pprice').text(data.product.selling_price);
					$('#pcode').text(data.product.product_code);
					$('#pcategory').text(data.product.category.category_name);
					$('#pbrand').text(data.product.brand.brand_name);
					// $('#pimage').attr('src', '/' + data.product.product_thumbnail);
					if (data.product.discount_price == null) {
						$('#newprice').text('');
						$('#oldprice').text('');
						$('#newprice').text('$' + data.product.selling_price)
					} else {
						$('#newprice').text('$' + data.product.discount_price);
						$('#oldprice').text('$' + data.product.selling_price);
					}

					if (data.product.product_qty > 0) {
						$('#available').text('');
						$('#stockout').text('');
						$('#available').text('available');
					} else {
						$('#available').text('');
						$('#stockout').text('');
						$('#stockout').text('stockout');
					}

					$('select[name="size"]').empty();
					$.each(data.size, function(key, value) {
						$('select[name="size"]').append('<option value="' + value + '">' + value + '</option>');
						if (data.size == "") {
							$('#sizeArea').hide();
						} else {
							$('#sizeArea').show();
						}
					});

					$('select[name="color"]').empty();
					$.each(data.color, function(key, value) {
						$('select[name="color"]').append('<option value="' + value + '">' + value + '</option>');
						if (data.color == "") {
							$('#colorArea').hide();
						} else {
							$('#colorArea').show();
						}
					});

					$('#product_id').val(id);
					$('#qty').val(1);

					$('#imgArea').empty();
					$.each(data.images, function(key, value) {
						console.log('val: ' + value.photo_name);
						$('#imgArea').append('<button class="owl-thumb-item"><img src="' + value.photo_name + '" class="" alt=""></button>');
						if (data.images == "") {
							$('#imgArea').hide();
						} else {
							$('#imgArea').show();
						}
					});

					$('#bigImg').empty();
					$.each(data.images, function(key, value) {
						// console.log('val: ' + value.photo_name);

						$('#bigImg').append('<div class="item"><img src="' + value.photo_name + '" class="img-fluid" alt=""></div>');
						if (data.images == "") {
							$('#bigImg').hide();
						} else {
							$('#bigImg').show();
						}
					});

					console.log($('#bigImg'));
					$(".owl-carousel").owlCarousel({
						center: true,
						loop: true,
						autoplay: true,
						autoplayTimeout: 1000,
						autoplayHoverPause: true
					});
				}
			})
		}

		function addToCart() {
			var product_name = $('#pname').text();
			var id = $('#product_id').val();
			var color = $('#color option:selected').text();
			var size = $('#size option:selected').text();
			var qty = $('#qty').val();

			console.log(product_name);
			console.log(id);
			console.log(color);
			console.log(size);
			console.log(qty);

			$.ajax({
				type: 'POST',
				dataType: 'json',
				data: {
					color: color,
					size: size,
					qty: qty,
					product_name: product_name,
				},
				url: '/cart/data/store/' + id,
				success: function(data) {
					console.log(data);
				},
				error: function() {
					
				}
			});
		}
	</script>
</body>

</html>