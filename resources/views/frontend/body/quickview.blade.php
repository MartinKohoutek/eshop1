<!--start quick view product-->
<!-- Modal -->
<div class="modal fade" id="QuickViewProduct">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
        <div class="modal-content bg-dark-4 rounded-0 border-0">
            <div class="modal-body">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                <div class="row g-0">
                    <div class="col-12 col-lg-6">
                        <div class="image-zoom-section">
                            <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1" id="bigImg">
                                <!-- <div class="item">
                                    <img src="" id="pimage" class="img-fluid" alt="">
                                </div> -->

                            </div>
                            <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1" id="imgArea">
                                <!-- <button class="owl-thumb-item">
                                    <img src="{{ asset('frontend/assets/images/product-gallery/01.png') }}" class="" alt="">
                                </button> -->

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="product-info-section p-3">
                            <a href="">
                                <h3 class="mt-3 mt-lg-0 mb-0" id="pname"></h3>
                            </a>
                            <div class="product-rating d-flex align-items-center mt-2">
                                <div class="rates cursor-pointer font-13"> <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-light-4"></i>
                                </div>
                                <div class="ms-1">
                                    <p class="mb-0">(24 Ratings)</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3 gap-2">
                                <h5 class="mb-0 text-decoration-line-through text-light-3" id="oldprice"></h5>
                                <h4 class="mb-0" id="newprice">$49.00</h4>
                            </div>
                            <div class="mt-3">
                                <h6>Discription :</h6>
                                <p class="mb-0">Virgil Abloh’s Off-White is a streetwear-inspired collection that continues to break away from the conventions of mainstream fashion. Made in Italy, these black and brown Odsy-1000 low-top sneakers.</p>
                            </div>
                            <dl class="row mt-3">
                                <dt class="col-sm-3">Product code</dt>
                                <dd class="col-sm-9" id="pcode"></dd>
                                <dt class="col-sm-3">Stock</dt>
                                <dd class="col-sm-9">
                                    <span class="badge badge-pill bg-success" id="available">Available</span>
                                    <span class="badge badge-pill bg-danger" id="stockout">Stockout</span>
                                </dd>
                                <dt class="col-sm-3">Brand</dt>
                                <dd class="col-sm-9" id="pbrand"></dd>
                                <dt class="col-sm-3">Category</dt>
                                <dd class="col-sm-9" id="pcategory"></dd>
                            </dl>
                            <div class="row row-cols-auto align-items-center mt-3" id="quantityAraea">
                                <div class="col">
                                    <label class="form-label">Quantity</label>
                                    <input type="text" class="form-select form-select-sm" value="1" min="1" id="qty" name="qty">
                                </div>
                                <div class="col" id="sizeArea">
                                    <label class="form-label">Size</label>
                                    <select class="form-select form-select-sm" id="size" name="size">
                                       
                                    </select>
                                </div>
                                <div class="col" id="colorArea">
                                    <label class="form-label">Color</label>
                                    <select class="form-select form-select-sm" id="color" name="color">
                        
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Colors</label>
                                    <div class="color-indigators d-flex align-items-center gap-2">
                                        <div class="color-indigator-item bg-primary"></div>
                                        <div class="color-indigator-item bg-danger"></div>
                                        <div class="color-indigator-item bg-success"></div>
                                        <div class="color-indigator-item bg-warning"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <div class="d-flex gap-2 mt-3">
                                <input type="hidden" id="product_id">
                                <button type="submit" class="btn btn-white btn-ecomm" onclick="addToCart()">
                                    <i class="bx bxs-cart-add"></i>Add to Cart
                                </button>
                                <a href="javascript:;" class="btn btn-light btn-ecomm">
                                    <i class="bx bx-heart"></i>Add to Wishlist
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
</div>
<!--end quick view product-->