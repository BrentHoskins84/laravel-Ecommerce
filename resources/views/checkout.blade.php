@extends('layout')

@section('title', 'PocketPC-Shop')

@section('head')
    <script src="https://js.stripe.com/v3"></script>
@endsection


@section('banner')
    <section id="One" class="wrapper style3">
        <div class="inner">
            <header class="align-center">
                <p>Pocket PC</p>
                <h2>checkout</h2>
            </header>
        </div>
    </section>
@endsection

@section('content')
    <section id="two" class="wrapper style2">
        <div class="inner">
            <div class="box">
                <div class="content">
                    <!--Main layout-->
                    <div class="">
                        <div class="container-fluid">
                            <h2 class="mb-4 h2 text-center">Checkout form</h2>

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
                            <div class="row">
                                <div class="col-md-8 mb-4">
                                    <div class="card border-0 shadow-none">
                                        <form action="{{route('checkout.store')}}" method="POST" class="card-body" id="payment-form">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <!--firstName-->
                                                    <div class="md-form ">
                                                        <input type="text" id="firstName" class="form-control" value="{{old('firstName')}}" required>
                                                        <label for="firstName" class="">First name</label>
                                                        <div class="invalid-feedback">
                                                            First Name is Required.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-2">
                                                    <!--lastName-->
                                                    <div class="md-form">
                                                        <input type="text" id="lastName" class="form-control" value="{{old('lastName')}}" required>
                                                        <label for="lastName" class="">Last name</label>
                                                        <div class="invalid-feedback">
                                                            Last Name is Required.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--email-->
                                            <div class="md-form mb-5">
                                                @if(auth()->user())
                                                    <input type="text" id="email" class="form-control" placeholder="youremail@example.com" value="{{auth()->user()->email}}" readonly>
                                                @else
                                                    <input type="text" id="email" class="form-control" placeholder="youremail@example.com" value="{{old('emailstop')}}" required>
                                                @endif
                                                <label for="email" class="">Email</label>
                                            </div>

                                            <!--address-->
                                            <div class="md-form mb-2">
                                                <input type="text" id="address" class="form-control" placeholder="1234 Main St" value="{{old('address')}}" required>
                                                <label for="address" class="">Address</label>
                                                <div class="invalid-feedback">
                                                    Address is Required.
                                                </div>
                                            </div>

                                            <!--address-2-->
                                            <div class="md-form mb-2">
                                                <input type="text" id="address-2" class="form-control" placeholder="Apartment or suite" value="{{old('address-2')}}">
                                                <label for="address-2" class="">Address 2 (optional)</label>
                                            </div>

                                            <div class="row">

                                                <div class="col-lg-4 col-md-6 mb-2">

                                                    <label for="city">City</label>
                                                    <input type="text" class="form-control" id="city" placeholder="" value="{{old('city')}}"  required>
                                                    <div class="invalid-feedback">
                                                        City is Required.
                                                    </div>

                                                </div>

                                                <div class="col-lg-4 col-md-6 mb-2">

                                                    <label for="state">State</label>
                                                    <select class="custom-select d-block w-100" id="state" value="{{old('state')}}" required>
                                                        <option value="">Choose...</option>
                                                        <option>California</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid state.
                                                    </div>

                                                </div>

                                                <div class="col-lg-4 col-md-6 mb-2">

                                                    <label for="zip">Zip</label>
                                                    <input type="text" class="form-control" id="zip" placeholder="" value="{{old('zip')}}" required>
                                                    <div class="invalid-feedback">
                                                        Zip code required.
                                                    </div>

                                                </div>

                                            </div>

                                            <hr>

                                            <div id="card-element"><!--Stripe.js injects the Card Element--></div>

                                            <button type="submit" id="complete-order" class="special">

                                                <div class="spinner hidden" id="spinner"></div>

                                                <span id="button-text ">Pay</span>

                                            </button>

                                            <p id="card-errors" role="alert"></p>

                                        </form>

                                    </div>
                                    <!--/.Card-->

                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-4 mb-4">

                                    <!-- Heading -->
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Your cart</span>
{{--                                        <span class="badge badge-secondary badge-pill purple">{{Cart::content()->count()}}</span>--}}
                                    </h4>

                                    <!-- Cart -->
                                    <ul class="list-group mb-3 z-depth-1">
                                        @foreach(Cart::content() as $item )
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <h6 class="my-0">{{$item->model->name}}</h6>
                                                    <small class="text-muted">x {{$item->qty}}</small>
                                                </div>
{{--TODO Fix qty--}}
                                                <span class="text-muted">{{$item->model->presentPrice()}}</span>
                                            </li>
                                        @endforeach

                                        @if(session()->has('coupon'))
                                                <li class="list-group-item d-flex justify-content-between bg-light">
                                                    <div class="">
                                                        <h6 class="my-0"><strong class="text-muted">Subtotal</strong></h6>
                                                    </div>
                                                    <span class="text-muted"><strong>{{presentPrice(Cart::subtotal())}}</strong></span>
                                                </li>
                                            <li class="list-group-item d-flex justify-content-between bg-light">
                                                <div class="text-success">
                                                    <h6 class="my-0">Promo code</h6>
                                                    <div class="">
                                                        <small class="d-inline">{{session()->get('coupon')['name']}}</small>
                                                        <form class="my-0 d-inline-block" action="{{route('coupon.destroy')}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-promo py-0 px-1 btn-sm h-25">Remove</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <span class="text-success">{{presentPrice(session()->get('coupon')['discount'])}}</span>

                                            </li>
                                        @endif

                                        <li class="list-group-item d-flex justify-content-between bg-light">
                                            <div class="">
                                                @if(!session()->has('coupon'))
                                                    <h6 class="my-0"><strong class="text-muted">Subtotal</strong></h6>
                                                @else
                                                    <h6 class="my-0"><strong class="text-muted">New Subtotal</strong></h6>
                                                @endif
                                            </div>
                                            <span class="text-muted"><strong>{{presentPrice($newSubtotal)}}</strong></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between bg-light">
                                            <div class="">
                                                <h6 class="my-0"><strong class="text-muted">Tax</strong></h6>
                                                <small>(7.25)</small>
                                            </div>
                                            <span class="text-muted"><strong>{{presentPrice($newTax)}}</strong></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between bg-light">
                                            <span>Total (USD)</span>
                                            <strong>{{presentPrice($newTotal)}}</strong>
                                        </li>
                                    </ul>
                                    <!-- Cart -->
                                    @if(!session()->has('coupon'))
                                        <!-- Promo code -->
                                        <form class="card p-2" action="{{route('coupon.store')}}" method="POST">
                                            @csrf
                                            <div class="input-group">
                                                <input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Promo code" >
                                                <div class="input-group-append">
                                                    <button class="btn special btn-md waves-effect m-0" type="submit">Redeem</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-js')
    <script>
        (function(){
            let stripe = Stripe('pk_test_51GsKY2BD2TScTf0xYMyd58GiMjbnRWDLGzRK3Cn4kcloaN3gZosrPCbKlrul7M1QMd8hzLYO9yrclc9nNgqtxvus006BdiDk7j');
            let elements = stripe.elements();

            // Set up Stripe.js and Elements to use in checkout form
            let style = {
                base: {
                    color: "#32325d",
                    width: "100%",
                }
            };

            let card = elements.create("card", {
                style: style,
                hidePostalCode: true,
            });
            card.mount("#card-element");

            card.on('change', ({error}) => {
                const displayError = document.getElementById('card-errors');
                if (error) {
                    displayError.textContent = error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission
            let form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                // Disable the submit button to prevent repeated clicks
                document.getElementById('complete-order').disabled = true;
                let options = {
                    name: document.getElementById('firstName').value + " " +  document.getElementById('lastName').value,
                    email: document.getElementById('email').value,
                    address_line1: document.getElementById('address').value,
                    address_line2: document.getElementById('address-2').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('state').value,
                    address_zip: document.getElementById('zip').value,
                };
                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        let errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        // Enable the submit button
                        document.getElementById('complete-order').disabled = false;
                    } else {
                        // Send the token to your server
                        stripeTokenHandler(result.token);
                    }
                });
            });
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                let form = document.getElementById('payment-form');
                let hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        })();

    </script>
@endsection
