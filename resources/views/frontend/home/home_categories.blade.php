 <!--start categories-->
 @php
 $categories = App\Models\Category::orderBy('category_name', 'ASC')->get();
 @endphp
 <section class="py-4">
     <div class="container">
         <div class="d-flex align-items-center">
             <h5 class="text-uppercase mb-0">Browse Catergory</h5>
             <a href="shop-categories.html" class="btn btn-light ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
         </div>
         <hr />
         <div class="product-grid">
             <div class="browse-category owl-carousel owl-theme">
                 @foreach ($categories as $cat)
                 <div class="item">
                     <div class="card rounded-0 product-card border">
                         <div class="card-body">
                            <a href="{{ url('product/category/'.$cat->id.'/'.$cat->category_slug) }}">
                                <img src="{{ asset($cat->category_image) }}" class="img-fluid" alt="...">
                            </a>
                         </div>
                         <div class="card-footer text-center">
                            <a href="{{ url('product/category/'.$cat->id.'/'.$cat->category_slug) }}">
                                <h6 class="mb-1 text-uppercase">{{ $cat->category_name }}</h6>
                            </a>
                             @php
                                 $products = App\Models\Product::where('category_id', $cat->id)->get();
                             @endphp
                             <p class="mb-0 font-12 text-uppercase">{{ count($products) }} Products</p>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
     </div>
 </section>
 <!--end categories-->