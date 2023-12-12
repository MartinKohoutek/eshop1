@extends('frontend.master_dashboard')
@section('home')
@section('title')
ABCStore | Contact Form
@endsection
<style>
    .email a {
        color: rgb(255 255 255 / 70%);
    }
    .email a:hover {
        color: white;
    }
</style>
<div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom d-none d-md-flex">
        <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
                <h3 class="breadcrumb-title pe-3">Contact Us</h3>
                <div class="ms-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="bx bx-home-alt"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
            <h3 class="d-none">Google Map</h3>
            <div class="contact-map p-3 bg-dark-1 rounded-0 shadow-none">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805184.6319269302!2d144.49269200596396!3d-37.971237009163936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sin!4v1618835176130!5m2!1sen!2sin" class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="p-3 bg-dark-1">
                        <form method="post" action="{{ route('store.contact') }}">
                            @csrf
                            <div class="form-body">
                                <h6 class="mb-0 text-uppercase">Drop us a line</h6>
                                <div class="my-3 border-bottom"></div>
                                <div class="mb-3">
                                    <label class="form-label">Enter Your Name</label>
                                    @if (Auth::check())
                                    @php
                                        $user = App\Models\User::find(Auth::user()->id)
                                    @endphp
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" />                
                                    @else
                                    <input type="text" name="name" class="form-control" />
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Enter Email *</label>
                                    @if (Auth::check())
                                    @php
                                        $user = App\Models\User::find(Auth::user()->id)
                                    @endphp
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" />
                                    @else
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" />
                                    @endif
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    @if (Auth::check())
                                    @php
                                        $user = App\Models\User::find(Auth::user()->id)
                                    @endphp
                                    @if ($user->phone != null)
                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" />
                                    @else
                                    <input type="text" name="phone" class="form-control" />
                                    @endif
                                    @else
                                    <input type="text" name="phone" class="form-control" />
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message *</label>
                                    <textarea class="form-control" name="contact_message" rows="4" cols="4"></textarea>
                                    @error('contact_message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-light btn-ecomm">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="p-3 bg-dark-1">
                        <div class="address mb-3">
                            <p class="mb-0 text-uppercase text-white">Address</p>
                            <p class="mb-0 font-12">{{ $siteSetting->company_address }}</p>
                        </div>
                        <div class="phone mb-3">
                            <p class="mb-0 text-uppercase text-white">Phone</p>
                            <p class="mb-0 font-13">Phone: {{ $siteSetting->phone_one }}</p>
                            <p class="mb-0 font-13">Mobile : {{ $siteSetting->support_phone }}</p>
                        </div>
                        <div class="email mb-3">
                            <p class="mb-0 text-uppercase text-white">Email</p>
                            <p class="mb-0 font-13"><a href="mailto:{{ $siteSetting->email }}">{{ $siteSetting->email }}</a></p>
                        </div>
                        <div class="working-days mb-3">
                            <p class="mb-0 text-uppercase text-white">WORKING DAYS</p>
                            <p class="mb-0 font-13">{{ $siteSetting->working_days }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
    <!--end start page content-->
</div>
@endsection