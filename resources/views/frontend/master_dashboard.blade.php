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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style>
	.table-responsive {
		white-space: normal;
	}
</style>
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
					$('.pwish').attr('id', data.product.id);
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

		function addToCart2() {
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

		function addToCompare(product_id) {
			$.ajax({
				type: 'POST',
				url: '/add-to-compare/' + product_id,
				dataType: 'json',
				success: function(data) {
					// wishlist();
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

		function compare() {
			$.ajax({
				type: 'GET',
				dataType: 'json',
				url: '/get-compare-product/',
				success: function(response) {
					if (response.compareCount > 0) {
						$('#compareCount').text(response.compareCount);
						$('#compareCount').show();
					} else {
						$('#compareCount').hide();
					}

					var heads = `<tr>
                            <th class="align-middle text-center">
                                <p class="mb-0 text-uppercase fs-3 fw-light text-white">Product
                                    <br>Photo
                                </p>
                            </th>`;
					$.each(response.compare, function(key, value) {
						heads += `
                            <th class="align-middle text-center">
                                <img src="${value.product.product_thumbnail}" alt="" width="230">
                            </th>
						`;
					});
					heads += `</tr>`;

					var rows = "";

					var row1 = `<tr><td>Price</td>`;
					$.each(response.compare, function(key, value) {
						row1 += `<td>${value.product.discount_price === null 
									? `$${value.product.selling_price}`
									: `$${value.product.discount_price}`}
								</td>`
					});
					row1 += "</tr>";

					var row2 = `<tr><td>Model</td>`;
					$.each(response.compare, function(key, value) {
						row2 += `<td>${value.product.product_name}</td>`;
					});
					row2 += "</tr>";

					var row3 = `<tr><td>Brand</td>`;
					$.each(response.compare, function(key, valur) {
						row3 += `<td>Apple</td>`;
					});
					row3 += `</tr>`;

					var row4 = `<tr><td>Rating</td>`;
					$.each(response.compare, function(key, value) {
						row4 += `<td>4.8<i class = 'bx bx-star'></i></td>`;
					});
					row4 += `</tr>`;

					var row5 = `<tr><td>Summary</td>`;
					$.each(response.compare, function(key, value) {
						row5 += `<td>${value.product.short_description}</td>`;
					});
					row5 += `</tr>`;

					var row6 = `<tr><td>Stock</td>`;
					$.each(response.compare, function(key, value) {
						row6 += `<td>${value.product.product_qty > 0 ?
							`<span class="stock-status in-stock mb-0">In Stock</span>` :
							`<span class="stock-status out-stock mb-0">Stock Out</span>`
							}</td>`;
					});
					row6 += `</tr>`;

					var row7 = `<tr><td>Num of Cores</td>`;
					$.each(response.compare, function(key, value) {
						row7 += `<td>2</td>`;
					});
					row7 += `</tr>`;

					var row8 = `<tr><td>RAM</td>`;
					$.each(response.compare, function(key, value) {
						row8 += `<td>8 GB</td>`;
					});
					row8 += `</tr>`;

					var row9 = `<tr><td>System </td>`;
					$.each(response.compare, function(key, value) {
						row9 += `<td>iOS 12</td>`;
					});
					row9 += `</tr>`;

					var row10 = `<tr><td></td>`;
					$.each(response.compare, function(key, value) {
						row10 += `<td>
									<a href = "javascript:;" class = "btn btn-white btn-ecomm" >Add to Cart</a>
									<a type = "submit" id = ${value.id} onclick = "compareRemove(this.id)" 
										class = "btn btn-light btn-ecomm" >Remove</a>
								</td>`;
					});
					row10 += `</tr>`;

					rows = row1 + row2 + row3 + row4 + row5 + row6 + row7 + row8 + row9 + row10;
					$('#heads').html(heads);
					$('#compare').html(rows);
				},
				error: function() {
					$('#compareCount').hide();
				}
			});
		}
		compare();

		function compareRemove(id) {
			$.ajax({
				type: 'GET',
				url: '/compare-remove/' + id,
				dataType: 'json',
				success: function(data) {
					compare();

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

		function cart() {
			$.ajax({
				type: 'GET',
				url: '/get-cart-product',
				dataType: 'json',
				success: function(response) {
					// console.log(response);

					var rows = "";
					$.each(response.carts, function(key, value) {
						rows += `<div class="row align-items-center g-3">
                                <div class="col-12 col-lg-6">
                                    <div class="d-lg-flex align-items-center gap-2">
                                        <div class="cart-img text-center text-lg-start">
                                            <img src="${value.options.image}" width="130" alt="">
                                        </div>
                                        <div class="cart-detail text-center text-lg-start">
                                            <h6 class="mb-2">${value.name}</h6>
                                            <p class="mb-0">Size: <span>${value.options.size == null
												? `...`
												: `${value.options.size}`}</span>
                                            </p>
                                            <p class="mb-2">Color: <span>${value.options.color == null
												? `....`
												: `${value.options.color}`}</span>
                                            </p>
                                            <h5 class="mb-0">$${value.price}</h5>
											<h5 class="mb-0">$${value.subtotal}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="cart-action text-center">
										<a type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)"  class="qty-down"><i class='bx bx-chevron-down'></i></a>
                                        <input type="number" class="form-control rounded-0" value="${value.qty}" min="1">
										<a type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" class="qty-up"><i class='bx bx-chevron-up'></i></a>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="text-center">
                                        <div class="d-flex gap-2 justify-content-center justify-content-lg-end"> <a type="submit" id=${value.rowId} onclick="cartRemove(this.id)" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-x-circle'></i> Remove</a>
                                            <a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-heart me-0'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-4 border-top"></div>                                       
							`;
					});

					$('#cartPage').html(rows);
				}
			});
		}
		cart();

		function cartRemove(id) {
			$.ajax({
				type: 'GET',
				url: '/cart-remove/' + id,
				dataType: 'json',
				success: function(data) {
					cart();
					miniCart();
					couponCalculation();

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

		function cartDecrement(rowId) {
			$.ajax({
				type: 'GET',
				url: '/cart-decrement/' + rowId,
				dataType: 'json',
				success: function(data) {
					cart();
					miniCart();
					couponCalculation();
				}
			});
		}

		function cartIncrement(rowId) {
			$.ajax({
				type: 'GET',
				url: '/cart-increment/' + rowId,
				dataType: 'json',
				success: function(data) {
					cart();
					miniCart();
					couponCalculation();
				}
			});
		}

		function applyCoupon() {
			var coupon_name = $('#coupon_name').val();

			$.ajax({
				type: 'POST',
				url: '/coupon-apply',
				dataType: 'json',
				data: {
					coupon_name: coupon_name,
				},
				success: function(data) {
					couponCalculation();
					// cart();
					// miniCart();

					if (data.validity == true) {
						$('#couponField').hide();
					}

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

		function couponCalculation() {
			$.ajax({
				type: 'GET',
				url: '/coupon-calculation',
				dataType: 'json',
				success: function(data) {
					if (data.total) {
						$('#couponCalField').html(
							`<p class="mb-2">Subtotal: <span class="float-end">$${data.total}</span>
							</p>
							<p class="mb-2">Shipping: <span class="float-end">--</span>
							</p>
							<p class="mb-2">Taxes: <span class="float-end">$14.00</span>
							</p>
							<div class="my-3 border-top"></div>
							<h5 class="mb-0">Order Total: <span class="float-end">$${data.total}</span></h5>
							<div class="my-4"></div>
							<div class="d-grid"> <a href="{{ route('checkout') }}" class="btn btn-white btn-ecomm">Proceed to Checkout</a>
							</div>`
						);
					} else {
						$('#couponCalField').html(
							`<p class="mb-2">Subtotal: <span class="float-end">$${data.subtotal}</span>
							</p>
							<p class="mb-2">Discount Amount: <span class="float-end">-$${data.discount_amount}</span>
							</p>
							<p class="mb-2">Coupon: <span class="float-end">${data.coupon_name}</span>
							<a type="submit" onclick="couponRemove()"><i class="bx bx-trash"></i></a>
							</p>
							<p class="mb-2">Shipping: <span class="float-end">--</span>
							</p>
							<p class="mb-0">Taxes: <span class="float-end">$14.00</span>
							</p>
							<div class="my-3 border-top"></div>
							<h5 class="mb-0">Order Total: <span class="float-end">$${data.total_amount}</span></h5>
							<div class="my-4"></div>
							<div class="d-grid"> <a href="{{ route('checkout') }}" class="btn btn-white btn-ecomm">Proceed to Checkout</a>
							</div>`
						)
					}
				}
			});
		}
		couponCalculation();

		function couponRemove() {
			$.ajax({
				type: 'GET',
				url: '/coupon-remove',
				dataType: 'json',
				success: function(data) {
					// cart();
					// miniCart();
					couponCalculation();
					$('#couponField').show();

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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	@if (Session::has('message'))
	<script>
		var type = "{{ Session::get('alert-type', 'info') }}";
		switch (type) {
			case 'success':
				toastr.success("{{ Session::get('message') }}");
				break;
			case 'info':
				toastr.info("{{ Session::get('message') }}");
				break;
			case 'warning':
				toastr.warning("{{ Session::get('message') }}");
			case 'error':
				toastr.error("{{ Session::get('message') }}");
				break;
		}
	</script>
	@endif
</body>

</html>