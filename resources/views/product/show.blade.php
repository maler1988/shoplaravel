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
                        <span>Базовая цена: {{ $product->base_price  }} $</span>
                        <div>Цены на товар в магазинах:</div><br/>
                        <table class="table">
                            <tr>
                                <th>Магазин</th>
                                <th>Цена в магазине</th>
                                <th>&nbsp;</th>
                            </tr>
                            @foreach($product->shops as $shop)
                                <tr>
                                    <td>{{ $shop->id  }}</td>
                                    <td>{{ $shop->pivot->product_price_in_shop  }}</td>
                                    <td><a class="btn btn-info" href="{{ route('show_in_shop', [$shop->id, $product->id]) }}">В магазин</a></td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                    <p class="lead">{{ $product->description  }}</p>
                </div>
            </div>
        </div>
    </section>


</x-layout>
