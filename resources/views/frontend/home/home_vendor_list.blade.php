@php
$vendors = App\Models\User::where('status', 'active')->where('role', 'vendor')->orderBy('id', 'DESC')->limit(4)->get();
@endphp
<section class="py-4">
    <div class="container">
        <div class="add-banner">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                @foreach ($vendors as $vendor)
                <div class="col d-flex">
                    <div class="card rounded-0 w-100">
                        <img src="{{ (!empty($vendor->photo)) ? url('/upload/vendor_images/'.$vendor->photo) : url('upload/no_image.jpg') }}" class="card-img-top" alt="...">
                        <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $vendor->name }}</h5>
                            <h6 class="text-muted">Since {{ $vendor->vendor_join }}</h6>
                            @php
                                $products = App\Models\Product::where('vendor_id', $vendor->id)->get();
                            @endphp
                            <span class="badge bg-success">{{ count($products) }} Products</span>
                            <p class="card-text">{{ Str::limit($vendor->vendor_short_info, 30) }}</p> <a href="{{ route('vendor.details', $vendor->id) }}" class="btn btn-light btn-ecomm">Visit Store</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!--end row-->
        </div>
    </div>
</section>