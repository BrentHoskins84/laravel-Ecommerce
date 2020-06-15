@extends('layout')

@section('title', 'PocketPC')

@section('banner')
    <!-- Banner -->
    <section class="banner full">
        <article>
            <img src="images/inside-laptop.jpg" alt="" />
            <div class="inner">
                <header>
                    <p>Welcome</p>
                    <h2>Pocket PC</h2>
                </header>
            </div>
        </article>
        <article>
            <img src="images/inside_hd.jpg" alt="" />
            <div class="inner">
                <header>
                    <p>Lorem ipsum dolor sit amet nullam feugiat</p>
                    <h2>Magna etiam</h2>
                </header>
            </div>
        </article>
    </section>
@endsection

@section('content')
    <!-- One -->
    <section id="one" class="wrapper style2">

        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                        <a href="{{route('shop.show', $product->slug)}}">
                            <div class="card">
                                <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">
    {{--                            <div class="card-img-overlay d-flex justify-content-end">--}}
    {{--                                <a href="#" class="card-link text-danger like">--}}
    {{--                                    <i class="fas fa-heart"></i>--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
                                <div class="card-body">
                                    <h4 class="card-title float-none mb-1">{{$product->name}}</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">SKU: {{$product->SKU}}</h6>
                                    <p class="card-text" style="color: black;">
                                        {{$product->details}}
                                    </p>
                                    <div class="buy d-flex justify-content-between align-items-center">
                                        <div class="price text-success"><h5 class="mt-4">{{$product->presentPrice()}}</h5></div>
                                        <form action="{{route('cart.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">

                                            <button type="submit" class="button special mt-3"> <i class="fas fa-shopping-cart"></i> Add to cart </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section id="two" class="wrapper style3">
        <div class="inner">
            <header class="align-center">
                <p>Nam vel ante sit amet libero scelerisque facilisis eleifend vitae urna</p>
                <h2>Morbi maximus justo</h2>
            </header>
        </div>
    </section>


    <section id="three" class="wrapper style2">
        <div class="inner">
            <header class="align-center">
                <p class="special">Nam vel ante sit amet libero scelerisque facilisis eleifend vitae urna</p>
                <h2>Morbi maximus justo</h2>
            </header>
            <div class="gallery">
                <div>
                    <div class="image fit">
                        <a href="#"><img src="images/pic01.jpg" alt="" /></a>
                    </div>
                </div>
                <div>
                    <div class="image fit">
                        <a href="#"><img src="images/pic02.jpg" alt="" /></a>
                    </div>
                </div>
                <div>
                    <div class="image fit">
                        <a href="#"><img src="images/pic03.jpg" alt="" /></a>
                    </div>
                </div>
                <div>
                    <div class="image fit">
                        <a href="#"><img src="images/pic04.jpg" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
