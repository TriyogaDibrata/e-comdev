<section id="catalogue" class="bg-orange-50">
    <div class="max-w-screen-xl mx-auto py-10 px-6 md:px-10">

        <div class="max-w-lg mx-auto mb-6">
            <h1 class="text-4xl font-extrabold text-center"><span class="text-orange-500">Fresh
                    Seafood</span></h1>
        </div>
        <div class="flex flex-col items-center justify-center md:flex-row md:justify-around gap-4">

            @foreach ($this->getProducts() as $product)
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg card-shadow">
                    <a href="{{ route('product.detail', $product->slug) }}">
                        <img class="rounded-t-lg w-full object-cover mb-2 h-52" src="{{ $product->media[0]->getUrl() }}"
                            alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <div class="flex flex-row justify-between items-center">
                            <div class="text-sm font-thin">
                                {{ 'IDR ' . number_format($product->price_per_unit, 0, ',', '.') . '/' . $product->unit->unit_letter_code }}
                            </div>
                            <div class="flex justify-end my-4">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                </div>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                            </div>
                        </div>
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $product->name }}</h5>
                        </a>
                        <p class="text-sm font-thin line-clamp-2 mb-3">{{ $product->description }}</p>
                        <div class="flex items-center justify-end">
                            <a href="{{ route('product.detail', $product->slug) }}"
                                class="text-white bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-full mx-auto flex justify-center items-center my-6">
            <a class="text-orange-500 hover:text-orange-600" href="{{ route('product') }}">See More</a>
        </div>
    </div>
</section>
