@extends('layout.master')

@section('content')
    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="contact-form">
                        <form action="/roles/{{$role->id}}" method="post">
                            @csrf
                            @method('PATCH')
                            <h3>Edit {{$role->title}} Role</h3>
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="title" value="{{$role->title}}" />
                            </div>
                            <div class="form-group">
                                @foreach($permissions as $permission)

                                    <label class="ml-2">
                                        <input
                                            @if($role->hasPermission($permission))

                                                checked
                                             @endif
                                            type="checkbox" name="permissions[]" value="{{$permission->id}}">{{$permission->title}}
                                    </label>
                                @endforeach

                            </div>
                            <div><button class="btn" type="submit">Edit</button></div>
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
