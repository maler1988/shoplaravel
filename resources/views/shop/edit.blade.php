<x-layout>

    <div class="row mb-5">
        <div class="col">
            <h1>Редактирование магазина {{ $shop->name }}</h1>
            <form action="{{ route('shops.update', [ $shop->id ]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Наименование магазина</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ $shop->name }}">
                    @error('name')
                        {{ $message }}
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Описание магазина</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $shop->description }}</textarea>
                    @error('description')
                        {{ $message }}
                    @endif
                </div>

                <div class="products_table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Наименование товара</th>
                                <th>Цена в магазине</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)

                                @if($product->id > 0 && array_key_exists($product->id, $products_in_shop))
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <input type="number" name="price[]" min="0" value="{{ $products_in_shop[$product->id]['price'] }}">
                                            <input type="hidden" name="product[]" value="{{ $product->id  }}">
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <input type="number" name="price[]" min="0" value="0">
                                            <input type="hidden" name="product[]" value="{{ $product->id  }}">
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <hr>

                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="{{ route('shops.show', [$shop->id]) }}" class="btn btn-warning">Отмена</a>
            </form>
        </div>
    </div>

</x-layout>
