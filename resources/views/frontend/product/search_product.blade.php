<style>
    .search-card {
        background-color: #fff;
        /* background: linear-gradient(45deg, #6a11cb, #2575fc); */
        padding: 15px;
        border: none;
    }
    
    .searchbox .form-control:focus {
        box-shadow: none;
        border-color: #eee;
        color: white;
    }
    .list {
        padding-top: 20px;
        padding-bottom: 10px;
        display: flex;
        align-items: center;
    }
    .search-card a:not(:last-child) {
        border-bottom: 2px solid #ccc !important; 
    }

    .search-card .list small {
        color: #ccc;
    }
    .search-card .list span {
        color: blueviolet;
    }

</style>
@if ($products->isEmpty())
    <h4 class="text-center text-danger">Product Not Found</h4>
@else
    <div class="conatiner mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card search-card">
                    @foreach ($products as $item)
                    <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug) }}">
                        <div class="list border-bottom">
                            <img src="{{ $item->product_thumbnail }}" alt="" style="width: 50px; height: 50px">
                            <div class="d-flex flex-column ml-5" style="margin-left: 10px; font-size: 16px; font-weight: bold;">
                                <span>{{ $item->product_name }}</span>
                                <small>${{ $item->selling_price }}</small>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif