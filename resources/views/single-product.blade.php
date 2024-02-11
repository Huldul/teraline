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
    <section class="single-product">
        <div class="container">
            <div class="single-product__container">
                <div class="main-title">
                    <div class="main-title__container">
                        <h1 class="single-product__title title-lg">{{$product->name}}</h1>
                    </div>
                </div>
                <form class="single-product-card">
                    <div class="single-product-card__container">
                        <div class="single-product-card__gallery">
                            <div class="single-product-card__zoom">
                                <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="54" height="54" rx="6" fill="white"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M33.1016 24.5508C33.1016 29.2732 29.2732 33.1016 24.5508 33.1016C19.8283 33.1016 16 29.2732 16 24.5508C16 19.8283 19.8283 16 24.5508 16C29.2732 16 33.1016 19.8283 33.1016 24.5508ZM31.5887 33.7106C29.6401 35.21 27.1996 36.1016 24.5508 36.1016C18.1715 36.1016 13 30.9301 13 24.5508C13 18.1715 18.1715 13 24.5508 13C30.9301 13 36.1016 18.1715 36.1016 24.5508C36.1016 27.1998 35.2098 29.6406 33.7101 31.5893L41.0135 38.8928L38.8922 41.0141L31.5887 33.7106Z" fill="#1DACCE"/>
                                </svg>
                            </div>
                            <div class="single-product-card__swiper swiper">
                                <div class="single-product-card__swiper-wrapper swiper-wrapper">
                                    @foreach ($imagesPath as $imagePath)
                                    <div class="single-product-card__slide swiper-slide" data-fancybox="gallery" data-src="{{asset("storage/".$imagePath)}}"><img src="{{asset("storage/".$imagePath)}}" alt=""></div>
                                    
                                    @endforeach
                                </div>
                            </div>
                            <div class="single-product-card__swiper_s_sm swiper">
                                <div class="single-product-card__swiper-wrapper swiper-wrapper">
                                    @foreach ($imagesPath as $imagePath)
                                    <div class="single-product-card__slide swiper-slide"><img src="{{asset("storage/".$imagePath)}}" alt=""></div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="single-product-card__short-desc js-product" 
                            data-product-quantity="1" 
                            data-id="{{ $product->id }}" 
                            data-product-name="{{ $product->name }}" 
                            data-product-price="{{ $product->price }}" 
                            data-product-img="{{ asset('storage/' . $imagePath[0]) }}" 
                            data-product-href="/product/{{ $category->slug }}/{{ $product->slug }}"
                            data-product-articul="{{ $product->articul }}">

                            <div class="single-product-card__title">{{$product->name}}</div>
                            <div class="single-product-card__text">
                                {!!$product->about!!}
                            </div>
                            <div class="single-product-card__short-char">
                                <div class="single-product-card__type">
                                    Тип:
                                    <span>{{$product->type}}</span>
                                </div>
                                <div class="single-product-card__label">
                                    Бренд:
                                    <span>{{$product->brand}}</span>
                                </div>
                            </div>
                            
                            <div class="single-product-card__quantity">
                                <div class="single-product-card__price"><span>{{$product->price}}</span> ₸</div>
                                <div class="single-product-card__counter-container">
                                    <div class="single-product-card__counter-min decrease">
                                        <svg style="pointer-events: none;" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.4">
                                                <line x1="3" y1="13.0774" x2="21" y2="13.0774" stroke="#565B62" stroke-width="2.34512"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <span class="single-product-card__counter">1</span>
                                    <div class="single-product-card__counter-max increase">
                                        <svg style="pointer-events: none;" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.5 13.8V11.4H19.05V13.8H4.5ZM10.5 5.25H13.05V19.95H10.5V5.25Z" fill="#565B62"/>
                                        </svg>
                                    </div>
                                </div>

                            </div>
                            <div class="single-product-card__buttons">
                                <a href="javascript:;" class="single-product-card__add-to-cart add-to-cart js-buy">Добавить в корзину</a>
                                <div class="single-product-card__socials">
                                    <span>Поделиться в социальных сетях</span>
                                    <div class="single-product-card__socials-icons">
                                        <div class="single-product-card__social-icon"><a href="">
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_119_2109)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 32H8C5.87827 32 3.84344 31.1571 2.34315 29.6569C0.842855 28.1566 0 26.1217 0 24V8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0L24 0C26.1217 0 28.1566 0.842855 29.6569 2.34315C31.1571 3.84344 32 5.87827 32 8V24C32 26.1217 31.1571 28.1566 29.6569 29.6569C28.1566 31.1571 26.1217 32 24 32Z" fill="#4682C3"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 9H24C25.1546 9.00145 26.2655 8.55905 27.1031 7.76433C27.9406 6.96961 28.4407 5.88336 28.4997 4.73029C28.5588 3.57722 28.1725 2.44555 27.4205 1.56938C26.6686 0.693211 25.6087 0.139576 24.46 0.023C24.307 0.0145 24.1555 0 24 0H8C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8L0 24C0 20.0218 1.58035 16.2064 4.3934 13.3934C7.20644 10.5804 11.0218 9 15 9Z" fill="#5F9BDC"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 16C22.4178 16 20.871 16.4692 19.5554 17.3482C18.2399 18.2273 17.2145 19.4767 16.609 20.9385C16.0035 22.4003 15.845 24.0089 16.1537 25.5607C16.4624 27.1126 17.2243 28.538 18.3431 29.6569C19.462 30.7757 20.8874 31.5376 22.4393 31.8463C23.9911 32.155 25.5997 31.9965 27.0615 31.391C28.5233 30.7855 29.7727 29.7602 30.6518 28.4446C31.5308 27.129 32 25.5823 32 24V8C32 10.1217 31.1572 12.1566 29.6569 13.6569C28.1566 15.1571 26.1217 16 24 16Z" fill="#2D69AA"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M26.559 10.902C26.721 10.393 26.559 10.0235 25.8415 10.0235H23.459C23.237 10.0112 23.0168 10.0694 22.8299 10.1898C22.643 10.3103 22.499 10.4867 22.4185 10.694C21.6734 12.4509 20.6842 14.094 19.48 15.5745C18.925 16.1295 18.671 16.315 18.37 16.315C18.208 16.315 18 16.1295 18 15.6205V10.879C18 10.2775 17.8145 10 17.306 10H13.653C13.5769 9.99631 13.5009 10.0078 13.4293 10.0338C13.3577 10.0598 13.2919 10.0998 13.236 10.1515C13.18 10.2031 13.1348 10.2654 13.1032 10.3347C13.0715 10.404 13.0539 10.4789 13.0515 10.555C13.0515 11.1335 13.9075 11.272 14 12.8915V16.407C14 17.1705 13.861 17.3095 13.5605 17.3095C12.7505 17.3095 10.459 14.3255 9.279 10.925C9.0475 10.254 8.817 10 8.215 10H5.8095C5.1155 10 5 10.3235 5 10.6705C5 12.1985 9.319 22.9765 16.2885 22.9765C17.8145 22.9765 18 22.63 18 22.0515V19.9005C18 19.206 18.139 19.0905 18.6245 19.0905C19.865 19.0905 22.11 21.8615 22.69 22.442C22.8239 22.611 22.9932 22.7485 23.186 22.845C23.3789 22.9414 23.5905 22.9943 23.806 23H26.1885C26.8825 23 27.124 22.5785 26.9395 21.908C26.5105 20.528 23.526 17.689 23.367 17.4715C23.0195 17.0085 23.112 16.824 23.367 16.407C23.3435 16.407 26.258 12.29 26.559 10.902Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_119_2109">
                                                        <rect width="32" height="32" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a></div>
                                        <div class="single-product-card__social-icon"><a href="">
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_119_2116)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 32H8C5.87827 32 3.84344 31.1571 2.34315 29.6569C0.842855 28.1566 0 26.1217 0 24V8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0L24 0C26.1217 0 28.1566 0.842855 29.6569 2.34315C31.1571 3.84344 32 5.87827 32 8V24C32 26.1217 31.1571 28.1566 29.6569 29.6569C28.1566 31.1571 26.1217 32 24 32Z" fill="#00D264"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 9H24C25.1546 9.00145 26.2655 8.55905 27.1031 7.76433C27.9406 6.96961 28.4407 5.88336 28.4997 4.73029C28.5588 3.57722 28.1725 2.44555 27.4205 1.56938C26.6686 0.693211 25.6087 0.139576 24.46 0.023C24.307 0.0145 24.1555 0 24 0H8C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8L0 24C0 20.0218 1.58035 16.2064 4.3934 13.3934C7.20644 10.5804 11.0218 9 15 9Z" fill="#00EB78"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 16C22.4178 16 20.871 16.4692 19.5554 17.3482C18.2399 18.2273 17.2145 19.4767 16.609 20.9385C16.0035 22.4003 15.845 24.0089 16.1537 25.5607C16.4624 27.1126 17.2243 28.538 18.3431 29.6569C19.462 30.7757 20.8874 31.5376 22.4393 31.8463C23.9911 32.155 25.5997 31.9965 27.0615 31.391C28.5233 30.7855 29.7727 29.7602 30.6518 28.4446C31.5308 27.129 32 25.5823 32 24V8C32 10.1217 31.1572 12.1566 29.6569 13.6569C28.1566 15.1571 26.1217 16 24 16Z" fill="#00B950"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.8366 23.5465C10.9697 23.5087 11.1092 23.4988 11.2463 23.5176C11.3834 23.5363 11.5151 23.5833 11.6331 23.6555C13.6211 24.8399 15.9734 25.2572 18.2475 24.8288C20.5216 24.4004 22.5609 23.1558 23.9817 21.3293C25.4025 19.5027 26.107 17.2199 25.9626 14.9103C25.8183 12.6007 24.835 10.4234 23.1978 8.78795C21.5606 7.15249 19.3823 6.17157 17.0725 6.02967C14.7628 5.88778 12.4808 6.59468 10.6557 8.01744C8.83061 9.44019 7.58825 11.4808 7.16228 13.7553C6.7363 16.0299 7.15605 18.3817 8.3426 20.3685C8.41454 20.4862 8.46129 20.6175 8.47988 20.7542C8.49847 20.8908 8.4885 21.0299 8.4506 21.1625C8.1721 22.148 7.5001 24.5 7.5001 24.5L10.8366 23.5465ZM6.6096 21.367C5.18001 18.9572 4.67932 16.1084 5.20155 13.3555C5.72378 10.6026 7.233 8.13512 9.44581 6.41628C11.6586 4.69744 14.4228 3.84552 17.2193 4.02051C20.0158 4.1955 22.6522 5.38535 24.6335 7.36663C26.6147 9.34791 27.8046 11.9843 27.9796 14.7808C28.1546 17.5773 27.3027 20.3415 25.5838 22.5543C23.865 24.7671 21.3974 26.2763 18.6446 26.7985C15.8917 27.3208 13.0429 26.8201 10.6331 25.3905C10.6331 25.3905 7.4446 26.3015 5.8656 26.753C5.77981 26.7774 5.68906 26.7785 5.60272 26.7561C5.51638 26.7337 5.4376 26.6886 5.37453 26.6256C5.31146 26.5625 5.26639 26.4837 5.24398 26.3974C5.22158 26.311 5.22265 26.2203 5.2471 26.1345L6.6096 21.367Z" fill="white"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9907 12.393C11.1462 14.6319 12.1017 16.7402 13.6828 18.333C15.2639 19.9258 17.365 20.8969 19.6027 21.069H19.6037C19.961 21.0967 20.32 21.0466 20.6561 20.9223C20.9922 20.7981 21.2974 20.6025 21.5507 20.349L21.8997 20C22.0645 19.8351 22.1571 19.6116 22.1572 19.3785V18.6375C22.1572 18.5446 22.1313 18.4535 22.0825 18.3745C22.0337 18.2955 21.9638 18.2316 21.8807 18.19L19.6512 17.0755C19.5573 17.0285 19.451 17.0122 19.3474 17.029C19.2437 17.0458 19.148 17.0948 19.0737 17.169L18.1037 18.139C18.0455 18.1972 17.9739 18.2402 17.8951 18.2641C17.8164 18.288 17.7329 18.2921 17.6522 18.276L17.6477 18.275C16.6797 18.0814 15.7907 17.6057 15.0926 16.9076C14.3946 16.2096 13.9188 15.3205 13.7252 14.3525L13.7242 14.348C13.7082 14.2673 13.7123 14.1839 13.7362 14.1051C13.7601 14.0264 13.803 13.9547 13.8612 13.8965L14.8312 12.9265C14.9055 12.8523 14.9545 12.7565 14.9712 12.6529C14.988 12.5492 14.9718 12.4429 14.9247 12.349L13.8102 10.1195C13.7686 10.0364 13.7048 9.96657 13.6257 9.91774C13.5467 9.8689 13.4556 9.84303 13.3627 9.84302H12.7327C12.5831 9.84306 12.4352 9.8745 12.2985 9.9353C12.1618 9.99611 12.0394 10.0849 11.9392 10.196L11.6072 10.565C11.3889 10.8073 11.2216 11.091 11.1152 11.3993C11.0089 11.7076 10.9657 12.0342 10.9882 12.3595L10.9907 12.393Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_119_2116">
                                                        <rect width="32" height="32" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a></div>
                                        <div class="single-product-card__social-icon"><a href="">
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_119_2125)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 32H8C5.87827 32 3.84344 31.1571 2.34315 29.6569C0.842855 28.1566 0 26.1217 0 24V8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0L24 0C26.1217 0 28.1566 0.842855 29.6569 2.34315C31.1571 3.84344 32 5.87827 32 8V24C32 26.1217 31.1571 28.1566 29.6569 29.6569C28.1566 31.1571 26.1217 32 24 32Z" fill="#199BDF"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 9H24C25.1546 9.00145 26.2656 8.55905 27.1031 7.76433C27.9406 6.96961 28.4407 5.88336 28.4998 4.73029C28.5588 3.57722 28.1725 2.44555 27.4205 1.56938C26.6686 0.693211 25.6087 0.139576 24.46 0.023C24.307 0.0145 24.1555 0 24 0H8C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8L0 24C0 20.0218 1.58035 16.2064 4.3934 13.3934C7.20644 10.5804 11.0218 9 15 9Z" fill="#32B4FF"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 16C22.4178 16 20.871 16.4692 19.5554 17.3482C18.2399 18.2273 17.2145 19.4767 16.609 20.9385C16.0035 22.4003 15.845 24.0089 16.1537 25.5607C16.4624 27.1126 17.2243 28.538 18.3431 29.6569C19.462 30.7757 20.8874 31.5376 22.4393 31.8463C23.9911 32.155 25.5997 31.9965 27.0615 31.391C28.5233 30.7855 29.7727 29.7602 30.6518 28.4446C31.5308 27.129 32 25.5823 32 24V8C32 10.1217 31.1572 12.1566 29.6569 13.6569C28.1566 15.1571 26.1217 16 24 16Z" fill="#0082BE"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.5398 8.51599C22.7856 8.41451 23.054 8.38019 23.3174 8.41656C23.5808 8.45293 23.8298 8.55867 24.0389 8.72295C24.248 8.88723 24.4097 9.10415 24.5074 9.35148C24.6051 9.59881 24.6352 9.86766 24.5948 10.1305L22.3768 24.55C22.3376 24.8051 22.2332 25.0457 22.0738 25.2487C21.9143 25.4516 21.7052 25.61 21.4667 25.7085C21.2281 25.807 20.9682 25.8422 20.712 25.8109C20.4558 25.7795 20.2121 25.6826 20.0043 25.5295L13.4633 20.71C13.3455 20.6231 13.2482 20.5114 13.1783 20.3828C13.1083 20.2542 13.0675 20.1118 13.0586 19.9657C13.0498 19.8196 13.0731 19.6733 13.1269 19.5372C13.1808 19.4011 13.2639 19.2785 13.3703 19.178L19.4738 13.4135C19.5193 13.3706 19.547 13.3123 19.5516 13.2499C19.5562 13.1876 19.5372 13.1259 19.4985 13.0768C19.4598 13.0277 19.4041 12.995 19.3425 12.9849C19.2808 12.9749 19.2176 12.9883 19.1653 13.0225L11.0963 18.285C10.7505 18.5105 10.3618 18.6623 9.95454 18.7307C9.54734 18.7991 9.13039 18.7827 8.72982 18.6825L4.94382 17.736C4.73959 17.685 4.55666 17.5709 4.42108 17.4098C4.2855 17.2488 4.20419 17.0491 4.18874 16.8392C4.17328 16.6293 4.22446 16.4198 4.33499 16.2407C4.44552 16.0615 4.60976 15.9218 4.80432 15.8415L22.5398 8.51599Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_119_2125">
                                                        <rect width="32" height="32" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a></div>
                                        <div class="single-product-card__social-icon"><a href="">
                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_119_2132)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16 32H8C5.87827 32 3.84344 31.1571 2.34315 29.6569C0.842855 28.1566 0 26.1217 0 24V8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0L24 0C26.1217 0 28.1566 0.842855 29.6569 2.34315C31.1571 3.84344 32 5.87827 32 8V24C32 26.1217 31.1571 28.1566 29.6569 29.6569C28.1566 31.1571 26.1217 32 24 32H21C21 31.337 20.7366 30.7011 20.2678 30.2322C19.7989 29.7634 19.163 29.5 18.5 29.5C17.837 29.5 17.2011 29.7634 16.7322 30.2322C16.2634 30.7011 16 31.337 16 32Z" fill="#3764B9"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 9H24C25.1546 9.00145 26.2655 8.55905 27.1031 7.76433C27.9406 6.96961 28.4407 5.88336 28.4997 4.73029C28.5588 3.57722 28.1725 2.44555 27.4205 1.56938C26.6686 0.693211 25.6087 0.139576 24.46 0.023C24.307 0.0145 24.1555 0 24 0H8C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8L0 24C0 20.0218 1.58035 16.2064 4.3934 13.3934C7.20644 10.5804 11.0218 9 15 9Z" fill="#507DD2"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 16C22.4178 16 20.871 16.4692 19.5554 17.3482C18.2399 18.2273 17.2145 19.4767 16.609 20.9385C16.0035 22.4003 15.845 24.0089 16.1537 25.5607C16.4624 27.1126 17.2243 28.538 18.3431 29.6569C19.462 30.7757 20.8874 31.5376 22.4393 31.8463C23.9911 32.155 25.5997 31.9965 27.0615 31.391C28.5233 30.7855 29.7727 29.7602 30.6518 28.4446C31.5308 27.129 32 25.5823 32 24V8C32 10.1217 31.1572 12.1566 29.6569 13.6569C28.1566 15.1571 26.1217 16 24 16Z" fill="#1E4BA0"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M26 9C26 9.26522 25.8946 9.51957 25.7071 9.70711C25.5196 9.89464 25.2652 10 25 10H22C21.7348 10 21.4804 10.1054 21.2929 10.2929C21.1054 10.4804 21 10.7348 21 11V15H24.78C24.9279 15 25.074 15.0329 25.2077 15.0961C25.3414 15.1594 25.4594 15.2516 25.5532 15.366C25.647 15.4804 25.7143 15.6142 25.7501 15.7577C25.7859 15.9012 25.7895 16.0509 25.7605 16.196L25.1605 19.196C25.1152 19.4227 24.9927 19.6267 24.814 19.7733C24.6352 19.9199 24.4112 20 24.18 20H21V32H16V20H13C12.7348 20 12.4804 19.8946 12.2929 19.7071C12.1054 19.5196 12 19.2652 12 19V16C12 15.7348 12.1054 15.4804 12.2929 15.2929C12.4804 15.1054 12.7348 15 13 15H16V11C16 9.4087 16.6321 7.88258 17.7574 6.75736C18.8826 5.63214 20.4087 5 22 5H25C25.2652 5 25.5196 5.10536 25.7071 5.29289C25.8946 5.48043 26 5.73478 26 6V9Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_119_2132">
                                                        <rect width="32" height="32" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="single-product-desc">
                    <div class="single-product-desc__container">
                        <div class="single-product-desc__tab-titles">
                            <span data-tab-id="tab_01" class="single-product-desc__tab-title active">Характеристики</span>
                            <span data-tab-id="tab_02" class="single-product-desc__tab-title">Описание</span>
                        </div>
                        @php
                        // Разделяем фильтры на две части
                        $columns = $filters->split(2);
                        @endphp
                        <div class="single-product-desc__tabs">
                            <div id="tab_01" class="single-product-desc__tab active">
                                <div class="single-product-desc__char">
                                    <div class="single-product-desc__col">
                                        <div class="single-product-desc__row">
                                            <div class="single-product-desc__name">Тип:</div>
                                            <div class="single-product-desc__value">{{$product->type}}</div>
                                        </div>
                                        @foreach($columns[0] as $filter)
                                            <div class="single-product-desc__row">
                                                <div class="single-product-desc__name">{{ $filter->category->name }}:</div>
                                                <div class="single-product-desc__value">{{ $filter->name }}</div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="single-product-desc__col">
                                        <div class="single-product-desc__row">
                                            <div class="single-product-desc__name">Бренд:</div>
                                            <div class="single-product-desc__value single-product-desc__label">{{$product->brand}}</div>
                                        </div>
                                        @foreach($columns[1] as $filter)
                                        <div class="single-product-desc__row">
                                            <div class="single-product-desc__name">{{ $filter->category->name }}:</div>
                                            <div class="single-product-desc__value">{{ $filter->name }}</div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                            <div id="tab_02" class="single-product-desc__tab">
                                <div class="single-product-desc__desc">
                                   {!!$product->description!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="similar-products">
        <div class="container">
            <div class="similar-products__container">
                <a href="javascript:;" class="similar-products__arrow slider-arrow prev">
                    <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="54" height="54" rx="27" transform="matrix(1 1.74846e-07 1.74846e-07 -1 -3.8147e-06 54)" fill="white"></rect>
                        <path d="M30.5 20L23.5 27L30.5 34" stroke="#1DACCE" stroke-width="3" stroke-linecap="square" stroke-linejoin="bevel"></path>
                    </svg>
                </a>
                <div class="similar-products__slider">
                    @foreach ($products as $prod)
                    <div class="card product-card js-product" data-product-quantity="1" data-id="{{$prod->id}}" data-product-name="{{$prod->name}}" data-product-price="{{$prod->price}}" data-product-img="{{asset("storage/".$prod->image)}}" data-product-href="/product/{{$category->slug}}/{{$prod->slug}}"">
                        <div class="card__img product-card__img">
                            <a href="/product/{{$category->slug}}/{{$prod->slug}}">
                                <img src="{{asset("storage/".json_decode($prod->image, true)[0])}}" alt="">
                                <div class="card__label product-card__label">Бренд: <span>{{$prod->brand}}</span></div>
                            </a>
                        </div>
                        <div class="card__title product-card__title">{{$prod->name}}</div>
                        <div class="card__type">Тип: <span>{{$prod->type}}</span></div>
                        <div class="card__price">{{$prod->price}} <span>₸</span></div>
                        <a href="#" class="product-card__add-to-card add-to-cart js-buy">Добавить в корзину</a>
                    </div>
                    @endforeach
                </div>
                <a href="javascript:;" class="similar-products__arrow slider-arrow next">
                    <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="54" height="54" rx="27" transform="matrix(-1 0 0 1 54 0)" fill="white"></rect>
                        <path d="M23.5 34L30.5 27L23.5 20" stroke="#1DACCE" stroke-width="3" stroke-linecap="square" stroke-linejoin="bevel"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
</main>

@endsection