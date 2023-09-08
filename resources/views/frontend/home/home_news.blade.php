 <!--start News-->
 <section class="py-4">
     @php
     $posts = App\Models\BlogPost::latest()->limit(4)->get();
     @endphp
     <div class="container">
         <div class="d-flex align-items-center">
             <h5 class="text-uppercase mb-0">Latest News</h5>
             <a href="blog.html" class="btn btn-light ms-auto rounded-0">View All News<i class='bx bx-chevron-right'></i></a>
         </div>
         <hr />
         <div class="product-grid">
             <div class="latest-news owl-carousel owl-theme">
                 @foreach ($posts as $post)
                 <div class="item">
                     <div class="card rounded-0 product-card border">
                         <div class="news-date" style="background-color: rgba(13, 110, 253, 0.7)">
                             <div class="date-number">{{ $post->created_at->format('d') }}</div>
                             <div class="date-month">{{ $post->created_at->format('M') }}</div>
                         </div>
                         <a href="{{ url('/post/details/'.$post->id.'/'.$post->post_slug) }}">
                             <img src="{{ asset($post->post_image) }}" class="card-img-top border-bottom bg-dark-1" alt="..." style="height: 262px;">
                         </a>
                         <div class="card-body">
                             <div class="news-title">
                                 <a href="{{ url('/post/details/'.$post->id.'/'.$post->post_slug) }}">
                                     <h5 class="mb-3 text-capitalize">{{ $post->post_title }}</h5>
                                 </a>
                             </div>
                             <p class="news-content mb-0">{!! Str::limit($post->post_short_description, 100) !!}</p>
                         </div>
                         <div class="card-footer border-top">
                             <a href="{{ url('/post/details/'.$post->id.'/'.$post->post_slug) }}">
                                 <p class="mb-0"><small class="text-white">0 Comments</small>
                                 </p>
                             </a>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
     </div>
 </section>
 <!--end News-->