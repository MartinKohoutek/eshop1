<!--start slider section-->
@php
$sliders = App\Models\Slider::orderBy('slider_title', 'ASC')->get();
@endphp
<section class="slider-section">
    <div class="first-slider">
        <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($sliders as $key => $slider)                    
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key }}" class="@if($key == 0) active @endif"></li>
                <!-- <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li> -->
                @endforeach
            </ol>
            <div class="carousel-inner">

                @foreach ($sliders as $key => $slider)
                <div class="carousel-item @if($key == 0) active @endif">
                    <div class="row d-flex align-items-center">
                        <div class="col d-none d-lg-flex justify-content-center">
                            <div class="">
                                <h3 class="h3 fw-light">{{ $slider->slider_subtitle }}</h3>
                                <h1 class="h1">{{ $slider->slider_title }}</h1>
                                <p class="pb-3">{{ Str::limit($slider->slider_description, 50) }}</p>
                                <div class=""> <a class="btn btn-light btn-ecomm" href="javascript:;">Shop Now <i class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <img src="{{ asset($slider->slider_image) }}" class="img-fluid" alt="...">
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</section>
<!--end slider section-->