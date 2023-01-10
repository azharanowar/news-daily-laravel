<div class="aside-block">

    <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-breaking-tab" data-bs-toggle="pill" data-bs-target="#pills-breaking" type="button" role="tab" aria-controls="pills-breaking" aria-selected="true">Breaking News</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="false">Popular</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Trending</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">

        <!-- Breaking -->
        <div class="tab-pane fade show active" id="pills-breaking" role="tabpanel" aria-labelledby="pills-latest-tab">
            @foreach($breaking_news as $item)
                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><a href="{{ route('category.index', ['slug' => $item->category->slug]) }}" style="color: rgba(var(--color-black-rgb), 0.4)"><span class="date">{{ $item->category->name }}</span></a> <span class="mx-1">&bullet;</span> <span>{{ $item->created_at->format('d-M-Y') }}</span></div>
                    <h2 class="mb-2"><a href="#">{{ $item->title }}</a></h2>
                    <span class="author mb-3 d-block">{{ $item->author->name }}</span>
                </div>
            @endforeach

        </div> <!-- End Breaking -->

        <!-- Popular -->
        <div class="tab-pane fade" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
            @foreach($popular_news as $item)
                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><a href="{{ route('category.index', ['slug' => $item->category->slug]) }}" style="color: rgba(var(--color-black-rgb), 0.4)"><span class="date">{{ $item->category->name }}</span></a> <span class="mx-1">&bullet;</span> <span>{{ $item->created_at->format('d-M-Y') }}</span></div>
                    <h2 class="mb-2"><a href="#">{{ $item->title }}</a></h2>
                    <span class="author mb-3 d-block">{{ $item->author->name }}</span>
                </div>
            @endforeach

        </div> <!-- End Popular -->

        <!-- Trending -->
        <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
            @foreach($trending_news as $item)
                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><a href="{{ route('category.index', ['slug' => $item->category->slug]) }}" style="color: rgba(var(--color-black-rgb), 0.4)"><span class="date">{{ $item->category->name }}</span></a> <span class="mx-1">&bullet;</span> <span>{{ $item->created_at->format('d-M-Y') }}</span></div>
                    <h2 class="mb-2"><a href="#">{{ $item->title }}</a></h2>
                    <span class="author mb-3 d-block">{{ $item->author->name }}</span>
                </div>
            @endforeach
        </div> <!-- End Trending -->

    </div>
</div>

<div class="aside-block">
    <h3 class="aside-title">Categories</h3>
    <ul class="aside-links list-unstyled">
        @foreach($categories as $category)
            <li><a href="{{ route('category.index', ['slug' => $category->slug]) }}"><i class="bi bi-chevron-right"></i> {{ $category->name }}</a></li>
        @endforeach
    </ul>
</div><!-- End Categories -->

<div class="aside-block">
    <h3 class="aside-title">Tags</h3>
    <ul class="aside-tags list-unstyled">
        @foreach($tags as $tag)
            <li><a href="{{ route('tag.index', ['slug' => $tag->slug]) }}">{{ $tag->name }}</a></li>
        @endforeach
    </ul>
</div><!-- End Tags -->
