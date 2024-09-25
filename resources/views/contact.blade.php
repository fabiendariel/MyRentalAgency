@extends('base')

@section('title', 'Contact Us')

@section('content')

    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Contact Us</h1> 
                    <nav aria-label="breadcrumb animated fadeIn">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 animated fadeIn">
                <img class="img-fluid" src="img/header.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Contact Us</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="bg-light rounded p-3">
                                <div class="d-flex align-items-center bg-white rounded p-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                    <div class="icon me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <span>6596 2e Av., Montréal, QC H1Y 2Z4</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="bg-light rounded p-3">
                                <div class="d-flex align-items-center bg-white rounded p-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                    <div class="icon me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-envelope-open text-primary"></i>
                                    </div>
                                    <span>fabien.dariel@gmail.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="bg-light rounded p-3">
                                <div class="d-flex align-items-center bg-white rounded p-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                    <div class="icon me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-phone-alt text-primary"></i>
                                    </div>
                                    <span>+1 (438) 528 3971</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49711.705849559854!2d-73.60161478497021!3d45.53458373124458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc9194e22cccc17%3A0xae35380e0832b239!2s6596%202e%20Av.%2C%20Montr%C3%A9al%2C%20QC%20H1Y%202Z4!5e0!3m2!1sfr!2sca!4v1727213248406!5m2!1sfr!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">                        
                        <div class="mt-4">   
                            @include('shared.flash')
                            <form action="{{ route('contact.send') }}" method="post" class="vstack gap-3">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        @include('shared.input', [
                                        'class' => 'col',
                                        'label'=> 'First Name', 
                                        'name' => 'firstname'
                                        ])
                                    </div>
                                    <div class="col-md-6">
                                        @include('shared.input', [
                                        'class' => 'col',
                                        'label'=> 'Last Name', 
                                        'name' => 'lastname'
                                        ])
                                    </div>
                                    <div class="col-md-6">
                                        @include('shared.input', [
                                        'class' => 'col',
                                        'label'=> 'Phone', 
                                        'name' => 'phone'
                                        ])
                                    </div>
                                    <div class="col-md-6">
                                        @include('shared.input', [
                                        'type' => 'email',
                                        'class' => 'col',
                                        'label'=> 'Email Address', 
                                        'name' => 'email'
                                        ])
                                    </div>                                    
                                    <div class="col-12">
                                        @include('shared.input', [
                                        'class' => 'col',
                                        'label'=> 'Subject', 
                                        'name' => 'subject'
                                        ])
                                    </div>                                    
                                    <div class="col-12">
                                        <div class="form-group col">
                                            <label for="Message">Message</label>
                                            <textarea id="message" class="form-control @error("content") is-invalid @enderror contact_message"
                                            name="message">{{ old('message') }}</textarea>
                                            @error("message")
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


        
@endsection