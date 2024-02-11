<footer class="footer">
    <div class="container">
        <div class="footer__container">
            <div class="footer__top">
                <a href="/" class="footer__logo">
                    <img src="{{asset("img/footer-logo.png")}}" alt="TeraLine">
                </a>
                <div class="footer__nav">
                    <ul class="footer__menu">
                        <li><a href="/catalog">Каталог</a></li>
                        <li><a href="/about">О компании</a></li>
                        <li><a href="/contacts">Контакты</a></li>
                        <li><a href="/contacts">Карта сайта</a></li>
                    </ul>
                    <ul class="footer__socials">
                        <li>
                            <span>{{setting('site.adress')}}</span>
                        </li>
                        <li>
                            <a href="tel:{{setting('site.number')}}" class="footer__phone">{{setting('site.number')}}</a>
                        </li>
                        <li>
                            <a href="{{setting('site.wa')}}" target="_blank">WhatsApp</a>
                        </li>
                        <li>
                            <a href="{{setting('site.instagram')}}" target="_blank">Instagram</a>
                        </li>
                    </ul>
                </div>
                <a href="/contacts" class="footer__feedback">Связаться с нами</a>
            </div>
            <div class="footer__bot">
                <span class="teraline">{{setting('site.copiright')}}</span>
                <a href="#" class="footer__politic" target="_blank">Политика конфиденциальности</a>
                <a href="https://astanacreative.kz" class="footer__ast" target="_blank">
                    Сайт разработан <span>Astana Creative</span>
                </a>
            </div>
        </div>
    </div>
</footer>