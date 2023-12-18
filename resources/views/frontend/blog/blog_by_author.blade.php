@extends('frontend.master_dashboard')
@section('home')
@section('title')
    MKShop - Blog Categories
@endsection
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom d-none d-md-flex">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <div class="breadcrumb-title pe-3">Blog</div>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Blog</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                               {{ $author->name }}
                            </li>
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
            <h3> {{ $author->name }} Posts
            </h3>
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="blog-right-sidebar p-3">
                        <div class="author d-flex align-items-center gap-3 py-4">
                            <img src="{{ (!empty($author->photo)) ? asset('/upload/admin_images/'.$author->photo) : asset('upload/no_image.jpg') }}" alt="" width="80">
                            <div class="">
                                <h6 class="mb-0">{{ $author->name }}</h6>
                                <p class="mb-0">Donec egestas metus non vehicula accumsan. Pellentesque sit amet tempor nibh. Mauris in risus lorem. Cras malesuada gravida massa eget viverra. Suspendisse vitae dolor erat. Morbi id rhoncus enim. In hac habitasse platea dictumst. Aenean lorem diam, venenatis nec venenatis id, adipiscing ac massa.</p>
                            </div>
                        </div>
                        @foreach ($posts as $post)
                        <div class="card">
                            <img src="{{ asset($post->post_image) }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <div class="list-inline"> <a href="javascript:;" class="list-inline-item"><i class='bx bx-user me-1'></i>By Admin</a>
                                    <a href="javascript:;" class="list-inline-item"><i class='bx bx-comment-detail me-1'></i>16 Comments</a>
                                    <a href="javascript:;" class="list-inline-item"><i class='bx bx-calendar me-1'></i>{{ $post->created_at->format('M d Y') }}</a>
                                </div>
                                <h4 class="mt-4">{{ $post->post_title }}</h4>
                                <p>{!! $post->post_short_description !!}</p> <a href="{{ url('post/details/'.$post->id.'/'.$post->post_slug) }}" class="btn btn-light btn-ecomm">Read More <i class='bx bx-chevrons-right'></i></a>
                            </div>
                        </div>
                        @endforeach

                        <hr>
                        <nav class="d-flex justify-content-between" aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="javascript:;"><i class="bx bx-chevron-left"></i> Prev</a>
                                </li>
                            </ul>
                            <ul class="pagination">
                                <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span>
                                </li>
                                <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">2</a>
                                </li>
                                <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">3</a>
                                </li>
                                <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">4</a>
                                </li>
                                <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">5</a>
                                </li>
                            </ul>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="javascript:;" aria-label="Next">Next <i class="bx bx-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
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
                                @if ($key+1 < count($recentPosts))
                                <div class="my-3 border-bottom"></div>
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
@endsection