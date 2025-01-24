<div class="max-w-screen-xl mx-auto py-10 px-6 md:px-10">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-start justify-around">

        <div class="p-4">
            <h2 class="text-2xl font-bold my-4 mx-2">Items</h2>
            @if (count($this->carts) < 1)
                <div
                    class="p-4 mb-4 card-shadow flex flex-row gap-4 items-center rounded-md hover:cursor-pointer text-center text-gray-200">
                    <p>-- empty cart --</p>
                </div>
            @endif
            @foreach ($this->carts as $cart)
                <a href="{{ route('product.detail', $cart->product->slug) }}"
                    class="p-4 mb-4 card-shadow flex flex-row gap-4 items-center rounded-md hover:cursor-pointer">
                    <img class="rounded-md w-28 h-28 object-cover" src="{{ $cart->product->media[0]->original_url }}" />

                    <div class="flex flex-col">
                        <h3 class="text-md font-semibold">{{ $cart->qty . ' x ' . $cart->product->name }}</h3>
                        <div class="text-xs font-thin">Price :
                            {{ 'Rp. ' . number_format($cart->product->price_per_unit, 2, ',', '.') }}</div>
                        <div class="text-semibold mt-3">Total :
                            {{ 'Rp. ' . number_format($cart->qty * $cart->product->price_per_unit, 2, ',', '.') }}
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        <div class="p-4">
            <div class="w-full p-4 card-shadow rounded-md bg-orange-50">
                <h2 class="text-2xl font-bold my-4 mx-2">Order Summary</h2>

                <div class="p-4 border-b">
                    <div class="flex flex-row justify-between">
                        <div>Total Price</div>
                        <div>{{ 'Rp. ' . number_format($this->totalPrice, 2, ',', '.') }}</div>
                    </div>
                    <div class="flex flex-row justify-between">
                        <div>Tax (11%) </div>
                        <div>{{ 'Rp. ' . number_format($this->totalTax, 2, ',', '.') }}</div>
                    </div>
                    <div class="flex flex-row justify-between">
                        <div class="text-lg font-semibold">Grand Total</div>
                        <div class="text-lg font-semibold">{{ 'Rp. ' . number_format($this->grandTotal, 2, ',', '.') }}
                        </div>
                    </div>
                </div>

                <div class="p-4">
                    <form wire:submit.prevent="placeOrder">
                        <div class="my-2">
                            <label for="payment-method"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment
                                Method</label>
                            <select id="payment-method" wire:model="paymentMethod"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <option value="">-- Select Payment Method --</option>
                                @foreach ($this->paymentMethods as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('paymentMethod')
                                <span class="mt-1 text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="my-2">
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shipping
                                Address</label>
                            <textarea id="address" rows="4" wire:model="address"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Write your address here..."></textarea>
                            @error('address')
                                <span class="mt-1 text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" {{ count($this->carts) < 1 ? 'disabled' : '' }}
                            wire:loading.attr="disabled"
                            class="w-full bg-orange-500 rounded-full py-2 text-white font-semibold my-2 hover:bg-orange-600 disabled:bg-gray-200">Place
                            order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- @php
            dd($this->totalPrice);
        @endphp --}}
</div>

</div>
