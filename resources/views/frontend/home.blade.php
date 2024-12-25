@extends('frontend.master')
@section('content')

<body>
    <div class="scrollable-area">
        <div class="hero-slider">
            <div class="hero-list">
                <div class="hero-item">
                    <a href="/">
                        <img src="{{URL('assets/js/image/event05.jpg')}}" alt="">
                    </a>
                </div>
                <div class="hero-item">
                    <a href="/">
                        <img src="{{URL('assets/js/image/event08.jpg')}} " alt="">
                    </a>
                </div>
                <div class="hero-item">
                    <a href="/">
                        <img src="{{URL('assets/js/image/event04.jpg')}} " alt="">
                    </a>
                </div>
                <div class="hero-item">
                    <a href="/">
                        <img src="{{URL('assets/js/image/event07.jpg')}} " alt="">
                    </a>
                </div>
                <div class="hero-item">
                    <a href="/">
                        <img src="{{URL('assets/js/image/event06.jpg')}} " alt="">
                    </a>
                </div>
            </div>
            <div class="hero-buttons">
                <button class="hero-child-button" id="hero-prev"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="hero-child-button" id="hero-next"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <ul class="hero-dots">
                <li class="hero-active"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div class="container-width">
            <!-- End of section one mobile -->
            <!-- Advertising  -->
            <div data-aos="fade-up" class="ads">
                <a href="/"><img class="ads-img" alt="" src="{{URL('assets/js/image/ads01.png')}} "></a>

            </div>
            <!-- End of Advertising -->
            <!-- End of Section One -->



            <!-- Section Two  -->
            <div class="section-two container-width">
                <div class="news-parent-tap">
                    <div class="tap">
                        <img class="tap-item" alt="" src=" {{URL('assets/js/image/Polygon.png')}} ">
                        <div class="tap-child"></div>
                        <div class="label-text">News</div>
                    </div>
                </div>
                <div class="card-section card-grid">
                    <div class="card-parent">
                        <div data-aos="fade-up" class="first-card">
                            <a href="#">
                                <div class="first-card-text">
                                    <h2>
                                        Card Title Card Title CardTitleCard Title
                                        Card Title Card Title CardTitleCard Title

                                    </h2>
                                    <p>
                                        Lorem orem Ipsum is simply Lorem card text Lorem card text Lorem
                                        card text Lorem card Lorem
                                        card text Lorem card text Lorem
                                        card text Lorem card text Lorem
                                        card text Lorem card text Lorem
                                        card text Lorem card text Lorem
                                        card text Lorem card text Lorem
                                        card text Lorem card text Lorem
                                        card text Lorem card text Lorem
                                        card text Lorem card text Lorem
                                        card text Lorem card text Lorem
                                        card text Lorem card text Lorem
                                    </p>
                                </div>
                                <img class="first-img-card" src="{{URL('assets/js/image/event14.jpg')}} " alt="">
                                <div class="first-card-line"></div>
                                <div class="c-author">
                                    <div class="first-card-time-update">4 hours ago</div>
                                    <div class="first-card-author">Author : by Administrator </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="s-section ">
                        <div class="second-card-parent">
                            <div data-aos="fade-up" class="second-card-child ">
                                <div class="second-card">
                                    <a href="#">
                                        <div class="second-card-inner">
                                            <img class="second-card-img" src="{{URL('assets/js/image/event13.jpg')}} " alt="">
                                            <div class="second-card-text">
                                                <h3>Card Title Card Title Card Title Card Title</h3>
                                                <p>Lorem card text Lorem card text
                                                    Lorem card text Lorem card Lorem card
                                                    Lorem card text Lorem card Lorem card
                                                    text</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="second-card-child ">
                                <div class="second-card">
                                    <a href="#">
                                        <div class="second-card-inner">
                                            <img class="second-card-img" src="{{URL('assets/js/image/event12.jpg')}} " alt="">
                                            <div class="second-card-text">
                                                <h3>Card Title</h3>
                                                <p>Lorem card text Lorem card text Lorem card text Lorem card Lorem card
                                                    text</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="second-card-child ">
                                <div class="second-card">
                                    <a href="#">
                                        <div class="second-card-inner">
                                            <img class="second-card-img" src="{{URL('assets/js/image/event11.jpg')}} " alt="">
                                            <div class="second-card-text">
                                                <h3>Card Title</h3>
                                                <p>Lorem card text Lorem card text Lorem card text Lorem card Lorem card
                                                    text</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="third-card second-card-parent">
                            <div data-aos="fade-up" class="second-card-child ">
                                <div class="second-card">
                                    <a href="#">
                                        <div class="second-card-inner">
                                            <img class="second-card-img" src="{{URL('assets/js/image/event09.jpg')}} " alt="">
                                            <div class="second-card-text">
                                                <h3>Card Title</h3>
                                                <p>Lorem card text Lorem card text Lorem card text Lorem card Lorem card
                                                    text</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="second-card-child ">
                                <div class="second-card">
                                    <a href="#">
                                        <div class="second-card-inner">
                                            <img class="second-card-img" src="{{URL('assets/js/image/event08.jpg')}}" alt="">
                                            <div class="second-card-text">
                                                <h3>Card Title</h3>
                                                <p>Lorem card text Lorem card text Lorem card text Lorem card Lorem card
                                                    text</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div data-aos="fade-up" class="second-card-child ">
                                <div class="second-card">
                                    <a href="#">
                                        <div class="second-card-inner">
                                            <img class="second-card-img" src="{{URL('assets/js/image/event07.jpg')}} " alt="">
                                            <div class="second-card-text">
                                                <h3>Card Title</h3>
                                                <p>Lorem card text Lorem card text Lorem card text Lorem card Lorem card
                                                    text</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" sect-two container-width">
                    <div class="news-parent-tap">
                        <div class="tap">
                            <img class="tap-item" alt="" src=" {{URL('assets/js/image/Polygon.png')}} ">
                            <div class="tap-child"></div>
                            <div class="label-text">News</div>
                        </div>
                    </div>
                    <div class="card-section card-grid">
                        <div class="card-parent">
                            <div data-aos="fade-up" class="first-card">
                                <a href="#">
                                    <div class="first-card-text">
                                        <h2>
                                            Card Title Card Title CardTitleCard Title
                                            Card Title Card Title CardTitleCard Title

                                        </h2>
                                        <p>
                                            Lorem orem Ipsum is simply Lorem card text Lorem card text Lorem
                                            card text Lorem card Lorem
                                            card text Lorem card text Lorem
                                            card text Lorem card text Lorem
                                            card text Lorem card text Lorem
                                            card text Lorem card text Lorem
                                            card text Lorem card text Lorem
                                            card text Lorem card text Lorem
                                            card text Lorem card text Lorem
                                            card text Lorem card text Lorem
                                            card text Lorem card text Lorem
                                            card text Lorem card text Lorem
                                        </p>
                                    </div>
                                    <img class="first-img-card" src="{{URL('assets/js/image/event14.jpg')}} " alt="">
                                    <div class="first-card-line"></div>
                                    <div class="c-author">
                                        <div class="first-card-time-update">4 hours ago</div>
                                        <div class="first-card-author">Author : by Administrator </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="s-section ">
                            <div class="second-card-parent">
                                <div data-aos="fade-up" class="second-card-child ">
                                    <div class="second-card">
                                        <a href="#">
                                            <div class="second-card-inner">
                                                <img class="second-card-img" src="{{URL('assets/js/image/event13.jpg')}} " alt="">
                                                <div class="second-card-text">
                                                    <h3>Card Title Card Title Card Title Card Title</h3>
                                                    <p>Lorem card text Lorem card text
                                                        Lorem card text Lorem card Lorem card
                                                        Lorem card text Lorem card Lorem card
                                                        text</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div data-aos="fade-up" class="second-card-child ">
                                    <div class="second-card">
                                        <a href="#">
                                            <div class="second-card-inner">
                                                <img class="second-card-img" src="{{URL('assets/js/image/event12.jpg')}} " alt="">
                                                <div class="second-card-text">
                                                    <h3>Card Title</h3>
                                                    <p>Lorem card text Lorem card text Lorem card text Lorem card Lorem card
                                                        text</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div data-aos="fade-up" class="second-card-child ">
                                    <div class="second-card">
                                        <a href="#">
                                            <div class="second-card-inner">
                                                <img class="second-card-img" src="{{URL('assets/js/image/event11.jpg')}} " alt="">
                                                <div class="second-card-text">
                                                    <h3>Card Title</h3>
                                                    <p>Lorem card text Lorem card text Lorem card text Lorem card Lorem card
                                                        text</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="third-card second-card-parent">
                                <div data-aos="fade-up" class="second-card-child ">
                                    <div class="second-card">
                                        <a href="#">
                                            <div class="second-card-inner">
                                                <img class="second-card-img" src="{{URL('assets/js/image/event09.jpg')}} " alt="">
                                                <div class="second-card-text">
                                                    <h3>Card Title</h3>
                                                    <p>Lorem card text Lorem card text Lorem card text Lorem card Lorem card
                                                        text</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div data-aos="fade-up" class="second-card-child ">
                                    <div class="second-card">
                                        <a href="#">
                                            <div class="second-card-inner">
                                                <img class="second-card-img" src="{{URL('assets/js/image/event08.jpg')}}" alt="">
                                                <div class="second-card-text">
                                                    <h3>Card Title</h3>
                                                    <p>Lorem card text Lorem card text Lorem card text Lorem card Lorem card
                                                        text</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div data-aos="fade-up" class="second-card-child ">
                                    <div class="second-card">
                                        <a href="#">
                                            <div class="second-card-inner">
                                                <img class="second-card-img" src="{{URL('assets/js/image/event07.jpg')}} " alt="">
                                                <div class="second-card-text">
                                                    <h3>Card Title</h3>
                                                    <p>Lorem card text Lorem card text Lorem card text Lorem card Lorem card
                                                        text</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <swiper-container data-aos="fade-up" class="mySwiper" pagination="true" pagination-clickable="true"
                    slides-per-view="auto" space-between="10" free-mode="true">
                    <swiper-slide>
                        <div class="card-parent">
                            <div class="c-first-card">
                                <div class="c-first-card-inner">
                                    <img class="c-first-img-card" src="{{URL('assets/js/image/event06.jpg')}} " alt="">
                                    <div class="c-first-card-text">
                                        <h2>
                                            Card Title
                                            Card Title
                                            Card Title
                                            Card Title
                                        </h2>
                                        <p>
                                            Lorem Ipsum is simply Lorem card text Lorem card text Lorem card text Lorem
                                            card Lorem card text Lorem card text Lorem
                                            card Lorem card text Lorem card text Lorem

                                        </p>
                                    </div>
                                    <div class="first-card-foot">
                                        <div class="c-first-card-time-update"> 4 hours ago 4 hours ago</div>
                                        <div class="c-first-card-author">by Administrator Administrator </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="card-parent">
                            <div class="c-first-card">
                                <div class="c-first-card-inner">
                                    <img class="c-first-img-card" src="{{URL('assets/js/image/event14.jpg')}}  " alt="">
                                    <div class="c-first-card-text">
                                        <h2>
                                            Card Title
                                            Card Title
                                            Card Title
                                            Card Title
                                        </h2>
                                        <p>
                                            Lorem Ipsum is simply Lorem card text Lorem card text Lorem card text Lorem
                                            card Lorem card text Lorem card text Lorem
                                            card Lorem card text Lorem card text Lorem

                                        </p>
                                    </div>
                                    <div class="first-card-foot">
                                        <div class="c-first-card-time-update"> 4 hours ago 4 hours ago</div>
                                        <div class="c-first-card-author">by Administrator Administrator </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="card-parent">
                            <div class="c-first-card">
                                <div class="c-first-card-inner">
                                    <img class="c-first-img-card" src="{{URL('assets/js/image/event13.jpg')}} " alt="">
                                    <div class="c-first-card-text">
                                        <h2>
                                            Card Title
                                            Card Title
                                            Card Title
                                            Card Title
                                        </h2>
                                        <p>
                                            Lorem Ipsum is simply Lorem card text Lorem card text Lorem card text Lorem
                                            card Lorem card text Lorem card text Lorem
                                            card Lorem card text Lorem card text Lorem

                                        </p>
                                    </div>
                                    <div class="first-card-foot">
                                        <div class="c-first-card-time-update"> 4 hours ago 4 hours ago</div>
                                        <div class="c-first-card-author">by Administrator Administrator </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="card-parent">
                            <div class="c-first-card">
                                <div class="c-first-card-inner">
                                    <img class="c-first-img-card" src="{{URL('assets/js/image/event12.jpg')}} " alt="">
                                    <div class="c-first-card-text">
                                        <h2>
                                            Card Title
                                            Card Title
                                            Card Title
                                            Card Title
                                        </h2>
                                        <p>
                                            Lorem Ipsum is simply Lorem card text Lorem card text Lorem card text Lorem
                                            card Lorem card text Lorem card text Lorem
                                            card Lorem card text Lorem card text Lorem

                                        </p>
                                    </div>
                                    <div class="first-card-foot">
                                        <div class="c-first-card-time-update"> 4 hours ago 4 hours ago</div>
                                        <div class="c-first-card-author">by Administrator Administrator </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="card-parent">
                            <div class="c-first-card">
                                <div class="c-first-card-inner">
                                    <img class="c-first-img-card" src="{{URL('assets/js/image/event11.jpg')}}" alt="">
                                    <div class="c-first-card-text">
                                        <h2>
                                            Card Title
                                            Card Title
                                            Card Title
                                            Card Title
                                        </h2>
                                        <p>
                                            Lorem Ipsum is simply Lorem card text Lorem card text Lorem card text Lorem
                                            card Lorem card text Lorem card text Lorem
                                            card Lorem card text Lorem card text Lorem

                                        </p>
                                    </div>
                                    <div class="first-card-foot">
                                        <div class="c-first-card-time-update"> 4 hours ago 4 hours ago</div>
                                        <div class="c-first-card-author">by Administrator Administrator </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>

                    <swiper-slide>
                        <div class="card-parent">
                            <div class="c-first-card">
                                <div class="c-first-card-inner">
                                    <img class="c-first-img-card" src="{{URL('assets/js/image/event09.jpg')}} " alt="">
                                    <div class="c-first-card-text">
                                        <h2>
                                            Card Title
                                            Card Title
                                            Card Title
                                            Card Title
                                        </h2>
                                        <p>
                                            Lorem Ipsum is simply Lorem card text Lorem card text Lorem card text Lorem
                                            card Lorem card text Lorem card text Lorem
                                            card Lorem card text Lorem card text Lorem

                                        </p>
                                    </div>
                                    <div class="first-card-foot">
                                        <div class="c-first-card-time-update"> 4 hours ago 4 hours ago</div>
                                        <div class="c-first-card-author">by Administrator Administrator </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>

                    <div class="swiper-pagination" slot="container-end"></div>
                </swiper-container>
            </div>
        </div>
    </div>
</body>
@endsection
