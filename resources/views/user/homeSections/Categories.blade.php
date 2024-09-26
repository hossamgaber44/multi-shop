<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
            class="bg-secondary pr-3">Categories</span></h2>
    <div class="row px-xl-5 pb-3">
        @foreach ($categories as $cat)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="{{ route('shop.category.product',$cat->id) }}">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="{{ asset('images/category'.'/'.  $cat->img) }}" alt="image not found ">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>{{ $cat->name }}</h6>
                            <small class="text-body">{{ $cat->Product->count() }} Products</small>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</div>
