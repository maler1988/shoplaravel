<x-layout>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." />
                </div>
                <div class="col-md-6">
                    <div class="small mb-1">SKU: Артикул товара</div>
                    <h1 class="display-5 fw-bolder">{{ $product->name  }}</h1>
                    <div class="fs-5 mb-5">
                        <span>Цена в магазине:
                                @foreach($product->shops as $shop)
                                    {{ $shop->pivot->product_price_in_shop  }}
                                @endforeach
                        $</span>

                    </div>
                    <p class="lead">{{ $product->description  }}</p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>&nbsp
                        <a class="btn btn-info" href="{{ route('shops.show', ['shop'=>$shopid]) }}">Все товары магазина</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-layout>
