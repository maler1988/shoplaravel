<x-layout>

    <section class="py-5">
        <h2 class="fw-bolder mb-4">Shops</h2>
        <div class="row mt-5">
            @foreach($shops as $shop)
                <div class="col mb-5">
                    <div class="name"><h3>{{ $shop->name }}</h3></div>
                    <div class="description">{{ $shop->description }}</div>
                    <div class="product_cnt"><i>Количество товаров: {{ count($shop->products) }}</i></div>
                    <hr>
                    <div class="actions">
                        <a href="{{ route('shops.show', ['shop'=>$shop->id]) }}" class="btn btn-success">Подробнее</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="py-5">
            <h2 class="fw-bolder mb-4">Latest products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @foreach($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->name  }}</h5>
                                    <!-- Product price-->
                                    {{ $product->base_price  }} $
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('products.show', $product->id)  }}">View options</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </section>

</x-layout>
