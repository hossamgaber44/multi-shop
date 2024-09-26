@extends('user.layouts.userLayout')
@section('content')
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div id="filterForm" class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                        price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form id="priceForm">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price[0]" value="all" class="priceInput custom-control-input"
                                checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price[1]" value="100" class="priceInput custom-control-input"
                                id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price[2]" value="200" class="priceInput custom-control-input"
                                id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price[3]" value="300" class="priceInput custom-control-input"
                                id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="price[4]" value="400" class="priceInput custom-control-input"
                                id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" name="price[5]" value="500" class="priceInput custom-control-input"
                                id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->

                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                        color</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form id="colorForm">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" value="all" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="color-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" value="Black" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" value="White" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" value="Red" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" value="Blue" class="custom-control-input" id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" value="Green" class="custom-control-input" id="color-5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                        size</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form id="sizeForm">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" value="all" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" value="XS" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" value="S" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" value="M" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" value="L" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" value="XL" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                @if (session()->has('success'))
                    <div style="width: 80%; margin:2px auto 12px;" class="alert alert-success" >{{ session('success') }}</div>
                @endif
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                    </div>
                </div>
                <div id="old_product"  class="row pb-3">
                    {{--  start product  --}}
                    {{-- {{ dd($allProduct) }} --}}
                    @foreach ($allProduct as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('images/product' . '/' . $product->img) }}"
                                        alt="">
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square"
                                            href="{{ route('shop.shopDetails', $product->id) }}"><i
                                                class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square"
                                            href="{{ route('Favorite.addToFavorite', $product->id) }}"><i
                                                class="far fa-heart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i
                                                class="fa fa-sync-alt"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i
                                                class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate"
                                        href="{{ route('shop.shopDetails', $product->id) }}">{{ $product->name }}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5>${{ $product->price - $product->price * ($product->descount / 100) }}</h5>
                                        <h6 class="text-muted ml-2"><del>${{ $product->price }}</del></h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5> {{ $product->Category->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{--  end product  --}}

                    {{-- {!! $allProduct->links() !!} --}}
                    {{--  start pagination  --}}
                    {{-- <div class="col-12">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div> --}}
                    {{--  end pagination  --}}
                </div>
                <div id='product_Search' class="row pb-3">
                    {{--  start product  --}}
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function(e) {
                var value = $(this).val();
                var csrf = $('#csrf').val();
                if (value) {
                    $('#old_product').hide();
                    $('#product_Search').show();
                } else {
                    $('#old_product').show();
                    $('#product_Search').hide();
                }
                //
                jQuery.ajax({
                    url: "/search",
                    type: 'post',
                    datatype: 'html',
                    // cache: false,
                    data: {
                        value: value,
                        __token: csrf,
                    },
                    success: function(data) {
                        console.log(data);
                        $('#product_Search').html(data);
                    }
                });
            });
            // add to cart
            // $('#searchInput').on('click', function(e) {
            //     var value = $(this).val();
            //     var csrf = $('#csrf').val();
            //     if (value) {
            //         $('#old_product').hide();
            //         $('#product_Search').show();
            //     } else {
            //         $('#old_product').show();
            //         $('#product_Search').hide();
            //     }
            //     //
            //     jQuery.ajax({
            //         url: "/search",
            //         type: 'post',
            //         datatype: 'html',
            //         // cache: false,
            //         data: {
            //             value: value,
            //             __token: csrf,
            //         },
            //         success: function(data) {
            //             console.log(data);
            //             $('#product_Search').html(data);
            //         }
            //     });
            // });
        })
    </script>
@endsection
