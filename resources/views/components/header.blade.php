<header class="header way way-header">
    <div class="container">
        <div class="header__container">
            <a href="/" class="header__logo">
                <picture>
                    <source srcset="{{asset("img/logo.png")}}" media="(min-width: 576px)" alt="TerraLine">
                    <img src="{{asset("img/mob-logo.png")}}" alt="TerraLine">
                </picture>
            </a>
            <a href="/catalog" class="header__catalog">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="8" height="8" fill="white"/>
                    <rect x="10" width="8" height="8" fill="white"/>
                    <rect x="10" y="10" width="8" height="8" fill="white"/>
                    <rect y="10" width="8" height="8" fill="white"/>
                </svg>                    
                Каталог
            </a>
            <div class="header__search">
                <form action="/search" method="GET">
                    <label for="">
                        <button type="submit">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4732 7.48649C13.4732 10.7928 10.7929 13.4731 7.48662 13.4731C4.1803 13.4731 1.5 10.7928 1.5 7.48649C1.5 4.18018 4.1803 1.49988 7.48662 1.49988C10.7929 1.49988 13.4732 4.18018 13.4732 7.48649ZM12.2234 13.2844C10.933 14.3399 9.28378 14.9731 7.48662 14.9731C3.35187 14.9731 0 11.6212 0 7.48649C0 3.35175 3.35187 -0.00012207 7.48662 -0.00012207C11.6214 -0.00012207 14.9732 3.35175 14.9732 7.48649C14.9732 9.28384 14.3399 10.9333 13.2841 12.2237L17.9998 16.9394L16.9391 18L12.2234 13.2844Z" fill="#565B62" fill-opacity="0.55"/>
                            </svg>                                
                        </button>
                        <input type="text" name="query" placeholder="Поиск">
                    </label>
                </form>
            </div>
            <div class="header__menu">
                <nav class="header__nav">
                    <ul class="header__nav-list">
                        <li class="header__nav-item">
                            <a href="{{route("about")}}" class="header__nav-link">О компании</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="/contacts" class="header__nav-link">Контакты</a>
                        </li>
                    </ul>
                </nav>
                <div class="header__socials">
                    <a href="{{setting('site.wa')}}" target="_blank">WhatsApp</a>
                    <a href="{{setting('site.instagram')}}" target="_blank">Instagram</a>
                </div>
                <div class="header__info">
                    <div class="header__info-street">{{setting('site.adress')}}</div>
                    <a href="tel:{{setting('site.number')}}" class="header__info-phone">{{setting('site.number')}}</a>
                </div>
                <a href="/cart" class="header__basket">
                <img src="{{asset("img/busket-icon.png")}}" alt="">
                    <div class="header__basket-span">
                        <span class="header__title">Корзина</span>
                        <span class="header__count"></span>
                    </div>
                    
                </a>
            </div>
            <div class="burger" id="menu-icon">
                <div class="burger__dot burger__dot--line burger__dot--left-top"></div>
                <div class="burger__dot burger__dot--aside"></div>
                <div class="burger__dot burger__dot--line burger__dot--right-top"></div>
                <div class="burger__dot burger__dot--aside"></div>
                <div class="burger__dot burger__dot--aside"></div>
                <div class="burger__dot burger__dot--aside"></div>
                <div class="burger__dot burger__dot--line burger__dot--left-bottom"></div>
                <div class="burger__dot burger__dot--aside"></div>
                <div class="burger__dot burger__dot--line burger__dot--right-bottom"></div>
            </div>
        </div>
    </div>
</header>