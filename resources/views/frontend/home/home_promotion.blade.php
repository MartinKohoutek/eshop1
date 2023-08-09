<!--start pramotion-->
@php
    $banners = App\Models\Banner::orderBy('banner_title', 'ASC')->limit(3)->get();
@endphp
<section class="py-4">
    <div class="container">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">

            @foreach ($banners as $banner)
            <div class="col">
                <div class="card rounded-0">
                    <div class="row g-0 align-items-center">
                        <div class="col">
                            <img src="{{ asset($banner->banner_image) }}" class="img-fluid" alt="" />
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">{{ $banner->banner_title }}</h5>
                                <p class="card-text text-uppercase">{{ $banner->banner_subtitle }}</p> <a href="{{ $banner->banner_url }}" class="btn btn-light btn-ecomm">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        <!--end row-->
    </div>
</section>
<!--end pramotion-->