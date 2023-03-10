<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('home.index') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="{{ asset('frontEnd') }}/assets/img/logo.png" alt=""> -->
            <h1 class="">News <span class="text-muted">Daily</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('news.all') }}">All News</a></li>
                <li><a href="{{ route('news.breaking-news') }}">Breaking News</a></li>
                <li class="dropdown"><a href=""><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('category.index', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="{{ route('home.about-me') }}">About Me</a></li>
                <li><a href="{{ route('home.contact-me') }}">Contact</a></li>
            </ul>
        </nav><!-- .navbar -->

        <div class="position-relative">
            <a href="https://facebook.com/azharanowar" class="mx-2" target="_blank"><span class="bi-facebook"></span></a>
            <a href="https://github.com/azharanowar" class="mx-2" target="_blank"><span class="bi-github"></span></a>
            <a href="https://linkedin.com/in/azharanowar" class="mx-2" target="_blank"><span class="bi-linkedin"></span></a>
            <a href="https://twitter.com/azharanowar" class="mx-2" target="_blank"><span class="bi-twitter"></span></a>

            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="search-result.html" class="search-form">
                    <span class="icon bi-search"></span>
                    <input type="text" placeholder="Search" class="form-control">
                    <button class="btn js-search-close"><span class="bi-x"></span></button>
                </form>
            </div><!-- End Search Form -->

        </div>

    </div>

</header>
