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
                        <a href="{{ route('news.details', ['slug' => $breaking_news[0]->slug]) }}"><img src="{{ $breaking_news[0]->featured_image }}" alt="{{ $breaking_news[0]->title }}" class="img-fluid"></a>
                        <div class="post-meta"><a href="{{ route('category.index', ['slug' => $breaking_news[0]->category->slug]) }}" style="color: rgba(var(--color-black-rgb), 0.4)"><span class="date">{{ $breaking_news[0]->category->name }}</span></a> <span class="mx-1">&bullet;</span> <span>{{ $breaking_news[0]->created_at->format('d-M-Y') }}</span></div>
                        <h2><a href="{{ route('news.details', ['slug' => $breaking_news[0]->slug]) }}">{{ $breaking_news[0]->title }}</a></h2>
                        <p class="mb-4 d-block">{{ $breaking_news[0]->short_description }}</p>

                        <div class="d-flex align-items-center author">
                            <div class="photo"><img src="{{ asset('frontEnd') }}/assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                            <div class="name">
                                <h3 class="m-0 p-0">{{ $breaking_news[0]->author->name }}</h3>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-8">
                    <div class="row g-5">
                        <div class="col-lg-4 border-start custom-border">
                            @foreach($breaking_news as $key => $item)
                                @if($key == 0)
                                    @php continue; @endphp
                                @endif
                                <div class="post-entry-1">
                                    <a href="{{ route('news.details', ['slug' => $item->slug]) }}"><img src="{{ $item->featured_image }}" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><a href="{{ route('category.index', ['slug' => $item->category->slug]) }}" style="color: rgba(var(--color-black-rgb), 0.4)"><span class="date">{{ $item->category->name }}</span></a> <span class="mx-1">&bullet;</span> <span>{{ $item->created_at->format('d-M-Y') }}</span></div>
                                    <h2><a href="{{ route('news.details', ['slug' => $item->slug]) }}">{{ $item->title }}</a></h2>
                                </div>
                                @php
                                    if ($key == 3) {
                                        echo '</div>';
                                        echo '<div class="col-lg-4 border-start custom-border">';
                                    } else if ($key == 6) {
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
                                            <a href="{{ route('news.details', ['slug' => $item->slug]) }}">
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

    <!-- ======= Category Based News ======= -->
    @foreach($home_categories as $home_category)
        <section class="category-section">
            <div class="container" data-aos="fade-up">

                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <h2>{{ $home_category->name }}</h2>
                    <div><a href="{{ route('category.index', ['slug' => $home_category->slug]) }}" class="more">See All {{ $home_category->name }}</a></div>
                </div>

                <div class="row g-5">
                    <div class="col-lg-4">
                        <div class="post-entry-1 lg">
                            <a href="{{ route('news.details', ['slug' => $item->slug]) }}"><img src="{{ $home_category->news[0]->featured_image }}" alt="{{ $home_category->news[0]->title }}" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">{{ $home_category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $home_category->news[0]->created_at->format('d-M-Y') }}</span></div>
                            <h2><a href="{{ route('news.details', ['slug' => $item->slug]) }}">{{ $home_category->news[0]->title }}</a></h2>
                            <p class="mb-4 d-block">{{ $home_category->news[0]->short_description }}</p>

                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="{{ asset('frontEnd') }}/assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                                <div class="name">
                                    <h3 class="m-0 p-0">{{ $home_category->news[0]->author->name }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">{{ $home_category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $home_category->news[1]->created_at->format('d-M-Y') }}</span></div>
                            <h2 class="mb-2"><a href="{{ route('news.details', ['slug' => $item->slug]) }}">{{ $home_category->news[1]->title }}</a></h2>
                            <span class="author mb-3 d-block">{{ $home_category->news[1]->author->name }}</span>
                        </div>

                        <div class="post-entry-1">
                            <div class="post-meta"><span class="date">{{ $home_category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $home_category->news[2]->created_at->format('d-M-Y') }}</span></div>
                            <h2 class="mb-2"><a href="{{ route('news.details', ['slug' => $item->slug]) }}">{{ $home_category->news[2]->title }}</a></h2>
                            <span class="author mb-3 d-block">{{ $home_category->news[2]->author->name }}</span>
                        </div>

                    </div>

                    <div class="col-lg-8">
                        <div class="row g-5">
                            <div class="col-lg-4 border-start custom-border">
                                @foreach($home_category->news as $key => $item)
                                    @if($key == 0)
                                        @php continue; @endphp
                                    @endif
                                    <div class="post-entry-1">
                                        <a href="{{ route('news.details', ['slug' => $item->slug]) }}"><img src="{{ $item->featured_image }}" alt="" class="img-fluid"></a>
                                        <div class="post-meta"><a href="{{ route('category.index', ['slug' => $item->category->slug]) }}" style="color: rgba(var(--color-black-rgb), 0.4)"><span class="date">{{ $item->category->name }}</span></a> <span class="mx-1">&bullet;</span> <span>{{ $item->created_at->format('d-M-Y') }}</span></div>
                                        <h2><a href="{{ route('news.details', ['slug' => $item->slug]) }}">{{ $item->title }}</a></h2>
                                    </div>
                                    @php
                                        if ($key == 3) {
                                            echo '</div>';
                                            echo '<div class="col-lg-4 border-start custom-border">';
                                        } else if ($key == 6) {
                                            break;
                                        }
                                    @endphp
                                @endforeach
                            </div>
                            <div class="col-lg-4">
                                @foreach($home_category->news as $key => $item)
                                    @php
                                        if ($key == 5) {
                                            break;
                                        }
                                    @endphp
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta"><span class="date">{{ $item->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $item->created_at->format('d-M-Y') }}</span></div>
                                        <h2 class="mb-2"><a href="{{ route('news.details', ['slug' => $item->slug]) }}">{{ $item->title }}</a></h2>
                                        <span class="author mb-3 d-block">{{ $item->author->name }}</span>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div> <!-- End .row -->
            </div>
        </section>
    @endforeach
    <!-- End Category Based New -->
@endsection
