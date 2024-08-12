<x-layout>
    <div class="row">
        <div class="col">
            <h1>Список магазинов</h1>
        </div>
    </div>
    <div class="row mt-5">
        @foreach($shops as $shop)
            <div class="col-12 mb-5">
                <div class="name"><h3>{{ $shop->name }}</h3></div>
                <div class="description">{{ $shop->description }}</div>
                <div class="product_cnt">Количество товаров: {{ count($shop->products) }}</div>
                <hr>
                <div class="actions">
                    <a href="{{ route('shops.show', ['shop'=>$shop->id]) }}" class="btn btn-success">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
