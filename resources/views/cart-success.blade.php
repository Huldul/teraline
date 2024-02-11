@extends('layout')

@section('content')

<main>
    <section class="cart">
        <div class="container">
            <div class="main-title">
                <div class="main-title__container">
                    <h1 class="cart__title title-lg">Корзина</h1>
                </div>
            </div>
            <div class="cart__container">
                <div class="cart__success-wrapper">
                    <div class="cart__success-alert">
                        Спасибо за заказ!
                    </div>
                    <div class="cart__message">
                        Наш менеджер свяжется с вами в течении 15 минут
                    </div>
                    <a href="/catalog" class="cart__to-catalog">В каталог</a>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- loader form -->
@endsection