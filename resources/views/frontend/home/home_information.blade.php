<!--start information-->
<section class="py-3 border-top border-bottom">
    <div class="container">
        <div class="row row-cols-1 row-cols-lg-3 row-group align-items-center">
            @php
                $choose = App\Models\WhyChooseUs::latest()->limit(3)->get();
            @endphp
            @foreach ($choose as $item) 
            <div class="col p-3">
                <div class="d-flex align-items-center">
                    <div class="fs-1 text-white"> <i class='{{ $item->icon }}'></i>
                    </div>
                    <div class="info-box-content ps-3">
                        <h6 class="mb-0">{{ $item->title }}</h6>
                        <p class="mb-0">{{ $item->short_description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!--end row-->
    </div>
</section>
<!--end information-->