<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">

            <div class="row g-5">
                <div class="col-lg-4">
                    <h3 class="footer-heading">About ZenBlog</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
                    <p><a href="about.html" class="footer-link-more">Learn More</a></p>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Navigation</h3>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{ route('home.index') }}"><i class="bi bi-chevron-right"></i> Home</a></li>
                        <li><a href="{{ route('news.all') }}"><i class="bi bi-chevron-right"></i> All News</a></li>
                        <li><a href="{{ route('news.breaking-news') }}"><i class="bi bi-chevron-right"></i> Breaking News</a></li>
                        <li><a href="about.html"><i class="bi bi-chevron-right"></i> About us</a></li>
                        <li><a href="contact.html"><i class="bi bi-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Categories</h3>
                    <ul class="footer-links list-unstyled">
                        @foreach($categories as $category)
                            <li><a href="{{ route('category.index', ['slug' => $category->slug]) }}"><i class="bi bi-chevron-right"></i> {{ $category->name }}</a></li>
                        @endforeach

                    </ul>
                </div>

                <div class="col-lg-4">
                    <h3 class="footer-heading">Recent Posts</h3>

                    <ul class="footer-links footer-blog-entry list-unstyled">
                        @php $count = 0; @endphp
                        @foreach($breaking_news as $item)
                            <li>
                                <a href="single-post.html" class="d-flex align-items-center">
                                    <img src="{{ asset($item->featured_image) }}" alt="" class="img-fluid me-3">
                                    <div>
                                        <div class="post-meta d-block"><span class="date">{{ $item->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $item->created_at->format('d-M-Y') }}</span></div>
                                        <span>{{ $item->title }}</span>
                                    </div>
                                </a>
                            </li>

                            @php
                                $count++;
                                if ($count == 4) {
                                    break;
                                }
                            @endphp

                        @endforeach

                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="footer-legal">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <div class="copyright">
                        Copyright @ 2023 All rights reserved <strong><span>NewsDaily</span></strong>
                    </div>

                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                        Developed by <a href="https://github.com/azharanowar/news-daily-laravel" target="_blank">Azhar Anowar</a>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
                        <a href="https://facebook.com/azharanowar" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="https://linkedin.com/in/azharanowar" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        <a href="https://github.com/azharanowar" target="_blank" class="linkedin"><i class="bi bi-github"></i></a>
                        <a href="https://twitter.com/azharanowar" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="https://instagram.com/azharanowar" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="mailto:azharanowar@gmail.com" target="_blank" class="google-plus"><i class="bi bi-envelope-fill"></i></a>
                    </div>

                </div>

            </div>

        </div>
    </div>

</footer>
