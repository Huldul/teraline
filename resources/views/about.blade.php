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
                    <a href="/about" class="breadcrumbs__list-link active">О компании</a>
                </li>
            </ul>
        </div>
    </div>
</section>
    <section class="about">
        <div class="container">
            <div class="about__container">
                <div class="main-title">
                    <div class="main-title__container">
                        <h1 class="about__title title-lg">О компании</h1>
                    </div>
                </div>
                <div class="about__banner">
                    <span><img src="{{asset("./img/teraline.svg")}}" alt=""></span>
                </div>
                <div class="about__wrapper">
                    <div class="about__col">
                        <div class="about__txt">
                            <p>
                                {!!$page->head_main!!}
                            </p>
                        </div>

                        <div class="about__list">
                            <div class="about__title">
                                <h3>{{$page->perm_title}}</h3>
                            </div>
                            <ol>
                                @foreach ($advantages as $advantage)
                                <li class="about__item"><span>{{$advantage->title}}</span>
                                    <div class="about__txt">{!!$advantage->main!!}</div>
                                </li>
                                @endforeach
                                
                            </ol>
                        </div>

                            <div class="about__txt">
                                <div class="about__title">
                                    <h3>{{$page->foot_title}}</h3>
                                </div>
                                {!!$page->foot_main!!}
                            </div>

                    </div>
                    <div class="about__col">
                        <div class="about__cards">
                            @foreach ($points as $point)
                            <div class="about__card">
                                <img src="{{asset("storage/".$point->image)}}" style="height:53px; width:53px;" alt="" srcset="">
                                <span>{{$point->title}}</span>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection