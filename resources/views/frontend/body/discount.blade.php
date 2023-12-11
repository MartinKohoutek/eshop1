@php
    $topMessage = App\Models\TopMessage::findOrFail(1);
@endphp
@if ($topMessage->status == 'active')
<style>
    #discount p {
        margin-bottom: 0;
        margin-block-end: 0;
    }
</style>
<div class="discount-alert bg-dark-1 d-none d-lg-block">
    <div class="alert alert-dismissible fade show shadow-none rounded-0 mb-0 border-bottom">
        <div class="d-lg-flex align-items-center gap-2 justify-content-center" id="discount">
            
            {!! $topMessage->message !!}
            <a href="{{ url($topMessage->link) }}" class="bg-dark text-white px-1 font-13 cursor-pointer">{{ $topMessage->link_text }}</a>
            <p class="mb-0 font-13 text-light-3">*Limited time only</p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif