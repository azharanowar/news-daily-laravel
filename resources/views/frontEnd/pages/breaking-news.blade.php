@extends('frontEnd.master')

@section('title')
    Breaking News
@endsection

@section('main-content')
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-9" data-aos="fade-up">

                    <div class="pb-4">
                        <h2 class="text-center">Breaking News</h2>
                        <p class="text-muted text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad beatae dolor, earum eos exercitationem impedit iusto perspiciatis quae repellat soluta vero vitae voluptates? Iusto, minus.</p>
                    </div>

                    @foreach($breaking_news as $item)
                        <div class="d-md-flex post-entry-2 half">
                            <a href="" class="me-4 thumbnail">
                                <img src="{{ asset($item->featured_image) }}" alt="{{ $item->title }}" class="img-fluid">
                            </a>
                            <div>
                                <div class="post-meta"><span class="date">{{ $item->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $item->created_at->format('d-M-Y') }}</span></div>
                                <h3><a href="">{{ $item->title }}</a></h3>
                                <p>{{ $item->short_description }}</p>
                                <div class="d-flex align-items-center author">
                                    <div class="photo"><img src="{{ asset('frontEnd') }}/assets/img/person-2.jpg" alt="" class="img-fluid"></div>
                                    <div class="name">
                                        <h3 class="m-0 p-0">{{ $item->author->name }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="text-start py-4">
                        <div class="custom-pagination">
                            <a href="#" class="prev">Prevous</a>
                            <a href="#" class="active">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                            <a href="#" class="next">Next</a>
                        </div>
                    </div>

                </div>

                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    @include('frontEnd.includes.sidebar')

                </div>

            </div>
        </div>
    </section>
@endsection
