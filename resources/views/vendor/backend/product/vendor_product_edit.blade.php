@extends('vendor.vendor_dashboard')
@section('vendor')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Vendor Products</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Edit Product</h5>
            <hr />

            <form id="myForm" action="{{ route('vendor.update.product') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="inputProductTitle" value="{{ $product->product_name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Tags</label>
                                    <input type="text" name="product_tags" class="form-control" data-role="tagsinput" value="{{ $product->product_tags }}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Size</label>
                                    <input type="text" name="product_size" class="form-control" data-role="tagsinput" value="{{ $product->product_size }}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Color</label>
                                    <input type="text" name="product_color" class="form-control" data-role="tagsinput" value="{{ $product->product_color }}">
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="inputProductDescription" class="form-label">Short Description</label>
                                    <textarea name="short_description" class="form-control" id="inputProductDescription" rows="3">{{ $product->short_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Long Description</label>
                                    <textarea name="long_description" id="editor">{!! $product->long_description !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6 form-group">
                                        <label for="inputPrice" class="form-label">Product Price</label>
                                        <input type="text" name="selling_price" class="form-control" id="inputPrice" value="{{ $product->selling_price }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label">Discount Price</label>
                                        <input type="text" name="discount_price" class="form-control" id="inputCompareatprice" value="{{ $product->discount_price }}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="inputCostPerPrice" class="form-label">Product Code</label>
                                        <input type="text" name="product_code" class="form-control" id="inputCostPerPrice" value="{{ $product->product_code }}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="inputStarPoints" class="form-label">Product Quantity</label>
                                        <input type="text" name="product_qty" class="form-control" id="inputStarPoints" value="{{ $product->product_qty }}">
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="inputProductType" class="form-label">Product Brand</label>
                                        <select name="brand_id" class="form-select" id="inputProductType">
                                            <option></option>
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? "selected" : "" }}>{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="inputVendor" class="form-label">Product Category</label>
                                        <select name="category_id" class="form-select" id="inputVendor">
                                            <option></option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? "selected" : "" }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="inputCollection" class="form-label">Product Subcategory</label>
                                        <select name="subcategory_id" class="form-select" id="inputCollection">
                                            <option></option>
                                            @foreach ($subcategories as $subcat)
                                            <option value="{{ $subcat->id }}" {{ $subcat->id == $product->subcategory_id ? "selected" : "" }}>{{ $subcat->subcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input name="hot_deals" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" {{ $product->hot_deals == 1 ? "checked" : "" }}>
                                                    <label class="form-check-label" for="flexCheckDefault">Hot Deals</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input name="featured" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" {{ $product->featured == 1 ? "checked" : "" }}>
                                                    <label class="form-check-label" for="flexCheckDefault">Featured</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input name="special_offer" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" {{ $product->special_offer == 1 ? "checked" : "" }}>
                                                    <label class="form-check-label" for="flexCheckDefault">Special Offer</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input name="special_deals" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" {{ $product->special_deals == 1 ? "checked" : "" }}>
                                                    <label class="form-check-label" for="flexCheckDefault">Special Deals</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <input type="submit" class="btn btn-primary" value="Update Product" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </form>
        </div>
    </div>

    <h6 class="mb-0 text-uppercase">Update Main Image Thumbnail</h6>
    <hr>
    <div class="card">
        <form action="{{ route('update.product.thumbnail') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="old_image" value="{{ $product->product_thumbnail }}">

            <div class="card-body">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose Thumbnail Image</label>
                    <input name="product_thumbnail" class="form-control" type="file" id="formFile" onchange="mainThumbUrl(this)">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label"></label>
                    <img src="{{ asset($product->product_thumbnail) }}" alt="" style="width: 100px; height: 100px" id="mainThumb">
                </div>
                <input type="submit" class="btn btn-primary" value="Update Product" />
            </div>
        </form>
    </div>


    <h6 class="mb-0 text-uppercase">Update Multi Image</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <table class="table mb-0 table-striped">
                <thead>
                    <tr>
                        <th scope="col">Serial Numbar</th>
                        <th scope="col">Image</th>
                        <th scope="col">Change Image</th>
                        <th scope="col">Delete Image</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('update.product.multiimage') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($multiImages as $key => $image)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>
                                <img src="{{ asset($image->photo_name) }}" alt="" style="width: 70px; height: 40px">
                            </td>
                            <td>
                                {{$image->photo_name}}
                            </td>
                            <td>
                                <input type="file" class="form-group" name="multi_img[{{ $image->id }}]" id="">
                            </td>
                            <td>
                                <input type="submit" value="Update Image" class="btn btn-primary px-4">
                                <a href="{{ route('product.multiimage.delete', $image->id) }}" id="delete" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </form>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function mainThumbUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThumb').attr('src', e.target.result).width(80).height(80);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#multiImg').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(100)
                                    .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/subcategory/ajax/') }}/" + category_id, // jako /axaj/{id}
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name + '</option>');
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                product_name: {
                    required: true,
                },
                short_description: {
                    required: true,
                },
                product_thumbnail: {
                    required: true,
                },
                multi_img: {
                    required: true,
                },
                selling_price: {
                    required: true,
                },
                product_code: {
                    required: true,
                },
                product_qty: {
                    required: true,
                },
                brand_id: {
                    required: true,
                },
                category_id: {
                    required: true,
                },
                subcategory_id: {
                    required: true,
                },
            },
            messages: {
                product_name: {
                    required: 'Please Enter Category Name',
                },
                short_description: {
                    required: 'Please Enter Short Description',
                },
                product_thumbnail: {
                    required: 'Please Select Product Thumbnail',
                },
                multi_img: {
                    required: 'Please Select Multi Image',
                },
                selling_price: {
                    required: 'Please Enter Selling Price',
                },
                product_code: {
                    required: 'Please Enter Product Code',
                },
                product_qty: {
                    required: 'Please Enter Product Quantity',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        })
    });
</script>
@endsection