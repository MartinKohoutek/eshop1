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

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

					miniCart();
					// console.log(data);
					$('#closeModal').click();

					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						icon: 'success',
						showConfirmButton: false,
						timer: 3000,
					});

					if ($.isEmptyObject(data.error)) {
						Toast.fire({
							type: 'success',
							title: data.success,
						});
					} else {
						Toast.fire({
							type: 'error',
							title: data.error,
						});
					}
				},
				error: function() {

				}
			});
		}

		function miniCart() {
			$.ajax({
				type: 'GET',
				url: '/product/mini/cart',
				dataType: 'json',
				success: function(response) {
					// console.log(response);

					$('#cartQty').text(response.cartQty + " ITEMS");
					$('#cartQty2').text(response.cartQty);
					$('#cartTotal').text("$" + response.cartTotal);

					var miniCart = "";
					$.each(response.carts, function(key, value) {
						miniCart += `                                       
							<a class="dropdown-item" href="javascript:;">
                             	<div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h6 class="cart-product-title">${value.name}</h6>
                                        <p class="cart-product-price">${value.qty} X $${value.price}</p>
                                    </div>
                                    <div class="position-relative">
										<div id="${value.rowId}" onClick="miniCartRemove(this.id)" class="cart-product-cancel position-absolute"><i class='bx bx-x'></i>
                                        </div>
                                        <div class="cart-product">
                                            <img src="/${value.options.image}" class="" alt="product image" style="width: 50px; height: 50px">
                                        </div>
                                    </div>
                                </div>
                            </a>`;
					});;

					$('#miniCart').html(miniCart);
				}
			});
		}

		function miniCartRemove(rowId) {
			$.ajax({
				type: 'GET',
				url: '/minicart/product/remove/' + rowId,
				dataType: 'json',
				success: function(data) {
					miniCart();

					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						icon: 'success',
						showConfirmButton: false,
						timer: 3000,
					});

					if ($.isEmptyObject(data.error)) {
						Toast.fire({
							type: 'success',
							title: data.success,
						});
					} else {
						Toast.fire({
							type: 'error',
							title: data.error,
						});
					}
				}
			});
		}

		function addToCartDetails() {
			var product_name = $('#dpname').text();
			var id = $('#dproduct_id').val();
			var color = $('#dcolor option:selected').text();
			var size = $('#dsize option:selected').text();
			var qty = $('#dqty').val();

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
				url: '/dcart/data/store/' + id,
				success: function(data) {

					miniCart();
					// console.log(data);
					// $('#closeModal').click();

					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						icon: 'success',
						showConfirmButton: false,
						timer: 3000,
					});

					if ($.isEmptyObject(data.error)) {
						Toast.fire({
							type: 'success',
							title: data.success,
						});
					} else {
						Toast.fire({
							type: 'error',
							title: data.error,
						});
					}
				},
				error: function() {

				}
			});
		}

		miniCart();

		function addToWishlist(product_id) {
			console.log(product_id);
			$.ajax({
				type: 'POST',
				url: '/add-to-wishlist/' + product_id,
				dataType: 'json',
				success: function(data) {
					wishlist();
					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						// icon: 'success',
						showConfirmButton: false,
						timer: 3000,
					});

					if ($.isEmptyObject(data.error)) {
						Toast.fire({
							type: 'success',
							icon: 'success',
							title: data.success,
						});
					} else {
						Toast.fire({
							type: 'error',
							icon: 'error',
							title: data.error,
						});
					}
				}
			});
		}

		function wishlist() {
			$.ajax({
				type: 'GET',
				dataType: 'json',
				url: '/get-wishlist-product/',
				success: function(response) {
					$('#wishlistCount').text(response.wishlistCount);

					var rows = "";
					$.each(response.wishlist, function(key, value) {
						rows += `<tr>
									<td class="image product-thumbnail pt-40">
										<img src="/${value.product.product_thumbnail}" alt="#">
									</td>
									<td class="product-des product-name">
										<h6><a href="a.html" class="product-name mb-10">${value.product.product_name}</a></h6>
										<div class="product-rate-cover">
											<div class="product-rate d-inline-block">
												<div class="product-rating" style="width: 90%;"></div>
											</div>
											<span class="font-small ml-5 text-muted"> (4.0)</span>
										</div>
									</td>
									<td class="price" data-title="Price">
									${value.product.discount_price === null 
									? `<h3 class="text-brand">$${value.product.selling_price}</h3>`
									: `<h3 class="text-brand">$${value.product.discount_price}</h3>`}
									</td>
									<td class="text-center detail-info" data-title="Stock">
										<!-- <div class="badge rounded-pill bg-light w-100">Completed</div> -->
										${value.product.product_qty > 0 
										? `<span class="stock-status in-stock mb-0">In Stock</span>`
										: `<span class="stock-status out-stock mb-0">Stock Out</span>`}
									</td>
									<td class="action text-center" data-title="Remove">
										<!-- <div class="d-flex gap-2"> <a href="javascript:;" class="btn btn-light btn-sm rounded-0">View</a>
										</div> -->
										<a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)"><i class='bx bx-trash'></i></a>
									</td>
								</tr>
						`;
					});
					$('#wishlist').html(rows);
				}
			});
		}
		wishlist();

		function wishlistRemove(id) {
			$.ajax({
				type: 'GET',
				url: '/wishlist-remove/' + id,
				dataType: 'json',
				success: function(data) {
					wishlist();

					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						// icon: 'success',
						showConfirmButton: false,
						timer: 3000,
					});

					if ($.isEmptyObject(data.error)) {
						Toast.fire({
							type: 'success',
							icon: 'success',
							title: data.success,
						});
					} else {
						Toast.fire({
							type: 'error',
							icon: 'error',
							title: data.error,
						});
					}
				}
			});
		}
	</script>
</body>

</html>