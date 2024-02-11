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
                    <a href="/contacts" class="breadcrumbs__list-link active">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</section>
    <section class="contacts">
        <div class="container">
            <div class="contacts__container">
                <div class="contacts__list-wrapper">
                    <div class="main-title">
                        <div class="main-title__container">
                            <h1 class="contacts__title title-lg">Контакты</h1>
                        </div>
                    </div>
                    <div class="contacts__list">
                        <div class="contacts__row">
                            <span class="contacts__list-title">Адрес</span>
                            <div class="contacts__item">{{setting('site.adress')}}</div>
                        </div>
                        <div class="contacts__row">
                            <span class="contacts__list-title">Почта</span>
                            <div class="contacts__item">{{setting('site.email')}}</div>
                        </div>
                        <div class="contacts__row">
                            <span class="contacts__list-title">Телефон</span>
                            <div class="contacts__item"><a href="tel:+77172978308">{{setting('site.number')}}</a></div>
                        </div>
                        <div class="contacts__row">
                            <span class="contacts__list-title">Соц сети</span>
                            <div class="contacts__item"><a href="{{setting('site.wa')}}">Whatsapp</a> <a href="{{setting('site.instagram')}}">Instagram</a></div>
                        </div>
                    </div>
                </div>
                <div class="contacts__map">
                    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Abdabc3416166621693413da51e5fac06aa0cdea70ef1a142e91f71f43c107d75&amp;source=constructor" width="100%" height="500" frameborder="0"></iframe>
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
                        <img class="feedback__logo-sm" src="img/logo-sm.svg" alt="">
                    </div>
                    <form action="">
                        <div class="feedback__form">
                            <div class="feedback__col">
                                <span>Ваше имя<span class="feedback__required">*</span></span>
                                <input required type="text" placeholder="mail@example.com">
                            </div>
                            <div class="feedback__col">
                                <span>Ваш номер<span class="feedback__required">*</span></span>
                                <input required type="tel" placeholder="mail@example.com">
                            </div>
                            <div class="feedback__row feedback__row-textarea">
                                <span>Ваш вопрос</span>
                                <textarea required placeholder="Вы сможете доставить заказ в Беларусь?" class="feedback__textarea"></textarea>
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