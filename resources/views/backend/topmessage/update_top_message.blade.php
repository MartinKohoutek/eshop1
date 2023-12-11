@extends('admin.admin_dashboard')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Top Message Setup</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Top Message Setup</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('store.top.message') }}" method="post" enctype="multipart/form-data" id="myForm">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Show Top Message</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary form-check">
                                        <input class="form-check-input" name="status" type="checkbox" {{ $topMessage->status == 'active' ? 'checked=""' : ''}} style="margin-left: -8px;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Link</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary form-check">
                                        <input type="text" name="link" class="form-control" value="{{ $topMessage->link }}" style="margin-left: -8px;" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Link Text</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary form-check">
                                        <input type="text" name="link_text" class="form-control" value="{{ $topMessage->link_text }}" style="margin-left: -8px;" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Top Message</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary form-group">
                                        <textarea name="message" id="editor2">{{ $topMessage->message }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Update Top Message" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myForm').validate({
            rules: {
                message: {
                    required : true,
                },
            },
            messages: {
                message: {
                    required: 'Please Enter Top Message',
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        })
    });
</script>
@endsection