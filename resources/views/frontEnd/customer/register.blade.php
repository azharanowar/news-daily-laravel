@extends('frontEnd.master')

@section('title')
    Register
@endsection

@section('main-content')
    <section id="contact" class="contact mb-5">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Register</h1>
                </div>
            </div>

            <div class="form mt-5">
                <form action="{{ route('customer.register-customer') }}" method="POST" class="contact-me-form">

                    @csrf

                    @if(session('message'))
                        <h4 class="text-success text-center py-3">
                            {{ session('message') }}
                        </h4>
                    @endif

                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" id="name" placeholder="Your Name">
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" name="email" id="email" placeholder="Your Email">
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control {{ $errors->has('subject') ? 'border-danger' : '' }}" name="subject" id="subject" placeholder="Subject">
                        <span class="text-danger">{{ $errors->has('subject') ? $errors->first('subject') : '' }}</span>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control {{ $errors->has('message') ? 'border-danger' : '' }}" name="message" rows="5" placeholder="Message"></textarea>
                        <span class="text-danger">{{ $errors->has('message') ? $errors->first('message') : '' }}</span>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>

                </form>
            </div><!-- End Contact Form -->

        </div>
    </section>
@endsection
