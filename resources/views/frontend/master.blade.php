<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400&display=swap">
    <link rel="stylesheet" href="{{URL('assets/js/css/style.css')}}">
    <script src="https://kit.fontawesome.com/5041c59df8.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</head>
<body>
    {{-- Navigation Bar --}}
    <div class="nav main-tool-bar">
        <div class="container-width">
            <div class="navbar">
                <div class="logo"><a href="/"><img src="{{URL('/assets/js/image/ppm.jpg')}}" alt=""></a></div>
                <div id="nav-news" class="nav-list index-news"><a href="/">Home</a></div>
                {{-- <div id="nav-news" class="nav-list nav-news"><a href="/news">News</a></div>
                <div id="nav-media" class="nav-list nav-media"><a href="/media">Media Center</a></div>
                <div id="nav-social" class="nav-list nav-social"><a href="/social">Social Media</a></div>
                <div id="nav-entertainment" class="nav-list nav-entertainment"><a href="/entertainment">Entertainment</a></div>
                <div id="nav-article" class="nav-list nav-article"><a href="/about-us">About us</a></div> --}}
                @foreach($categories as $category)
                    @if($category->status)
                        <div id="nav-{{ $category->category_name }}" class="nav-list"><a href="/{{ $category->category_name }}">{{ $category->category_name }}</a></div>
                    @endif
                @endforeach
                <div id="nav-search" class="nav-list search-bar"><a href="/"><i class="fa-solid fa-magnifying-glass"></i></a></div>
            </div>
        </div>
    </div>
    <div id="search-popup" class="search-container">
        <div class="search-popup-content">
            <span id="close-search-popup" class="close-btn">&times;</span>
            <input type="text" id="search-input" class="search-input" placeholder="Search...">
            <!-- <button id="search-button">Search</button> -->
            <ul id="suggestions" class="suggestions"></ul>
            <div class="no-results">No results found</div>
        </div>
    </div>

        {{-- Mobile Navigation Bar --}}
        <header class="header">
            <a class="logo" href="/"><img src="{{URL('/assets/js/image/ppm.jpg')}}" alt="Logo"></a>
            <div class="burger" id="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="m-menu" id="menu">
                <li><a href="/">Home</a></li>
                <li><a href="/news">News</a></li>
                <li><a href="/media">Media Center</a></li>
                <li><a href="/social">Social Media</a></li>
                <li><a href="/entertainment">Entertainment</a></li>
                <li><a href="/about-us">About us</a></li>
            </ul>
            <div id="m-search" class="m-search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div id="group" class="group">
                <input type="search" class="m-input" id="mobile-input" placeholder="search...." />
                <ul id="m-suggestions" class="m-suggestions"></ul>
                <div class="m-noresults">
                    No results found
                </div>
            </div>
        </header>
        {{-- End of Mobile Navigation Bar --}}
    {{-- End of Navigation Bar --}}
        @yield('content')
    {{-- Footer --}}
    <div class="footer-parent ">
        <div class="footer">
            <div class="footer-child">
                <div class="footer-grid">
                    <div class="footer-title">
                        <div class="footer-text">Connect with Us on Social Media
                            Follow for updates and exclusive content.
                        </div>
                        <div class="social-icon">
                            <div class="s-icon facebook"><a href="/"><i class="fa-brands fa-facebook"></i></a></div>
                            <div class="s-icon telegram"><a href="/"><i class="fa-brands fa-telegram"></i></a></div>
                            <div class="s-icon whatsapp"><a href="/"><i class="fa-brands fa-whatsapp"></i></a></div>
                            <div class="s-icon youtube"><a href="/"><i class="fa-brands fa-youtube"></i></a></div>
                        </div>
                    </div>
                    <div class="quick-link-parent">
                         <div class="quick-link">
                            <div class="quick-link-title">Quick Link</div>
                            <div class="quick-link-line"></div>
                            <div class="f-news"><a href="/news">News</a></div>
                            <div class="f-media-center"><a href="/media">Media Center</a></div>
                            <div class="f-social-media"><a href="/social">Social Media</a></div>
                            <div class="f-entertainment"><a href="/entertainment">Entertainment</a></div>
                            <div class="f-other-article"><a href="/article">Article</a></div>
                        </div>
                    </div>
                    <div class="get-mail">
                        <div class="mail">
                            <div class="mail-title">Stay In Touch</div>
                            <div class="mail-line"></div>
                            <div class="mail-text">
                                <p class="">To be updated with all the latest news, offers
                                    and special announcements.
                                </p>
                            </div>
                            <div class="mail-input">
                                <input placeholder="Enter your email" class="input" type="text">
                            </div>
                            <div class="mail-btn">
                                <button type="submit" class="mail-submit group-child">Subscribe</button>
                                <div class="subscribe"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{URL('assets/js/Java-Script/script.js')}}"></script>
    <script src="{{URL('assets/js/Java-Script/mobile.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script>
        ScrollTrigger.create({
            start: 'top -80',
            end: 99999,
            toggleClass: { className: 'main-tool-bar--scrolled', targets: '.main-tool-bar' }
        });

        function initializeAOS() {
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out',
                once: false,
                mirror: true
            });
        }

        initializeAOS();


    </script>


    {{-- End of Footer --}}
</body>
</html>
