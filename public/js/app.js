document.addEventListener('DOMContentLoaded', () => {
    let headerMenu = document.querySelector('.header__menu');
    document.addEventListener('click', ({ target }) => {
        // burger
        if (target.classList.contains('burger')) {
            target.classList.toggle('_opened');
            headerMenu.classList.toggle('active');
        }
    });

    let singleProductSwiperThumb = new Swiper(".single-product-card__swiper_s_sm", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 3,
        watchSlidesProgress: true,
        slideToClickedSlide: true,
        breakpoints: {
            1440: {
                spaceBetween: 15.6,
            }
        },

    });
    let singleProductSwiper = new Swiper(".single-product-card__swiper", {
        loop: true,
        spaceBetween: 10,
        thumbs: {
            swiper: singleProductSwiperThumb,
        },
    });

    const singleProductTabTitles = document.querySelectorAll('.single-product-desc__tab-title');
    const singleProductTabs = document.querySelectorAll('.single-product-desc__tab');

    singleProductTabTitles.forEach((singleProductTabTitle) => {
        singleProductTabTitle.addEventListener('click', function () {
            let tabId = this.dataset.tabId;
            let tab = document.querySelector('#' + tabId);


            //два похожих блока кода. Рефактор можно сделать через делегацию
            singleProductTabTitles.forEach((singleProductTabTitle) => {
                singleProductTabTitle.classList.remove('active');
            });
            this.classList.add('active');
            
            singleProductTabs.forEach((singleProductTab) => {
                singleProductTab.classList.remove('active');
            });
            tab.classList.add('active');
        });
    });
    
    //Старый код, работает, но нужно разобраться адаптировать и вынести в отдельную функцию
    [].forEach.call( document.querySelectorAll('[type="tel"]'), function(input) {
        var keyCode;
        function mask(event) {
          event.keyCode && (keyCode = event.keyCode);
          var pos = this.selectionStart;
          if (pos < 3) event.preventDefault();
          var matrix = "+7 (___) ___ ____",
              i = 0,
              def = matrix.replace(/\D/g, ""),
              val = this.value.replace(/\D/g, ""),
              new_value = matrix.replace(/[_\d]/g, function(a) {
                  return i < val.length ? val.charAt(i++) : a
              });
          i = new_value.indexOf("_");
          if (i != -1) {
              i < 5 && (i = 3);
              new_value = new_value.slice(0, i)
          }
          var reg = matrix.substr(0, this.value.length).replace(/_+/g,
              function(a) {
                  return "\\d{1," + a.length + "}"
              }).replace(/[+()]/g, "\\$&");
          reg = new RegExp("^" + reg + "$");
          if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) {
            this.value = new_value;
          }
          if (event.type == "blur" && this.value.length < 5) {
            this.value = "";
          }
        }
    
        input.addEventListener("input", mask, false);
        input.addEventListener("focus", mask, false);
        input.addEventListener("blur", mask, false);
        input.addEventListener("keydown", mask, false);
    
      });


    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });

    $(".js-range-slider").ionRangeSlider();
});

window.onload = () => {
    // $.fn.setCursorPosition = function(pos) {
    //     if ($(this).get(0).setSelectionRange) {
    //         $(this).get(0).setSelectionRange(pos, pos)
    //     } else if ($(this).get(0).createTextRange) {
    //         var range = $(this).get(0).createTextRange()
    //         range.collapse(true)
    //         range.moveEnd('character', pos)
    //         range.moveStart('character', pos)
    //         range.select()
    //     }
    // }
    // $('input[type="tel"]').on('click', function() {
    //     $(this).setCursorPosition(3)
    // }).mask('+7 (999) 999 99 99')

    // $('.way').waypoint({
    //     handler: function() {
    //         $(this.element).addClass("way--active");

    //     },
    //     offset: '88%'
    // });
    $('.hero__info').slick({
        autoplay: true,
        autoplaySpeed: 1500,
        fade: true,
        slidesToShow: 1,
        dots: false,
        prevArrow: $('.hero__arrow.prev'),
        nextArrow: $('.hero__arrow.next'),
    });
    $('.popular__slider').slick({
        //autoplay: true,
        autoplaySpeed: 1000,
        slidesToShow: 6,
        slidesToScroll: 1,
        dots: false,
        prevArrow: $('.slider-arrow.prev'),
        nextArrow: $('.slider-arrow.next'),
        responsive: [
            {
                breakpoint: 1440,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
    $('.similar-products__slider').slick({
        autoplay: false,
        autoplaySpeed: 1000,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        prevArrow: $('.slider-arrow.prev'),
        nextArrow: $('.slider-arrow.next'),
        responsive: [
            {
                breakpoint: 1440,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    var activeAccordion = null; // переменная для хранения ссылки на текущий открытый блок

    $(".js-accordeons__item-body").hide(); // скрываем все блоки с контентом при загрузке страницы

    $(".js-accordeons__item-title").click(function () {
        // при клике на заголовок
        var accordionBody = $(this).next(".js-accordeons__item-body"); // находим блок контента, соответствующий данному заголовку
        if (accordionBody.is(":hidden")) {
            // если контент скрыт, то
            if (activeAccordion) {
                // если уже есть открытый блок
                activeAccordion.slideToggle(); // скрываем его
                activeAccordion
                    .prev(".js-accordeons__item-title")
                    .removeClass("active"); // удаляем класс "active" у соответствующего заголовка
            }
            $(this).addClass("active"); // открываем текущий блок
            accordionBody.slideToggle(); // плавно отображаем контент
            activeAccordion = accordionBody; // сохраняем ссылку на текущий открытый блок
        } else {
            // иначе
            $(this).removeClass("active"); // закрываем текущий блок
            accordionBody.slideToggle(); // плавно скрываем контент
            activeAccordion = null; // удаляем ссылку на открытый блок
        }
    });

    $(".js-filters__item-body").hide(); // скрываем все блоки с контентом при загрузке страницы

    $(".js-filters__item-title").click(function () {
        // при клике на заголовок
        var accordionBody = $(this).next(".js-filters__item-body"); // находим блок контента, соответствующий данному заголовку
        if (accordionBody.is(":hidden")) {
            $(this).addClass("active"); // открываем текущий блок
            accordionBody.slideToggle(); // плавно отображаем контент
            activeAccordion = accordionBody; // сохраняем ссылку на текущий открытый блок
        } else {
            // иначе
            $(this).removeClass("active"); // закрываем текущий блок
            accordionBody.slideToggle(); // плавно скрываем контент
            activeAccordion = null; // удаляем ссылку на открытый блок
        }
    });

    // partner marq
    $('.marquee').marquee({
        direction: 'left',
        speed: 100,
        startVisible: true,
    });
};

// loader func
function submitForm() {
    $('#form_loader').show();
}
//Alert form
let alertt = document.querySelector(".alert--fixed");
let alertClose = document.querySelectorAll(".alert--close")
for (let item of alertClose) {
    item.addEventListener('click', function(event) {
        alertt.classList.remove("alert--active")
        alertt.classList.remove("alert--warning")
        alertt.classList.remove("alert--error")
    })
}

function requestCart() {

    const cartDOMElement = document.querySelector('.js-cart')
    const cartCompareDOMElement = document.querySelector('.compare__slider')
    const cartItemsCounterDOMElement = document.querySelectorAll('.js-cart-total-count-items')
    const cartTotalPriceDOMElement = document.querySelectorAll('.js-cart-total-summa')
        // const cartTotalSummaDOMElement = document.querySelector('.js-cart-total-price')
        // const totalSumma = document.querySelector('.js-all-summa')

    const cart = JSON.parse(localStorage.getItem('teralineCart')) || {};

    const clearBasket = () => {
        let basketItems = document.querySelector('.cart__products-wrapper');
        let basketForm = document.querySelector('.checkout');
        let empty = document.querySelector('.empty');
        if (Object.keys(cart).length == 0) {
            basketItems.classList.add('disabled');
            basketForm.classList.add('disabled');
            empty.classList.add('active');
        }
    }
    const basketpage = document.querySelector('.cart')
    if (basketpage) {
        clearBasket();
    } //отображаем добавленный товар в корзине
    const renderCartItem = ({ id, articul, name, totalprice, price, src, quantity, href }) => {
        const cartItemDOMElement = document.createElement('div');
        if (articul === null) {
            articul = '';
        }
        totalprice = totalprice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        price = price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        const cartItemTemplate = `

            <div class="cart__product-about">
                <a href="${href}" class="cart__img">
                    <img src="${src}" alt="">
                </a>
                <div class="cart__product-desc">
                    <div class="cart__product-wrapper">
                        <div class="cart__product-name">${name}</div>
                        <div class="cart__product-sku">Артикул: <span>${articul}</span></div>
                    </div>
                    <div class="cart__quantity">
                        <div class="cart__counter-container">
                    <span class="cart__counter-min js-minus">
                        <svg style="pointer-events:none" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.4">
                                <line x1="3" y1="13.0774" x2="21" y2="13.0774" stroke="#565B62" stroke-width="2.34512"></line>
                            </g>
                        </svg>
                    </span>
                            <span class="cart__counter js-cart-item-quantity">${quantity}</span>
                    <span class="cart__counter-max js-plus">
                        <svg style="pointer-events:none" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.5 13.8V11.4H19.05V13.8H4.5ZM10.5 5.25H13.05V19.95H10.5V5.25Z" fill="#565B62"></path>
                        </svg>
                    </span>
                        </div>
                        <div class="cart__price"><span>${price}</span> ₸</div>
                        <div style="display:none" class="cart__price js-cart-item-totalprice"><span>${price}</span> ₸</div>
                    </div>
                </div>
            </div>
            <div class="cart__delete remove">
                <svg style="pointer-events:none" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_119_2380)">
                        <path d="M34.0625 4.6875H27.0949L26.3332 2.40328C26.1004 1.7031 25.6528 1.09406 25.0542 0.662654C24.4556 0.231244 23.7362 -0.000614161 22.9984 1.22182e-06H17.0016C16.2637 -0.000488614 15.5442 0.231401 14.9455 0.662777C14.3467 1.09415 13.8989 1.70311 13.6657 2.40328L12.9048 4.6875H5.9375C3.99891 4.6875 2.42188 6.26453 2.42188 8.20313V10.5469C2.42188 11.8522 3.59695 11.7188 4.85805 11.7188H36.4062C37.054 11.7188 37.5781 11.1946 37.5781 10.5469V8.20313C37.5781 6.26453 36.0011 4.6875 34.0625 4.6875ZM15.376 4.6875L15.8893 3.14485C15.9671 2.91142 16.1164 2.70842 16.3161 2.56463C16.5157 2.42084 16.7556 2.34356 17.0016 2.34375H22.9984C23.503 2.34375 23.9505 2.66531 24.1096 3.14485L24.6234 4.6875H15.376ZM5.05203 14.2188L6.92055 36.8025C7.08648 38.6255 8.59141 40 10.4213 40H29.5788C31.4087 40 32.9136 38.6255 33.0806 36.7922L34.9481 14.2188H5.05203ZM14.1406 34.1406C14.1406 35.6854 11.7969 35.6917 11.7969 34.1406V17.7344C11.7969 16.1896 14.1406 16.1833 14.1406 17.7344V34.1406ZM21.1719 34.1406C21.1719 35.6854 18.8281 35.6917 18.8281 34.1406V17.7344C18.8281 16.1896 21.1719 16.1833 21.1719 17.7344V34.1406ZM28.2031 34.1406C28.2031 35.6854 25.8594 35.6917 25.8594 34.1406V17.7344C25.8594 17.0866 26.3835 16.5625 27.0312 16.5625C27.679 16.5625 28.2031 17.0866 28.2031 17.7344V34.1406Z" fill="url(#paint0_linear_119_2380)"></path>
                    </g>
                    <defs>
                        <linearGradient id="paint0_linear_119_2380" x1="2.42187" y1="20" x2="37.5781" y2="20" gradientUnits="userSpaceOnUse">
                            <stop offset="0.337727" stop-color="#1DACCE"></stop>
                            <stop offset="1" stop-color="#C272A6"></stop>
                        </linearGradient>
                        <clipPath id="clip0_119_2380">
                            <rect width="40" height="40" fill="white"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </div>
        `;

        cartItemDOMElement.innerHTML = cartItemTemplate;
        cartItemDOMElement.setAttribute('data-id', id);
        cartItemDOMElement.classList.add('cart__row');
        cartDOMElement.appendChild(cartItemDOMElement);
        totalBasket();
        updateCart();
    }


    //сохраняем товар в LocalStorage
    const saveCart = () => {
        localStorage.setItem('teralineCart', JSON.stringify(cart));
    }


    // подсчитываение колличества и суммы товара
    const totalBasket = () => {
        let totalcount = 0;
        const ids = Object.keys(cart);
        for (let i = 0; i < ids.length; i++) {
            const id = ids[i]
            totalcount += +(cart[id].quantity);
        }

        let totalAll = 0;
        const price = document.querySelectorAll('.js-cart-item-totalprice span');
        for (let i = 0; i < price.length; i++) {
            totalAll = totalAll + parseInt(price[i].innerHTML.replaceAll(' ', ''));
        }

        // cartTotalPriceDOMElement.textContent = totalAll + ' тг';
        // cartTotalSummaDOMElement.textContent = total + ' тг';
        cartItemsCounterDOMElement.forEach(elem => {
                elem.textContent = totalcount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            })
            // Итоговая сумма всех товаров
        cartTotalPriceDOMElement.forEach(elem => {
            elem.textContent = totalAll.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + ' ₸';
            // elem.textContent = totalAll.toString() + ' тг';
            // console.log(totalAll);
        })
        $('.js-cart-total-summa').attr('data-summ', totalAll);
        // console.log(ids.length);
        if (ids.length == 0) {
            cartTotalPriceDOMElement.forEach(elem => {
                    elem.textContent = totalAll + ' тг'
                    console.log(totalAll)
                })
                // cartTotalSummaDOMElement.textContent = 0;
            $('.js-cart-total-summa').attr('data-summ', 0);
        }
        updateCart();
        // checkSelectDeliv();
    }

    function totalBasketHeader() {
        let basket = document.querySelector('.header__count')
        let basketTitle = document.querySelector('.header__basket-span')
        
        let totalcount = 0;
        const ids = Object.keys(cart);
        for (let i = 0; i < ids.length; i++) {
            const id = ids[i]
            totalcount += +(cart[id].quantity);
        }
        // console.log(totalcount)
        basket.innerHTML = totalcount;
        if (totalcount > 0) {
            let word = numWord(totalcount, ['товар', 'товара', 'товаров'])
            basketTitle.classList.add('active')
            basket.append(' ' + word)
        } else {
            basketTitle.classList.remove('active')
        }
    }
    totalBasketHeader();
    //Проверка выбранного селекта для доставки товара
    // let select = document.getElementById('deliv')
    // if (select) {
    //     select.addEventListener('input', checkSelectDeliv)
    // }

    // function checkSelectDeliv() {
    //     let summa = document.querySelector('.js-all-summa')
    //     let deliv = document.querySelector('.deliv')
    //     let select = document.getElementById('deliv')
    //     let value = select.value
    //     let totalAll = 0;
    //     // let price = document.querySelectorAll('.js-cart-item-totalprice');
    //     // for (let i = 0; i < price.length; i++) {
    //     //     let parseSumma = totalAll + parseInt(price[i].innerHTML)
    //     //     totalAll = parseSumma;
    //     // }
    //     if (value === 'delivery') {
    //         // let parseSumma = parseInt(totalAll + 2000)
    //         // summa.innerHTML = parseSumma.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + ' тг';
    //         deliv.classList.add('active')
    //     } else {
    //         // summa.innerHTML = totalAll.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + ' тг'
    //         deliv.classList.remove('active')
    //     }
    //     requestTable();
    //     // console.log(value)
    // }

    // проверка radiobuttons доставки
    let radioPickup = document.querySelector('#pickup');
    let radioDeliv = document.querySelector('#delivery');
    let delivHtmlTemplate = document.querySelector('.busket-form__order-row .deliv');
    if (radioPickup) {
        radioPickup.addEventListener('input', () => {
            checkDeliveryButtons(radioPickup)
        })
    }
    if (radioDeliv) {
        radioDeliv.addEventListener('input', () => {
            checkDeliveryButtons(radioDeliv)
        })
    }

    function checkDeliveryButtons(radio) {
        if (radio.checked) {
            delivHtmlTemplate.textContent = radio.nextElementSibling.textContent
        }
    }

    //Удаление из корзины
    const deleteCartItem = (id) => {
            const cartItemDOMElement = cartDOMElement.querySelector(`[data-id="${id}"]`);
            // const tableElement = tableDOMElement.querySelector(`[data-product-articul="${articul}"]`);
            cartDOMElement.removeChild(cartItemDOMElement);
            // tableDOMElement.removeChild(tableElement);
            delete cart[id];
            updateCart();
            totalBasket();
        }
        //Обновление количества товара и итоговой суммы
    const updateQuantityTotalPrice = (id, quantity) => {
            const cartItemDOMElement = cartDOMElement.querySelector(`[data-id="${id}"`);
            const cartItemQuantityDOMElement = cartItemDOMElement.querySelector('.js-cart-item-quantity');
            // const cartTotalPriceDOMElement = document.querySelector('.js-cart-total-price')
            const cartItemPriceDOMElement = cartItemDOMElement.querySelector('.js-cart-item-totalprice span');

            const ids = Object.keys(cart);
            cart[id].quantity = quantity;
            cartItemQuantityDOMElement.textContent = quantity;
            cart[id].totalprice = cart[id].quantity * cart[id].price;
            cartItemPriceDOMElement.textContent = cart[id].totalprice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            // console.log(cart[id].totalprice)

            // tableQuantity.textContent = quantity;
            cart[id].totalprice = cart[id].quantity * cart[id].price;
            // tableTotal.textContent = cart[articul].totalprice;

            updateCart();
        }
        //Увеличение количества товара и итоговой суммы
    const increaseQuantity = (id) => {
            const newQuantity = +(cart[id].quantity) + 1;
            updateQuantityTotalPrice(id, newQuantity);
        }
        //Уменьшение количества товара и итоговой суммы
    const decreaseQuantity = (id) => {
        const newQuantity = +(cart[id].quantity) - 1;
        if (newQuantity >= 1) {
            updateQuantityTotalPrice(id, newQuantity);
        }
    }



    //Добавление в корзину
    const addCartItem = (data) => {
        // console.log(data)
        const { id } = data;
        cart[id] = data;
        updateCart();
        if (cartDOMElement) {
            renderCartItem(data);
        }
    }


    //Обновляем данные в LocalStorage
    const updateCart = () => {
        saveCart();
    }


    //Получаем данные для объекта
    const getProductData = (productDOMElement) => {
        const button = document.querySelector('.add-to-cart')
        const id = productDOMElement.getAttribute('data-id')
        const name = productDOMElement.getAttribute('data-product-name');
        // const desc = productDOMElement.getAttribute('data-product-desc');
        const articul = productDOMElement.getAttribute('data-product-articul');
        // const size = productDOMElement.getAttribute('data-product-size');
        // const color = productDOMElement.getAttribute('data-product-color');
        const oldPrice = productDOMElement.getAttribute('data-product-old-price');
        const price = productDOMElement.getAttribute('data-product-price');
        const src = productDOMElement.getAttribute('data-product-img');
        const quantity = productDOMElement.getAttribute('data-product-quantity');
        let href = productDOMElement.getAttribute('data-product-href');
        if (button) {
            href = window.location.href;
        }
        // const quantity = 1;
        const totalprice = quantity * +(price);
        return { id, name, articul, price, totalprice, src, quantity, href, oldPrice };
    }

    const renderCart = () => {
        const ids = Object.keys(cart);
        // console.log(ids);
        ids.forEach((id) => renderCartItem(cart[id]));
    };


    const disabledButton = () => {
        // console.log(cart)
        const test = document.querySelectorAll('.js-product')
        const buttonCounter = document.querySelector('.single-product-card__counter-container');
        for (let i = 0; i < test.length; i++) {
            const attr = (test[i].getAttribute('data-id'))
            const parent = test[i].querySelector('.js-buy')
                // console.log(parent)
                // console.log(cart.hasOwnProperty(attr))
            if (cart.hasOwnProperty(attr)) {
                parent.classList.add('active')
                parent.innerHTML = 'Товар в корзине';
                parent.disabled = true;
                if (buttonCounter) {
                    buttonCounter.style.pointerEvents = 'none';
                    buttonCounter.style.opacity = '0.5';
                }
            }

        }

    }
    disabledButton();


    // Вызов popup
    // function showPopup() {
    //     let popup = document.querySelector('.popup-busket')
    //     let body = document.querySelector('body')
    //     let btn = document.querySelector('.popup-busket__link.js')
    //     popup.classList.remove('hidden')
    //     body.style.overflow = 'hidden'
    //     setTimeout(() => { popup.classList.add('active') }, 50)
    //     btn.addEventListener('click', closePopup)
    //     popup, addEventListener('click', (e) => {
    //         if (e.target == popup) {
    //             closePopup();
    //         }
    //     })

    //     function closePopup() {
    //         popup.classList.remove('active')
    //         body.style.overflow = 'unset'
    //         setTimeout(() => { popup.classList.add('hidden') }, 300)
    //     }
    // }


    //Инициализация
    const cartInit = () => {
        if (cartDOMElement) {
            renderCart();
        }

        if (cartCompareDOMElement) {
            renderCompareCart();
        }

        document.querySelector('body').addEventListener('click', (e) => {
            const target = e.target;
            //В корзину
            if (target.classList.contains('js-buy')) {
                e.preventDefault();
                const productDOMElement = target.closest('.js-product');
                const data = getProductData(productDOMElement);
                addCartItem(data);
                disabledButton();
                totalBasketHeader();
                // showPopup();
            }

            //Удалить из корзины
            if (target.classList.contains('remove')) {
                e.preventDefault();
                const cartItemDOMElement = target.closest('.cart__row');
                const productId = cartItemDOMElement.getAttribute('data-id');
                deleteCartItem(productId);
                clearBasket();
                requestTable();
                totalBasketHeader();
            }

            //Увеличить
            if (target.classList.contains('js-plus')) {
                e.preventDefault();
                const cartItemDOMElement = target.closest('.cart__row');
                const productId = cartItemDOMElement.getAttribute('data-id');
                increaseQuantity(productId);
                totalBasket();
                requestTable();
                totalBasketHeader();
            }

            //Уменьшить
            if (target.classList.contains('js-minus')) {
                e.preventDefault();
                const cartItemDOMElement = target.closest('.cart__row');
                const productId = cartItemDOMElement.getAttribute('data-id');
                decreaseQuantity(productId);
                totalBasket();
                requestTable();
                totalBasketHeader();
            }

            if (target.classList.contains('decrease')) {
                let targetProduct = target.closest('.js-product');
                let newProductQuantity = +(targetProduct.getAttribute('data-product-quantity')) - 1;
                if (newProductQuantity < 1) {
                    newProductQuantity = 1;
                }
                targetProduct.setAttribute('data-product-quantity', newProductQuantity);
                let targetCountTemplate = targetProduct.querySelector('.single-product-card__counter-container span');
                let targetPriceTemplate = targetProduct.querySelector('.single-product-card__price span');
                targetCountTemplate.textContent = newProductQuantity;
                targetPriceTemplate.textContent = (newProductQuantity * targetProduct.getAttribute('data-product-price')).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            }

            if (target.classList.contains('increase')) {
                let targetProduct = target.closest('.js-product');
                let newProductQuantity = +(targetProduct.getAttribute('data-product-quantity')) + 1;
                targetProduct.setAttribute('data-product-quantity', newProductQuantity);
                let targetCountTemplate = targetProduct.querySelector('.single-product-card__counter-container span');
                let targetPriceTemplate = targetProduct.querySelector('.single-product-card__price span');
                targetCountTemplate.textContent = newProductQuantity;
                targetPriceTemplate.textContent = (newProductQuantity * targetProduct.getAttribute('data-product-price')).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            }

            // if(target.classList.contains('equipment-label') || target.closest('.equipment-label')) {
            //     console.log(target)
            // }

        });

        // комплектация товара
        let innerProduct = document.querySelector('.product__info.js-product');
        if (innerProduct) {
            let hiddenInputEquipment = document.querySelector('.popup-order #popup-order-equipment');
            document.addEventListener('change', function(e) {
                const target = e.target;
                if (target.checked) {
                    let equipmentPrice = target.getAttribute('data-equipment-price');
                    let parentProduct = target.closest('.js-product');
                    parentProduct.setAttribute('data-product-price', equipmentPrice);
                    let targetPriceTemplate = parentProduct.querySelector('.product__info-price span');
                    targetPriceTemplate.textContent = (parentProduct.getAttribute('data-product-quantity') * parentProduct.getAttribute('data-product-price')).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                    hiddenInputEquipment.value = target.getAttribute('id');
                }
            });
        }
    }
    cartInit();
}
requestCart();

function requestTable() {
    const cart = JSON.parse(localStorage.getItem('teralineCart')) || {};
    let totalSumma = document.querySelector('.js-cart-total-summa').getAttribute('data-summ');
    const ids = Object.keys(cart);
    let textareaPopupOrder = document.querySelector('#textarea-order-popup');
    if (textareaPopupOrder) {
        textareaPopupOrder.innerHTML = localStorage.getItem('teralineCart');
    }

    let tableItem = '';
    let tableTotalPrice = '';
    let tableTemplate = '';
    const renderTable = () => {
        let counter = 0;
        for (let i in ids) {
            const keys = ids[i];
            const id = cart[keys].id;
            const img = cart[keys].src;
            const name = cart[keys].name;
            const articul = cart[keys].articul;
            const quantity = cart[keys].quantity;
            const price = cart[keys].price;
            const oldPrice = cart[keys].oldPrice > 0 ? cart[keys].oldPrice + ' тг' : '';
            const totalprice = cart[keys].totalprice;
            tableItem += `
                    <tr class="order-row" style="page-break-after: always;">
                    <td>${id}</td>
                    <td><img src="${img}"></td>
                    <td>${name}</td>
                    <td>${articul}</td>
                    <td>${quantity}</td>
                    <td style="text-decoration: line-through;">${oldPrice}</td>
                    <td>${price} тг</td>
                    <td>${totalprice} тг</td>
                    </tr>
            `;
            tableTotalPrice = `
                <tr>
                    <td colspan="8">Итоговая сумма всех товаров - ${totalSumma} тенге </td>
                </tr>
            `;
            counter++;
            if (counter % 9 == 0) {
                tableTemplate += `
                <table border="1" cellspacing="0" cellpadding="10">
                    <thead>
                        <tr>
                        <th>ID Товара</th>
                        <th>Изображение</th>
                        <th>Название</th>
                        <th>Артикул</th>
                        <th>Количество</th>
                        <th>Старая цена</th>
                        <th>Цена</th>
                        <th>Итоговая сумма</th>
                        </tr>
                    </thead>
                    <tbody>${tableItem}</tbody>
                </table>
                `;
                tableItem = '';
            }
        }
        tableTemplate += `
            <table border="1" cellspacing="0" cellpadding="10">
                <thead>
                    <tr>
                    <th>ID Товара</th>
                    <th>Изображение</th>
                    <th>Название</th>
                    <th>Артикул</th>
                    <th>Количество</th>
                    <th>Старая цена</th>
                    <th>Цена</th>
                    <th>Итоговая сумма</th>
                    </tr>
                </thead>
                <tbody>${tableItem} ${tableTotalPrice}</tbody>
            </table>
        `;
        textarea.innerHTML = tableTemplate;
    }
    renderTable();
}

let rangeSlider = document.querySelector('#rangeSlider');
    if (rangeSlider) {
        let filterMin = document.querySelector('#filter-min');
        let filterMax = document.querySelector('#filter-max');
        let filterMaxPrice = document.querySelector('#filter-max').getAttribute('data-max-price');
        $("#rangeSlider").ionRangeSlider({
            skin: "round",
            type: "double",
            min: 0,
            max: filterMaxPrice,
            from: filterMin.value,
            to: filterMax.value,
            hide_min_max: true,
            hide_from_to: true,
            onChange: function(data) {
                filterMin.setAttribute('value', data.from);
                filterMin.value = data.from;
                filterMax.setAttribute('value', data.to);
                filterMax.value = data.to;
            }
        });
        let my_range = $("#rangeSlider").data("ionRangeSlider");
        filterMin.addEventListener('input', e => {
            my_range.update({
                from: filterMin.value,
            })
        })
        filterMax.addEventListener('input', e => {
            my_range.update({
                to: filterMax.value,
            })
        })
    }

    function numWord(value, words){  
        value = Math.abs(value) % 100; 
        var num = value % 10;
        if(value > 10 && value < 20) return words[2]; 
        if(num > 1 && num < 5) return words[1];
        if(num == 1) return words[0]; 
        return words[2];
    }

    function delegate(box, eventName, selector, handler) {
        box.addEventListener(eventName, function(e) {
            let elem = e.target.closest(selector);

            if(elem !== null && box.contains(elem)) {
                handler.call(elem, e);
            }
        })
    }