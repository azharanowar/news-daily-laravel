<section id="hero-slider" class="hero-slider pt-0">
    <div class="" data-aos="fade-in">
        <div class="row">
            <div class="col-12">
                <div class="swiper sliderFeaturedPosts">
                    <div class="swiper-wrapper">
                        @foreach($slider_news as $item)
                            <div class="swiper-slide">
                                <a href="{{ route('news.details', ['slug' => $item->slug]) }}" class="img-bg d-flex align-items-end justify-content-center" style="background-image: url('{{ asset($item->featured_image) }}');">
                                    <div class="img-bg-inner text-center">
                                        <h2>{{ $item->title }}</h2>
                                        <p>{{ $item->short_description }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="custom-swiper-button-next">
                        <span class="bi-chevron-right"></span>
                    </div>
                    <div class="custom-swiper-button-prev">
                        <span class="bi-chevron-left"></span>
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
