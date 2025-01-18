<div class="max-w-screen-xl mx-auto py-10 px-6 md:px-10">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-start justify-around">


        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <div>
                <img src="{{ $product->media[0]->original_url }}"
                    class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                    alt="...">
            </div>
        </div>


        <div class="p-4 ">
            <div class="border-b border-b-gray-600">
                <h2 class="text-4xl font-bold text-orange-500 mb-4">{{ $product->name }}</h2>

                <span
                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{ $product->category->name }}</span>

                <div class="text-3xl font-light my-3">
                    {{ 'Rp. ' . number_format($product->price_per_unit, 2, ',', '.') . '/' . $product->unit->unit_letter_code }}
                </div>
            </div>
            <div class="my-2">
                <p class="text-gray-500 text-sm font-thin">{{ $product->description }}</p>
            </div>

            <div class="flex flex-row items-center gap-4 my-6">
                <button wire:click="decrement" {{ $count <= 1 ? 'disabled' : '' }}
                    class="bg-orange-200 py-2 px-4 rounded text-orange-500 disabled:bg-gray-200 disabled:text-gray-500">-</button>
                <h3 class="text-lg text-orange-500">{{ $count }}</h3>
                <button wire:click="increment" class="bg-orange-200 py-2 px-4 rounded text-orange-500">+</button>
            </div>

            <button wire:click="addToCart">Add to cart</button>
        </div>
    </div>


</div>
</div>
