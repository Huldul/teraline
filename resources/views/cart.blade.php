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
               <div class="cart__products-wrapper js-cart">
               </div>
                <form class="checkout" method="POST" action="/sendOrder">
                    @csrf
                    <div class="checkout__title">Итого: <span class="js-cart-total-summa">864 479</span></div>
                    <div class="checkout__desc">Заполните поля ниже, и наш менеджер свяжется с вами для оформления заказа</div>
                    <div class="checkout__row">
                        <label for="checkout_name">Ваше имя<span class="required">*</span></label>
                        <input required type="text" name="checkout_name" id="checkout_name" placeholder="Зариночка Айзакова" required>
                    </div>
                    <div class="checkout__row">
                        <label for="checkout_phone">Ваш телефон<span class="required">*</span></label>
                        <input required type="tel" name="checkout_phone" id="checkout_phone" placeholder="+7 (705) 777 77 77" required>
                    </div>
                    <div class="checkout__row">
                        <label for="checkout_delivery">Ваш адрес доставки<span class="required">*</span></label>
                        <input required type="text" name="checkout_delivery" id="checkout_delivery" placeholder="Казахстан, Астана, ул. Хади Такташа, 23, кв. 56" required>
                    </div>
                    <div class="checkout__row">
                        <label for="checkout_comment">Комментарий к заказу</label>
                        <textarea type="text" name="checkout_comment" id="checkout_comment" placeholder="Не звонить в дверь"></textarea>
                    </div>
                    <button class="checkout__submit" type="submit">Отправить</button>
                    <span class="policy">Нажимая на кнопку “Отправить” вы соглашаетесь с <a href="#" target="_blank">Политикой обработки персональных данных</a></span>
                    <textarea required class="textarea-table" id="textarea" name="data" style="display: none;"></textarea>
                </form>
                <div class="empty">
                    <div class="cart__success-wrapper">
                        <div class="cart__success-alert">
                            В вашей корзине пока ничего нет...
                        </div>
                        <div class="cart__message">
                            Это легко исправить, переходите в каталог и начинайте покупки!
                        </div>
                        <a href="/catalog" class="cart__to-catalog">В каталог</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection