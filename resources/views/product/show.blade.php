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

        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                @if(count($reveiws) > 0)
                    <div class="col-md-12">
                        <h2>Отзывы:</h2>
                        @foreach($reveiws as $review)
                            <div class="review mb-3 mt-3">
                                <!-- <b>Автор:</b> -->
                                <b>Оценка:</b> {{ $review->estimation }}<br/>
                                <b>Текст отзыва:</b> {{ $review->review }}
                            </div>
                            <hr>
                        @endforeach
                    </div>
                @endif
                <div class="col-md-12">
                    <h2>Добавить отзыв</h2>
                    <form method="post" action="{{ route('reviews.store') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="mb-3">
                            <label for="estimation" class="form-label">Оценка</label>
                            <select id="estimation" name="estimation" class="form-select" aria-label="Ваша оценка">
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </select>
                            @error('estimation')
                                {{ $message }}
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="review" class="form-label">Текст отзыва</label>
                            <textarea class="form-control" id="review" rows="3" name="review" ></textarea>
                            @error('review')
                                {{ $message }}
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Оставить отзыв</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


</x-layout>
