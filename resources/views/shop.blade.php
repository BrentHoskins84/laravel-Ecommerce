@extends('layout')

@section('title', 'PocketPC-Shop')

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
                            <div class="col-md-3 d-none d-md-block">
                                <div class="single category">
                                    <h3 class="side-title">Category</h3>
                                    <ul class="list-unstyled">
                                        @foreach($categories as $cat)
                                            <li><a class="{{ request()->category === $cat->slug ? 'active' : '' }}" href="{{route('shop.index', ['category' => $cat->slug])}}" title="">{{$cat->name}}</a></li>
{{--                                            <span class="pull-right">{{$cat->count()}}</span> this should go in the a tag--}}
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <div class="col-md-9">

                                <div class="container">
                                    <div class="row d-flex justify-content-between">
                                        <h1>{{$categoryName}}</h1>
                                        <div class="ml-auto d-flex align-items-center">
                                            <strong>Price:</strong>
                                            <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'low_high'])}}" class="px-1">low to high</a>
                                             |
                                            <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'high_low'])}}" class="px-1">high to low</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                                                <a href="{{route('shop.show', $product->slug)}}">
                                                    <div class="card border-0 shadow-none my-4">
                                                        <img class="card-img" src="{{ productImage($product->image) }}" alt="Product">
                                                        <div class="card-body">
                                                            <h4 class="card-title float-none mb-1">{{$product->name}}</h4>
                                                            <h6 class="card-subtitle mb-2 text-muted">SKU: {{$product->SKU}}</h6>
                                                            <p class="card-text" style="color: black;">
                                                                {{$product->details}}
                                                            </p>
                                                            <div class="buy d-flex justify-content-between flex-column">
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
                                        <div class="shop-pagination mx-auto">
                                            {{$products->appends(request()->input())->links()}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
