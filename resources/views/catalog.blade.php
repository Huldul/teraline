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
                    <a href="/about.html" class="breadcrumbs__list-link active">О компании</a>
                </li>
            </ul>
        </div>
    </div>
</section>
        <section class="catalog">
            <div class="container">
                <div class="catalog__container">
                    <div class="main-title">
                        <div class="main-title__container">
                            <h1 class="catalog__title title-lg">Каталог</h1>
                        </div>
                    </div>

                    <div class="catalog__wrapper">
                        @foreach ($categories as $category)
                        <div class="card category-card">
                            <div class="card__img category-card__img">
                                <img src="{{asset("storage/".$category->image)}}" alt="">
                                <div class="card__label">Товаров: <span>{{ $category->products_count }}</span></div>
                            </div>
                            <div class="card__title">{{ $category->name }}</div>
                            <a href="/category/{{$category->slug}}" class="card__link">Подробнее</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="feedback">
    <div class="container">
        <div class="feedback__container">
            <div class="feedback__block">
                <div class="feedback__info">
                    <h2 class="feedback__title title-sm">Оставьте заявку,<br> и мы с вами свяжемся</h2>
                    <div class="feedback__text">
                        <p>Мы - заботливая компания, поэтому мы всегда готовы ответить на все вопросы наших покупателей. Если у вас есть замечания или отзывы по качеству обслуживания, будем рады выслушать и сделать всё, что в наших силах, чтобы вы оставались довольны.</p>
                    </div>
                </div> 
                <form action="/sendApplication" method="POST">
                    @csrf
                    <div class="feedback__form">
                        <div class="feedback__col">
                            <span>Ваше имя</span>
                            <input required type="text" placeholder="mail@example.com">
                        </div>
                        <div class="feedback__col">
                            <span>Ваш номер</span>
                            <input required type="tel" placeholder="mail@example.com">
                        </div>
                        <div class="feedback__row">
                            <button type="submit" class="feedback__submit">Отправить</button>
                            <span class="policy">Нажимая на кнопку “Отправить” вы соглашаетесь с <a href="#" target="_blank">Политикой обработки персональных данных</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    </main>
    @endsection