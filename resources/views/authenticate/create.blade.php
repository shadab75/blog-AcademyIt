@extends('layout.master')

@section('content')
    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="contact-form">
                        <form action="/register/store" method="post">
                            @csrf
                            <h2>Welcome to our Website</h2>
                            <div class="form-row">
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="name" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="email" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="mobile" class="form-control" placeholder="mobile" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="password" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="password confirm" />
                            </div>
                            <div><button class="btn" type="submit">Register</button></div>
                        </form>
                        @include('layout.errors')


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <h3>Get in Touch</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus.
                        </p>
                        <h4><i class="fa fa-map-marker"></i>123 News Street, NY, USA</h4>
                        <h4><i class="fa fa-envelope"></i>info@example.com</h4>
                        <h4><i class="fa fa-phone"></i>+123-456-7890</h4>
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
