@extends('layout')

@section('title', 'PocketPC-Shop')

@section('banner')
    <section id="One" class="wrapper style3">
        <div class="inner">
            <header class="align-center">
                <p>Pocket PC</p>
                <h2>Cart</h2>
            </header>
        </div>
    </section>
@endsection

@section('content')
    <section id="cart" class="wrapper style2">
        <div class="inner">
            <div class="box">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            @if (session()->has('success_message'))
                                <div class="alert alert-success w-100">
                                    {{ session()->get('success_message') }}
                                </div>
                            @endif

                            @if(count($errors) > 0)
                                <div class="alert alert-danger w-100">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            @if(Cart::count())
                                <div class="col-lg-8">

                                <!-- Shopping cart table -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="p-2 px-3 text-uppercase">Product</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Price</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Quantity</div>
                                            </th>
                                            <th scope="col" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Remove</div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(Cart::content() as $item)
                                            <tr>
                                                <th scope="row">
                                                    <div class="p-2">
                                                        <img src="{{ asset('storage/' . $item->model->image) }}" alt="product" width="70" class="img-fluid rounded shadow-sm">
                                                        <div class="ml-3 d-inline-block align-middle">
                                                            <h5 class="mb-0"> <a href="{{route('shop.show', $item->model->slug)}}" class="text-dark d-inline-block align-middle">{{$item->model->name}}</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: Watches</span>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="border-0 align-middle"><strong>{{$item->model->presentPrice()}}</strong></td>
                                                <td class="border-0 align-middle text-center"><strong>{{$item->qty}}</strong></td>
                                                <td class="border-0 align-middle">
                                                    <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="text-dark cart-btn"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End -->
                            </div>
                            @else
                                <div class="col-lg-8">
                                    <h3>{{Cart::count()}} item(s) in your shopping cart</h3>
                                    <a href="{{route('shop.index')}}" class="button special mt-3"> <i class="fas fa-arrow-left"></i> Continue Shopping </a>
                                </div>
                            @endif

                            <div class="col-lg-4">
                                <div class="border-0 bg-light px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                                <div class="p-4">
                                    <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                                    <ul class="list-unstyled mb-4">
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>{{presentPrice(Cart::subtotal())}}</strong></li>
{{--                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li>--}}
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax(7.25)</strong><strong>{{presentPrice(Cart::tax())}}</strong></li>
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                            <h5 class="font-weight-bold">{{presentPrice(Cart::total())}}</h5>
                                        </li>
                                    </ul><a href="{{route('checkout.index')}}" class="button special mt-3">Procceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
