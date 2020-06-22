
<div class="container">
    <ul class="icons">
        @foreach($items as $menu_item)
            <li><a href="{{ $menu_item->link() }}" class="icon {{ $menu_item->title }}"></a></li>
        @endforeach
{{--        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>--}}
{{--        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>--}}
{{--        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>--}}
{{--        <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>--}}
    </ul>
</div>


