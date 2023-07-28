@extends('dashboard')
@section('user')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom d-none d-md-flex">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">My Account</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Account Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--end breadcrumb-->
    <!--start shop cart-->
    <section class="py-4">
        <div class="container">
            <h3 class="d-none">Account</h3>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card shadow-none mb-3 mb-lg-0">
                                @include('frontend.user.body.sidebar')
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card shadow-none mb-0">
                                <div class="card-body">
                                    <form class="row g-3" method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12">
                                            <label class="form-label">User Name</label>
                                            <input type="text" name="username" class="form-control" value="{{ $userData->username }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $userData->name }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Email address</label>
                                            <input type="email" name="email" class="form-control" value="{{ $userData->email }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control" value="{{ $userData->phone }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" value="{{ $userData->address }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Photo</label>
                                            <input type="file" name="photo" class="form-control" id="image">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label"></label>
                                            <img id="showImage" src="{{ (!empty($userData->photo)) ? asset('upload/user_images/'.$userData->photo) : asset('upload/no_image.jpg') }}" alt="" style="width: 100px; height: 100px">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-light btn-ecomm">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </section>
    <!--end shop cart-->
</div>
<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection