<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{ route('cart.index') }}">
        <img alt="Surfside Media" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg')}}">
        <span class="pro-count blue">{{$number}}</span>
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @if ($cart)
            @foreach ($cart->Products as $item)
            <li>
                <div class="shopping-cart-img">
                    <a href="{{ route('get_details_product',$item->id) }}">
                        @if(Str::startsWith($item->photo,['http://','https://']))
                        <td><img src="{{$item->photo}}"></td>
                        @else
                        <td><img src="{{ asset('Images/' .$item->photo) }}"></td>
                        @endif
                    </a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="{{ route('get_details_product',$item->id) }}">{{ $item->name }}</a></h4>
                    <h4><span>{{ $item->pivot->quantity }} × </span>${{ $item->price }}</h4>
                </div>
                <div class="shopping-cart-delete">
                    <a wire:click="delete('{{ $item->pivot->id }}')"><i class="fi-rs-cross-small"></i></a>
                </div>
            </li>
            @endforeach
            @else
            <li>
                <div class="shopping-cart-title">
                    <h3>No Item Yet !!</h3>
                </div>
            </li>
            @endif
        </ul>
        <div class="shopping-cart-footer">
            @if($cart)
            <div class="shopping-cart-total">
                <h4>Total <span>${{$total}}</span></h4>
            </div>
            @endif
            <div class="shopping-cart-button">
                <a href="{{ route('cart.index') }}" class="outline">View cart</a>
                <a href="{{ route('checkout.index') }}">Checkout</a>
            </div>
        </div>
    </div>
</div>