<form wire:submit.prevent='save'>
    @csrf
    <div class="detail-extralink">
        <select class="detail-qty border radius" wire:model.defer="qty">
            @for ($a = 1; $a <= $product->quantity; $a++) <option>{{ $a }}</option>
                @endfor
        </select>
        <div class="product-extra-link2">
            <button type="submit" class="button button-add-to-cart">Add to
                cart</button>
        </div>
    </div>
    <ul class="product-meta font-xs color-grey mt-50">
        <li>Availability:<span class="in-stock text-success ml-5">{{$product->quantity}} Items
                In Stock</span></li>
    </ul>
</form>