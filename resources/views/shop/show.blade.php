<x-layout>

    <div class="row mb-5">
        <div class="col">
            <h1>Магазин {{ $shop->name }}</h1>
            <div class="description">{{  $shop->description }}</div>
            <hr>
            <a href="{{ route('shops.index') }}" class="btn btn-info">Список магазинов</a>
            <a href="{{ route('shops.edit', [$shop->id]) }}" class="btn btn-warning">Редактировать</a>
        </div>
    </div>


    @if(count($shop->products) > 0)
        <div class="row mb-5">
            <div class="col-12">
                <h2>Товары магазина {{ $shop->name }}</h2>
            </div>
        </div>
        <div class="row">
            @foreach($shop->products as $product)
                <div class="col-3 mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/300x200/dee2e6/6c757d.jpg" alt="{{ $product->name  }}" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $product->name  }}</h5>
                                <div class="price">{{ $product->pivot->product_price_in_shop }} $</div>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto" href="{{ route('products.show', [$product->id]) }}">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</x-layout>
