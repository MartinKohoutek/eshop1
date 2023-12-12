<!--start support info-->
<section class="py-4 bg-dark-1">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group">
            @php
                $choose = App\Models\WhyChooseUs::orderBy('id', 'asc')->limit(4)->get();
            @endphp
            @foreach ($choose as $item)
            <div class="col">
                <div class="text-center">
                    <div class="font-50 text-white"> <i class='{{ $item->icon }}'></i>
                    </div>
                    <h2 class="fs-5 text-uppercase mb-0">{{ $item->title }}</h2>
                    <p class="text-capitalize">{{ $item->short_description }}</p>
                    <p>{!! $item->long_description !!}</p>
                </div>
            </div>
            @endforeach

        </div>
        <!--end row-->
    </div>
</section>
<!--end support info-->