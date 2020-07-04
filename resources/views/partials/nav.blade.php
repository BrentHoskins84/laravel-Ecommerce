<!-- Nav -->
<nav id="menu" class="d-flex flex-column">
    <ul class="links">
        @foreach($items as $menu_item)
            <li>
                <a href="{{ $menu_item->link() }}">
                    {{ $menu_item->title }}
                    @if ($menu_item->title === 'Cart')
                        @if (Cart::instance('default')->count() > 0)--}}
                                <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
                            @endif
                    @endif
                </a>
            </li>
        @endforeach
    </ul>

    @guest
        <div class="mt-auto">
            <hr class="hr--gray">
            <li><a class="button alt small fit" href="{{route('login')}}">Login</a></li>
            <li><a class="button alt small fit" href="{{route('register')}}">Sign Up</a></li>
        </div>
    @else
        <div class="mt-auto">
            <a class="button alt small fit" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    @endguest
</nav>
