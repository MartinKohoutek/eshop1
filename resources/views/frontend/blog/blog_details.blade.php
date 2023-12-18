@extends('frontend.master_dashboard')
@section('home')
@section('title')
    MKShop - Blog - {{ $post->post_title }}
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom d-none d-md-flex">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Blog Posts</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Blog</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">
                                    @foreach ($breadCat as $cat)
                                    {{ $cat->blog_category_name }}
                                    @endforeach
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->post_title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->
    <!--start page content-->
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="blog-right-sidebar p-3">
                        <div class="card shadow-none bg-transparent">
                            <img src="{{ asset($post->post_image) }}" class="card-img-top" alt="">
                            @php
                                $comments = App\Models\BlogComment::where('blog_id', $post->id)->latest()->get();
                            @endphp
                            <div class="card-body p-0">
                                <div class="list-inline mt-4"> <a href="{{ route('blog.by.author', $post->user->id) }}" class="list-inline-item"><i class='bx bx-user me-1'></i>By Admin</a>
                                    <a href="#blog_comments" class="list-inline-item"><i class='bx bx-comment-detail me-1'></i>{{ count($comments) }} Comment{{ count($comments) > 0 || count($comments) == 0 ? 's' : '' }}</a>
                                    <a href="javascript:;" class="list-inline-item"><i class='bx bx-calendar me-1'></i>{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</a>
                                </div>
                                <h4 class="mt-4">{{ $post->post_title }}</h4>
                                <p>{!! $post->post_long_description !!}</p>
                                <div class="d-flex align-items-center gap-2 py-4 border-top border-bottom">
                                    <div class="">
                                        <h6 class="mb-0 text-uppercase">Share This Post</h6>
                                    </div>
                                    <div class="list-inline blog-sharing"> <a href="javascript:;" class="list-inline-item"><i class='bx bxl-facebook'></i></a>
                                        <a href="javascript:;" class="list-inline-item"><i class='bx bxl-twitter'></i></a>
                                        <a href="javascript:;" class="list-inline-item"><i class='bx bxl-linkedin'></i></a>
                                        <a href="javascript:;" class="list-inline-item"><i class='bx bxl-instagram'></i></a>
                                        <a href="javascript:;" class="list-inline-item"><i class='bx bxl-tumblr'></i></a>
                                    </div>
                                </div>
                                <div class="product-review mt-3" id="blog_comments">
                                    <h5 class="mb-4">{{ count($comments) }} Comment{{ count($comments) > 0 || count($comments) == 0 ? 's' : '' }} For The Post</h5>
                                    <div class="review-list">
                                        @foreach ($comments as $comment)
                                        @php
                                            $user = App\Models\User::find($comment->user_id);
                                        @endphp
                                        <div class="d-flex align-items-start">
                                            <div class="review-user">
                                                @if ($user->role == 'user')
                                                <img src="{{ (!empty($user->photo)) ? url('/upload/user_images/'.$user->photo) : url('/upload/no_image.jpg') }}" width="65" height="65" class="rounded-circle" alt="">
                                                @elseif ($user->role == 'admin')
                                                <img src="{{ (!empty($user->photo)) ? url('/upload/admin_images/'.$user->photo) : url('/upload/no_image.jpg') }}" width="65" height="65" class="rounded-circle" alt="">
                                                @elseif ($user->role == 'vendor')    
                                                <img src="{{ (!empty($user->photo)) ? url('/upload/vendor_images/'.$user->photo) : url('/upload/no_image.jpg') }}" width="65" height="65" class="rounded-circle" alt="">
                                                @endif
                                            </div>
                                            <div class="review-content ms-3" style="width: 100%;">
                                                <div class="rates cursor-pointer fs-6">	
                                                </div>
                                                <div class="d-flex align-items-center mb-2">
                                                    <h6 class="mb-0">{{ $comment->name }}</h6>
                                                    <p class="mb-0 ms-auto">{{ Carbon\Carbon::parse($comment->created_at)->format('F j, Y') }}</p>
                                                </div>
                                                <p>{!! $comment->comment !!}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <div class="reply-form p-4 border bg-dark-1">
                                    @auth
                                    <h6 class="mb-0">Leave a Reply</h6>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                    <form method="post" action="{{ route('user.blog.comment.store') }}">
                                        @csrf
                                        @if (session('status'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            {{ session('status') }}aa
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="opacity: 1;">
                                            </button>
                                            </div>
                                        @elseif (session('error'))
                                            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                                        @endif
                                        <input type="hidden" name="blog_id" value="{{ $post->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="mb-3">
                                            <label class="title">Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="" name="title" id="title">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="comment">Comment</label>
                                            <textarea class="form-control" rows="4" name="comment" id="comment"></textarea>
                                            @error('comment')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="name">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" name="name" id="name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ Auth::user()->email }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-light btn-ecomm">Post Comment</button>
                                        </div>
                                    </form>
                                    @else
                                    <h6 class="mb-2">Leave a Reply</h6>
                                    <p>For adding comments you must <a href="{{ route('login') }}">login</a> first!</p>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="product-grid">
                            <h5 class="text-uppercase mb-4">Latest Post</h5>
                            <div class="latest-news owl-carousel owl-theme">
                                @foreach ($recentPosts as $post)
                                @php
                                    $recentComments = App\Models\BlogComment::where('blog_id', $post->id)->latest()->get();
                                @endphp
                                <div class="item">
                                    <div class="card rounded-0 product-card border">
                                        <div class="news-date">
                                            <div class="date-number">{{ $post->created_at->format('d')}}</div>
                                            <div class="date-month">{{ $post->created_at->format('M') }}</div>
                                        </div>
                                        <a href="{{ url('/post/details/'.$post->id.'/'.$post->post_slug) }}">
                                            <img src="{{ asset($post->post_image) }}" class="card-img-top border-bottom bg-dark-1" alt="..." style="height: 250px">
                                        </a>
                                        <div class="card-body">
                                            <div class="news-title">
                                                <a href="{{ url('/post/details/'.$post->id.'/'.$post->post_slug) }}">
                                                    <h5 class="mb-3 text-capitalize">{{ $post->post_title}}</h5>
                                                </a>
                                            </div>
                                            <p class="news-content mb-0">{{ Str::limit($post->post_short_description, 100)}}</p>
                                        </div>
                                        <div class="card-footer border-top">
                                            <a href="{{ url('/post/details/'.$post->id.'/'.$post->post_slug) }}">
                                                <p class="mb-0"><small class="text-white">{{ count($recentComments) }} Comment{{ count($recentComments) > 0 || count($recentComments) == 0 ? 's' : '' }}</small>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="blog-left-sidebar p-3">
                        <form>
                            <div class="position-relative blog-search mb-3">
                                <input type="text" class="form-control form-control-lg rounded-0 pe-5" placeholder="Serach posts here...">
                                <div class="position-absolute top-50 end-0 translate-middle"><i class='bx bx-search fs-4 text-white'></i>
                                </div>
                            </div>
                            <div class="blog-categories mb-3">
                                <h5 class="mb-4">Blog Categories</h5>
                                <div class="list-group list-group-flush">
                                    @foreach ($categories as $category)
                                    @php
                                    $blogPosts = App\Models\BlogPost::where('category_id', $category->id)->get();
                                    $blogCount = count($blogPosts);
                                    @endphp
                                    <a href="{{ url('/post/category/'.$category->id.'/'.$category->blog_category_slug) }}" class="list-group-item bg-transparent"><i class='bx bx-chevron-right me-1'></i>{{ $category->blog_category_name }}<span class="badge rounded-pill bg-success">{{ $blogCount }}</span></a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="blog-categories mb-3">
                                <h5 class="mb-4">Recent Posts</h5>
                                @foreach ($recentPosts as $key => $post)
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($post->post_image) }}" width="75" height="60" alt="">
                                    <div class="ms-3"> <a href="{{ url('/post/details/'.$post->id.'/'.$post->post_slug) }}" class="fs-6">{{ $post->post_title }}</a>
                                        <p class="mb-0">{{ $post->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                @if ($key+1 < count($recentPosts)) <div class="my-3 border-bottom">
                            </div>
                            @endif
                            @endforeach
                    </div>
                    <div class="blog-categories mb-3">
                        <h5 class="mb-4">Popular Tags</h5>
                        <div class="tags-box"> <a href="javascript:;" class="tag-link">Cloths</a>
                            <a href="javascript:;" class="tag-link">Electronis</a>
                            <a href="javascript:;" class="tag-link">Furniture</a>
                            <a href="javascript:;" class="tag-link">Sports</a>
                            <a href="javascript:;" class="tag-link">Men Wear</a>
                            <a href="javascript:;" class="tag-link">Women Wear</a>
                            <a href="javascript:;" class="tag-link">Laptops</a>
                            <a href="javascript:;" class="tag-link">Formal Shirts</a>
                            <a href="javascript:;" class="tag-link">Topwear</a>
                            <a href="javascript:;" class="tag-link">Headphones</a>
                            <a href="javascript:;" class="tag-link">Bottom Wear</a>
                            <a href="javascript:;" class="tag-link">Bags</a>
                            <a href="javascript:;" class="tag-link">Sofa</a>
                            <a href="javascript:;" class="tag-link">Shoes</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end row-->
</div>
</section>
<!--end start page content-->
</div>
<script>
    $(document).ready(function() {
        $('.latest-news').owlCarousel({
            loop: false,
            margin: 10,
            responsiveClass: true,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1024: {
                    items: 3
                },
                1366: {
                    items: 3
                }
            }
        })
    });
</script>
@endsection