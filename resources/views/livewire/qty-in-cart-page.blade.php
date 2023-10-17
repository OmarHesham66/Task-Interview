<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table shopping-summery text-center clean">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($cart)
                            @foreach ($cart->Products as $key => $item)
                            <tr>
                                <td class="image product-thumbnail"><img src="{{ $item->photo }}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h5 class="product-name">
                                        <a href="{{ route('get_details_product',$item->id) }}">{{$item->name}}</a>
                                    </h5>
                                    <p class="font-xs">{{ $item->describtion }}
                                    </p>
                                </td>
                                <td class="price" data-title="Price"><span>${{ $item->price }}</span></td>
                                <td class="text-center" data-title="Stock">
                                    <div class="detail-qty border radius  m-auto">
                                        <a wire:click='updateDown("{{ $item->pivot->id }}")' class="qty-down"><i
                                                class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">{{ $item->pivot->quantity }}</span>
                                        <a wire:click='updateUp("{{ $item->pivot->id }}")' class="qty-up"><i
                                                class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                </td>
                                <td class="text-right" data-title="Cart">
                                    <span>${{ $item->price * $item->pivot->quantity }}</span>
                                </td>
                                <td class="action" data-title="Remove"><a wire:click='delete("{{ $item->pivot->id }}")'
                                        class="text-muted"><i class="fi-rs-trash"></i></a></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="7" class="text-end">
                                    <a wire:click='empty' class="text-muted"> <i class="fi-rs-cross-small"></i> Clear
                                        Cart</a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="6" style="font-weight:bolder;font-size:1.2em">No Items Yet ...</td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="cart-action text-end">
                    <a href="{{ route('get_shop') }}" class="btn"><i class="fi-rs-shopping-bag mr-10"></i>Continue
                        Shopping</a>
                </div>
                <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                @if ($cart)
                <div class="row mb-50">
                    <div class="col-lg-6 col-md-12">
                        <div class="border p-md-4 p-30 border-radius cart-totals">
                            <div class="heading_s1 mb-3">
                                <h4>Cart Totals</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="cart_total_label">Cart Subtotal</td>
                                            <td class="cart_total_amount"><span
                                                    class="font-lg fw-900 text-brand">${{$total}}</span></td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="cart_total_label">Shipping</td>
                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free
                                                Shipping</td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Total</td>
                                            <td class="cart_total_amount"><strong><span
                                                        class="font-xl fw-900 text-brand">${{ $total
                                                        }}</span></strong>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('checkout.index') }}" class="btn "> <i class="fi-rs-box-alt mr-10"></i>
                                Proceed To
                                CheckOut</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>