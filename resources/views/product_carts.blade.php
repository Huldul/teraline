@if ($products->count())
    @foreach ($products as $product)
        <div class="card product-card">
            <div class="card__img">
                <a href="/product/{{ $product->slug }}">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                </a>
            </div>
            <div class="card__info">
                <div class="card__title">{{ $product->name }}</div>
                <div class="card__price">{{ $product->price }}₸</div>
                <a href="/product/{{ $product->slug }}" class="btn btn-primary">Подробнее</a>
            </div>
        </div>
    @endforeach
@else
    <p>Продукты по заданным критериям не найдены.</p>
@endif
