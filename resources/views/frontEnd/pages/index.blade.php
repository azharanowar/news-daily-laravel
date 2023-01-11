@extends('frontEnd.master')

@section('title')
    Home
@endsection

@section('main-content')
    <!-- ======= Hero Slider Section ======= -->
        @include('frontEnd.includes.slider')
    <!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-4">

                    <div class="post-entry-1 lg">
                        <a href="single-post.html"><img src="{{ $breaking_news[0]->featured_image }}" alt="{{ $breaking_news[0]->title }}" class="img-fluid"></a>
                        <div class="post-meta"><a href="{{ route('category.index', ['slug' => $breaking_news[0]->category->slug]) }}" style="color: rgba(var(--color-black-rgb), 0.4)"><span class="date">{{ $breaking_news[0]->category->name }}</span></a> <span class="mx-1">&bullet;</span> <span>{{ $breaking_news[0]->created_at->format('d-M-Y') }}</span></div>
                        <h2><a href="single-post.html">{{ $breaking_news[0]->title }}</a></h2>
                        <p class="mb-4 d-block">{{ $breaking_news[0]->short_description }}</p>

                        <div class="d-flex align-items-center author">
                            <div class="photo"><img src="{{ asset('frontEnd') }}/assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                            <div class="name">
                                <h3 class="m-0 p-0">{{ $breaking_news[0]->author->name }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="post-entry-1 lg">
                        <a href="single-post.html"><img src="{{ $breaking_news[1]->featured_image }}" alt="{{ $breaking_news[1]->title }}" class="img-fluid"></a>
                        <div class="post-meta"><a href="{{ route('category.index', ['slug' => $breaking_news[1]->category->slug]) }}" style="color: rgba(var(--color-black-rgb), 0.4)"><span class="date">{{ $breaking_news[1]->category->name }}</span></a> <span class="mx-1">&bullet;</span> <span>{{ $breaking_news[1]->created_at->format('d-M-Y') }}</span></div>
                        <h2><a href="single-post.html">{{ $breaking_news[1]->title }}</a></h2>
                        <p class="mb-4 d-block">{{ $breaking_news[1]->short_description }}</p>

                        <div class="d-flex align-items-center author">
                            <div class="photo"><img src="{{ asset('frontEnd') }}/assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                            <div class="name">
                                <h3 class="m-0 p-0">{{ $breaking_news[1]->author->name }}</h3>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-8">
                    <div class="row g-5">
                        <div class="col-lg-4 border-start custom-border">
                            @php $count = 0; @endphp
                            @foreach($breaking_news as $item)
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="{{ $item->featured_image }}" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><a href="{{ route('category.index', ['slug' => $item->category->slug]) }}" style="color: rgba(var(--color-black-rgb), 0.4)"><span class="date">{{ $item->category->name }}</span></a> <span class="mx-1">&bullet;</span> <span>{{ $item->created_at->format('d-M-Y') }}</span></div>
                                    <h2><a href="single-post.html">{{ $item->title }}</a></h2>
                                </div>
                                @php
                                    $count++;
                                    if ($count == 3) {
                                        echo '</div>';
                                        echo '<div class="col-lg-4 border-start custom-border">';
                                    } else if ($count == 6) {
                                        break;
                                    }
                                @endphp
                            @endforeach
                        </div>

                        <!-- Trending Section -->
                            <div class="col-lg-4">

                            <div class="trending">
                                <h3>Trending</h3>
                                <ul class="trending-post">
                                    @php $count = 1; @endphp
                                    @foreach($trending_news as $item)
                                        <li>
                                            <a href="single-post.html">
                                                <span class="number">{{ $count }}</span>
                                                <h3>{{ $item->title }}</h3>
                                                <span class="author">{{ $item->author->name }}</span>
                                            </a>
                                        </li>

                                        @php
                                            $count++;
                                            if ($count == 6) {
                                                break;
                                            }
                                        @endphp

                                    @endforeach
                                </ul>
                            </div>

                        </div>
                        <!-- End Trending Section -->
                    </div>
                </div>

            </div> <!-- End .row -->
        </div>
    </section>
    <!-- End Post Grid Section -->

    <!-- ======= Culture Category Section ======= -->
    <section class="category-section">
        <div class="container" data-aos="fade-up">

            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>Culture</h2>
                <div><a href="category.html" class="more">See All Culture</a></div>
            </div>

            <div class="row">
                <div class="col-md-9">

                    <div class="d-lg-flex post-entry-2">
                        <a href="single-post.html" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                            <img src="{{ asset('frontEnd') }}/assets/img/post-landscape-6.jpg" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                            <h3><a href="single-post.html">What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente, laudantium dolorum itaque libero eos deleniti?</p>
                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="{{ asset('frontEnd') }}/assets/img/person-2.jpg" alt="" class="img-fluid"></div>
                                <div class="name">
                                    <h3 class="m-0 p-0">Wade Warren</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="post-entry-1 border-bottom">
                                <a href="single-post.html"><img src="{{ asset('frontEnd') }}/assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                                <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                            </div>

                            <div class="post-entry-1">
                                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="{{ asset('frontEnd') }}/assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                                <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Culture Category Section -->

    <!-- ======= Business Category Section ======= -->
    <section class="category-section">
        <div class="container" data-aos="fade-up">

            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>Business</h2>
                <div><a href="category.html" class="more">See All Business</a></div>
            </div>

            <div class="row">
                <div class="col-md-9 order-md-2">

                    <div class="d-lg-flex post-entry-2">
                        <a href="single-post.html" class="me-4 thumbnail d-inline-block mb-4 mb-lg-0">
                            <img src="{{ asset('frontEnd') }}/assets/img/post-landscape-3.jpg" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                            <h3><a href="single-post.html">What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente, laudantium dolorum itaque libero eos deleniti?</p>
                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="{{ asset('frontEnd') }}/assets/img/person-4.jpg" alt="" class="img-fluid"></div>
                                <div class="name">
                                    <h3 class="m-0 p-0">Wade Warren</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="post-entry-1 border-bottom">
                                <a href="single-post.html"><img src="{{ asset('frontEnd') }}/assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                                <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                            </div>

                            <div class="post-entry-1">
                                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="{{ asset('frontEnd') }}/assets/img/post-landscape-7.jpg" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                                <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Business Category Section -->

    <!-- ======= Lifestyle Category Section ======= -->
    <section class="category-section">
        <div class="container" data-aos="fade-up">

            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>Lifestyle</h2>
                <div><a href="category.html" class="more">See All Lifestyle</a></div>
            </div>

            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="post-entry-1 lg">
                        <a href="single-post.html"><img src="{{ asset('frontEnd') }}/assets/img/post-landscape-8.jpg" alt="" class="img-fluid"></a>
                        <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                        <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus exercitationem? Nihil tempore odit ab minus eveniet praesentium, similique blanditiis molestiae ut saepe perspiciatis officia nemo, eos quae cumque. Accusamus fugiat architecto rerum animi atque eveniet, quo, praesentium dignissimos</p>

                        <div class="d-flex align-items-center author">
                            <div class="photo"><img src="{{ asset('frontEnd') }}/assets/img/person-7.jpg" alt="" class="img-fluid"></div>
                            <div class="name">
                                <h3 class="m-0 p-0">Esther Howard</h3>
                            </div>
                        </div>
                    </div>

                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-entry-1">
                        <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                </div>

                <div class="col-lg-8">
                    <div class="row g-5">
                        <div class="col-lg-4 border-start custom-border">
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="{{ asset('frontEnd') }}/assets/img/post-landscape-6.jpg" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2><a href="single-post.html">Let’s Get Back to Work, New York</a></h2>
                            </div>
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="{{ asset('frontEnd') }}/assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 17th '22</span></div>
                                <h2><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                            </div>
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="{{ asset('frontEnd') }}/assets/img/post-landscape-4.jpg" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Mar 15th '22</span></div>
                                <h2><a href="single-post.html">Why Craigslist Tampa Is One of The Most Interesting Places On the Web?</a></h2>
                            </div>
                        </div>
                        <div class="col-lg-4 border-start custom-border">
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="{{ asset('frontEnd') }}/assets/img/post-landscape-3.jpg" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2><a href="single-post.html">6 Easy Steps To Create Your Own Cute Merch For Instagram</a></h2>
                            </div>
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="{{ asset('frontEnd') }}/assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Mar 1st '22</span></div>
                                <h2><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                            </div>
                            <div class="post-entry-1">
                                <a href="single-post.html"><img src="{{ asset('frontEnd') }}/assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                            </div>
                        </div>
                        <div class="col-lg-4">

                            <div class="post-entry-1 border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>

                            <div class="post-entry-1 border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>

                            <div class="post-entry-1 border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>

                            <div class="post-entry-1 border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>

                            <div class="post-entry-1 border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>

                            <div class="post-entry-1 border-bottom">
                                <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>

                        </div>
                    </div>
                </div>

            </div> <!-- End .row -->
        </div>
    </section><!-- End Lifestyle Category Section -->
@endsection
