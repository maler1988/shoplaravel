<x-layout>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @if(count($products) > 0)
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
                                    Base price: {{ $product->base_price  }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-success add_to_compare" href="#" data-id="{{ $product->id  }}">Сравнить</a>
                                    <a class="btn btn-info" href="/products/{{ $product->id  }}">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
    </div>
</x-layout>
