@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
    {{-- <div class="row"> --}}
        {{-- <div class="col-sm-12"> --}}
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            {{-- carousel indicators --}}
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            {{-- Wrapper for carousel items --}}
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/bg.jpg') }}" alt="slide 1" class="img-fluid" width="100%" height="300px">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/fried-chicken.jpg') }}" alt="slide 2" class="img-fluid" width="100%" height="300px">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/img1.jpg') }}" alt="slide 3" class="img-fluid" width="100%" height="300px">
                </div>
            </div>
            {{-- carousel controls --}}
            <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#myCarousel" data-slide="next" class="carousel-control-next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    {{-- </div> --}}
    {{-- </div> --}}

{{-- </div> --}}


<div class="container text-black bg-light my-5">
    <div class="row">
        <div class="col-lg-6" >
            <h2 class="text-center text-uppercase">About Us</h2>
        </div>
        <div class="col-lg-6">
            <p class="lead">This blog is for anyone who loves to cook and for everyone who doesn’t. It gives everyone an opportunity to written all about their encounters with food. From writing food recepies to meet up with friends eating food, name it all, Kenyan Meals was made for that.</p>
            <a href="{{ route('register') }}" class="btn btn-primary text-center">Start Here</a>
        </div>
    </div>
</div>

<section>
    <div class="jumbotron text-center bg-info">
        <h2 class="text-dark">Are you a chef or just love food and want to blog about it ...</h2>
        <p class="lead">look no further Kenyan Meals Asscociation give you an opportunity to blog all kenyan meals</p>
        <p class="lead">Register <a href="/register">here</a> and start showcasing your skill to the world.</p>

    </div>
</section>

@endsection

