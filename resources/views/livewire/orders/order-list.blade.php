<div class="max-w-screen-xl mx-auto py-10 px-6 md:px-10">
    <div class="max-w-screen-sm mx-auto rounded-lg p-4">
        <h1 class="font-bold text-3xl">Orders</h1>

        <div class="flex flex-col gap-4 my-4">

            @if (count($orders) < 1)
                <div class="w-full py-4 px-6 card-shadow rounded-lg text-center text-gray-300">
                    -- No Order History --
                </div>
            @endif

            @foreach ($orders as $order)
                <div class="w-full py-4 px-6 card-shadow rounded-lg">
                    <div class="flex flex-row justify-between items-center py-4 border-b border-b-gray-100">
                        <div class="flex flex-row gap-4 items-center">
                            <div class="p-4 h-14 w-14 rounded-full bg-orange-50">
                                <svg class="w-6 h-6 text-orange-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                                </svg>
                            </div>

                            <div class="w-full">
                                <div class="font-bold text-sm">{{ '#' . $order->ticket }}</div>
                                <span class="font-thin text-xs">{{ $order->created_at->format('j F Y') }}</span>
                            </div>
                        </div>
                        @switch($order->status)
                            @case(0)
                                <div
                                    class="px-6 py-1 bg-yellow-100 rounded-md text-black text-xs font-semibold ring-1 ring-yellow-300">
                                    New
                                </div>
                            @break

                            @case(1)
                                <div
                                    class="px-6 py-1 bg-blue-100 rounded-md text-black text-xs font-semibold ring-1 ring-blue-300 bg-opacity-75">
                                    Processing
                                </div>
                            @break

                            @case(2)
                                <div
                                    class="px-6 py-1 bg-purple-100 rounded-md text-black text-xs font-semibold ring-1 ring-purple-300 bg-opacity-75">
                                    Delivered
                                </div>
                            @break

                            @case(3)
                                <div
                                    class="px-6 py-1 bg-green-100 rounded-md text-black text-xs font-semibold ring-1 ring-green-300 bg-opacity-75">
                                    Delivered
                                </div>
                            @break

                            @case(4)
                                <div
                                    class="px-6 py-1 bg-red-100 rounded-md text-black text-xs font-semibold ring-1 ring-red-300 bg-opacity-75">
                                    Canceled
                                </div>
                            @break

                            @default
                                <div
                                    class="px-6 py-1 bg-gray-400 rounded-md text-white text-xs font-semibold ring-1 ring-gray-300 bg-opacity-75">
                                    Status Tidak Dikenali
                                </div>
                        @endswitch

                    </div>

                    <div class="p-4">
                        <div class="text-md font-semibold py-2">Items :</div>
                        @foreach ($order->orderItems as $item)
                            <div class="flex flex-row items-center gap-4">
                                <div class="h-2 w-2 rounded-full bg-orange-500"></div>
                                <div class="font-semibold text-sm"> {{ $item->qty . ' x ' . $item->product->name }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="p-4 flex flex-row justify-between">
                        <div class="flex flex-col">
                            <div class="text-xs font-semibold">Total (Price + Tax 11%)</div>
                            <div class="font-bold">{{ 'Rp. ' . number_format($order->grand_total, 2, ',', '.') }}</div>
                        </div>
                        <a href="{{ route('order.detail', $order->ticket) }}"
                            class="text-white bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Detail</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    {{-- @php
        dd($orders);
    @endphp --}}
</div>
