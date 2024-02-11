@extends('layout')

@section('content')
<main>
  <section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs__container">
            <ul class="breadcrumbs__list">
                <li class="breadcrumbs__list-item">
                    <a href="/" class="breadcrumbs__list-link">Главная</a>
                </li>
                <li class="breadcrumbs__list-item">
                    <a class="breadcrumbs__list-link active">{{$query}}</a>
                </li>
            </ul>
        </div>
    </div>
</section>

  <section class="products">
    <div class="container">
      <div class="products__container">
        <div class="main-title">
          <div class="main-title__container">
            <h1 class="products__title title-lg">{{$query}}</h1>
          </div>
        </div>
        <div class="products__wrapper">
          <div class="aside">
            <form class="filters">
              <div class="filters__container">
                <div class="filters__main-accordion">
                  <a href="javascript:;" class="js-filters__item-title">
                    Диапазон цен (₸)
                    <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.41668 2.70833L10 10.2917L17.5833 2.70833" stroke="#1DACCE" stroke-width="3" stroke-linecap="square" stroke-linejoin="bevel"/>
                    </svg>
                  </a>
                  <div class="js-filters__item-body">
                    <div class="filters__field">
                      <div class="price-slider">
                          <div class="price-slider__input">
                            <div class="price-slider__field">
                                <span>от</span>
                                <input type="number" value="0" name="price_start" id="filter-min" class="price-slider__input-min">
                            </div>
                            <div class="price-slider__separator">
                              <svg width="13" height="3" viewBox="0 0 13 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="0.5" y1="1.5" x2="12.5" y2="1.5" stroke="#565B62" stroke-width="2"/>
                                </svg>
                            </div>
                            <div class="price-slider__field">
                                <span>до</span>
                                <input type="number" value="{{$products->max('price')}}" data-max-price="{{$products->max('price')}}" name="price_end" id="filter-max" class="price-slider__input-max">
                            </div>
                        </div>
                          <div class="block-range">
                            <input type="text" id="rangeSlider" class="" tabindex="-1" readonly="">
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="products__catalog">
            <div class="products__cards">
              @forelse ($products as $product)
              @php
                              $imagePath = $product->image;
                              // Проверяем, является ли путь изображением JSON массивом
                              if (is_string($imagePath) && Str::startsWith($imagePath, '[')) {
                                  $imagePath = json_decode($imagePath, true)[0] ?? null;
                              }
                              @endphp
                  <div class="card product-card js-product" data-product-quantity="1" data-id="{{ $product->id }}" data-product-name="{{ $product->name }}" data-product-price="{{ $product->price }}" data-product-img="{{ asset('storage/' . $imagePath) }}" data-product-href="/product/{{ $product->category->slug }}/{{ $product->slug }}" data-product-articul="{{ $product->articul }}">
                      <div class="card__img product-card__img">
                          <a href="/product/{{ $product->category->slug }}/{{ $product->slug }}">
                              <img src="{{ asset('storage/' . $imagePath) }}" alt="">
                              <div class="card__label product-card__label">Бренд: <span>{{ $product->brand }}</span></div>
                          </a>
                      </div>
                      <div class="card__title product-card__title">{{ $product->name }}</div>
                      <div class="card__type">Тип: <span>{{ $product->type }}</span></div>
                      <div class="card__price">{{ $product->price }}<span>₸</span></div>
                      <a href="javascript:;" class="product-card__add-to-card add-to-cart js-buy">Добавить в корзину</a>
                  </div>
                  @empty
                  <h1>Товары не найдены.</h1>
              @endforelse

            </div>
            <div class="pagination">
              <div class="pagination__container">
                {{-- Проверяем, есть ли пагинация (больше одной страницы) --}}
                @if ($products->lastPage() > 1)
                    {{-- Генерация ссылок на страницы --}}
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $num => $link)
                        {{-- Проверяем, является ли страница текущей --}}
                        <a href="{{ $link }}" class="pagination__element{{ $products->currentPage() == $num ? ' active' : '' }}">
                            {{ $num }}
                        </a>
                    @endforeach
            
                    {{-- Если нужно добавить многоточие для длинной пагинации --}}
                    @if ($products->currentPage() < $products->lastPage() - 3)
                        <span class="pagination__more">...</span>
                        <a href="{{ $products->url($products->lastPage()) }}" class="pagination__element">{{ $products->lastPage() }}</a>
                    @endif
            
                    {{-- Ссылка на следующую страницу --}}
                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="pagination__element pagination__element_next">
                            <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 13.6667L7.83333 7.83333L2 2" stroke="#1DACCE" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"/>
                            </svg>
                        </a>
                    @endif
                @endif
            </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection