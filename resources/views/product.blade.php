@extends('layout')

@section('title', $product->name)

@section('banner')
    <section id="One" class="wrapper style3">
        <div class="inner">
            <header class="align-center">
                <p>Pocket PC</p>
                <h2>Shop</h2>
            </header>
        </div>
    </section>
@endsection

@section('content')
    <section id="two" class="wrapper style2">
        <div class="inner">
            <div class="box">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="card w-100 shadow-none border-0">
                                <div class="row">
                                    <aside class="col-sm-5 border-right">
                                        <article class="gallery-wrap">
                                            <div class="img-big-wrap">
                                                <div>
                                                    <img class="w-100" src="{{ asset('storage/' . $product->image) }}" alt="product">
                                                </div>
                                            </div> <!-- slider-product.// -->
                                        </article> <!-- gallery-wrap .end// -->
                                    </aside>
                                    <aside class="col-sm-7">
                                        <article class="card-body p-5">
                                            <h3 class="title mb-3">{{$product->name}}</h3>

                                            <p class="price-detail-wrap">
                                                <span class="price h3">
                                                    <span class="num">{{$product->presentPrice()}}</span>
                                                </span>
                                            </p> <!-- price-detail-wrap .// -->
                                            <dl class="item-property">
                                                <dt>Description</dt>
                                                <dd><p>{{$product->details}}</p></dd>
                                            </dl>
                                            <dl class="param param-feature">
                                                <dt>Model#</dt>
                                                <dd>12345611</dd>
                                            </dl>  <!-- item-property-hor .// -->

                                            <hr>

                                            <form action="{{route('cart.store')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <input type="hidden" name="price" value="{{ $product->price }}">

                                                <button type="submit" class="button special mt-3"> <i class="fas fa-shopping-cart"></i> Add to cart </button>
                                            </form>
                                        </article> <!-- card-body.// -->
                                    </aside> <!-- col.// -->
                                </div> <!-- row.// -->
                                <div class="row">
                                    <div class="col-md-12 mt-5">
                                        <p>{!! $product->description !!}</p>
                                    </div>
                                </div>
                            </div> <!-- card.// -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
