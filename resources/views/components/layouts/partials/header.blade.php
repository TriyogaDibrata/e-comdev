<nav class="bg-white border-gray-200 w-full p-4 fixed top-0 z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/fish-vector-green.webp') }}" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap font-montserrat">Devrillia Seafood</span>
        </a>
        <button id="toggle-btn" name="toggle-btn" data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-3 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white font-nunito">
                <li>
                    <a href="{{ route('landing') }}" wire:navigate
                        class="block py-2 px-3 text-black font-semibold rounded md:bg-transparent md:p-0 hover:text-orange-600 {{ request()->routeIs('landing') ? 'text-orange-400' : '' }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('catalogue') }}"
                        class="block py-2 px-3 text-black font-semibold rounded md:bg-transparent md:p-0 hover:text-orange-600 {{ request()->routeIs('catalogue') ? 'text-orange-400' : '' }}">Catalogue</a>
                </li>
                <li>
                    <a href="{{ route('cart') }}"
                        class="block py-2 px-3 text-black font-semibold rounded md:bg-transparent md:p-0 hover:text-orange-600 {{ request()->routeIs('cart') ? 'text-orange-400' : '' }}">Cart</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
