@extends('layout')

@section('content')
    <main>
        <section class="hero">
            <div class="container">
                <div class="hero__container" style="background: url('{{ asset(str_replace('\\', '/', 'storage/'.$page->head_image)) }}') top right / contain no-repeat, #1DACCE">

                    <div class="hero__info">
                        @foreach ($promotions as $promotion)
                        <div class="hero__info-item">
                            <div class="hero__info-title">{{$promotion->title}}</div>
                            <div class="hero__info-text">{{$promotion->main}}</div>
                            <a href="{{$promotion->url}}" class="hero__info-link">{{$promotion->link_title}}</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="hero__arrows">
                        <a href="javascript:;" class="hero__arrow prev">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="54" height="54" rx="27" transform="matrix(1 1.74846e-07 1.74846e-07 -1 -3.8147e-06 54)" fill="white"/>
                                <path d="M30.5 20L23.5 27L30.5 34" stroke="#1DACCE" stroke-width="3" stroke-linecap="square" stroke-linejoin="bevel"/>
                            </svg>                                                               
                        </a>
                        <a href="javascript:;" class="hero__arrow next">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="54" height="54" rx="27" transform="matrix(-1 0 0 1 54 0)" fill="white"/>
                                <path d="M23.5 34L30.5 27L23.5 20" stroke="#1DACCE" stroke-width="3" stroke-linecap="square" stroke-linejoin="bevel"/>
                            </svg>                                
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="popular">
            <div class="container">
                <div class="popular__container content">
                    <div class="popular__header">
                        <h2 class="popular__title title-sm">Популярные категории</h2>
                        <a href="/catalog" class="popular__link">Перейти в каталог</a>
                    </div>
                    <div class="popular__wrapper">
                        <a href="javascript:;" class="slider-arrow prev">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="54" height="54" rx="27" transform="matrix(1 1.74846e-07 1.74846e-07 -1 -3.8147e-06 54)" fill="white"></rect>
                                <path d="M30.5 20L23.5 27L30.5 34" stroke="#1DACCE" stroke-width="3" stroke-linecap="square" stroke-linejoin="bevel"></path>
                            </svg>                                
                        </a>
                        <div class="popular__slider">
                            @foreach ($categories as $category)
                            <div class="card">
                                <div class="card__img">
                                    <img src="{{asset("storage/".$category->image)}}" alt="">
                                </div>
                                <div class="card__title">{{$category->name}}</div>
                                <a href="/category/{{$category->slug}}" class="card__link">Подробнее</a>
                            </div>
                            @endforeach
                        </div>
                        <a href="javascript:;" class="slider-arrow next">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="54" height="54" rx="27" transform="matrix(-1 0 0 1 54 0)" fill="white"></rect>
                                <path d="M23.5 34L30.5 27L23.5 20" stroke="#1DACCE" stroke-width="3" stroke-linecap="square" stroke-linejoin="bevel"></path>
                            </svg>                                 
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="stock">
            <div class="container">
                <div class="stock__container">
                    <h2 class="stock__title title-sm">{{$page->prom_title}}</h2>
                    <div class="stock__text">
                        {{$page->prom_main}}</div>
                    <a href="/catalog" class="stock__link">В каталог</a>
                </div>
            </div>
        </section>
        <section class="faq">
            <div class="container">
                <div class="faq__container content">
                    <div class="faq__left">
                        <h2 class="faq__title title-sm">Часто задаваемые вопросы</h2>
                        <div class="quest__main-accordeons">
                            @foreach ($questions as $question)
                            <div class="quest__main-accordeon">
                                <a href="javascript:;" class="quest__main-title js-accordeons__item-title">
                                    {{$question->question}}										
                                    <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.41668 2.70833L10 10.2917L17.5833 2.70833" stroke="#1DACCE" stroke-width="3" stroke-linecap="square" stroke-linejoin="bevel"/>
                                    </svg>                                                                           
                                </a>
                                <div class="quest__main-body js-accordeons__item-body">
                                    <p>{{$question->answer}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="faq__right">
                        <div class="faq__deliv">
                            {!!$page->faq_info!!}
                            {{-- <div class="faq__deliv-title title-sm">Доставка и оплата</div>
                            <div class="faq__deliv-text">
                                <p>Мы доставляем товары во все города Казахстана для частных лиц и организаций.</p>
                            </div>
                            <ul class="faq__deliv-list">
                                <li>
                                    <span>Способы оплаты заказа:</span>
                                    <p>наличными (курьеру) или квитанцией (выставляем счёт на оплату).</p>
                                </li>
                                <li>
                                    <span>Доставка транспортными компаниями: </span>
                                    <p>Курьерская компания EXLINE,Компания «Марал-Сай»,DPD Казахстан или DHL Казахстан.</p>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="partner">
            <div class="container">
                <div class="partner__container">
                    <h2 class="partner__title title-sm">Партнеры</h2>
                    <div class="partner__items marquee" data-duplicated="true">
                        @foreach ($partners as $partner)
                        <a href="{{$partner->url}}" target="_blank"><div class="partner__item">
                            <img src="{{asset("storage/".$partner->image)}}" alt="">
                        </div></a>
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
    <!-- loader form -->
    @endsection