<nav class="bg-white border-gray-200 w-full p-4 fixed top-0 z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('landing') }}" class="flex flex-row items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo_de.png') }}" class="h-8" alt="Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap hidden md:block">
                Devrillia Seafood
            </span>
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
                class="font-medium flex flex-col p-3 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:items-center rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white font-nunito">
                <li>
                    <a href="{{ route('landing') }}"
                        class="block py-2 px-3 text-dark font-semibold rounded md:bg-transparent md:p-0 hover:text-orange-400 {{ request()->routeIs('landing') ? 'text-orange-400' : '' }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('product') }}"
                        class="block py-2 px-3 text-dark font-semibold rounded md:bg-transparent md:p-0 hover:text-orange-400 {{ request()->routeIs('product') ? 'text-orange-400' : '' }}">Products</a>
                </li>
                @if (Auth::user())
                    <li>
                        <button id="dropdownNavBarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex flex-row-reverse md:flex-row items-center gap-4 py-2 px-3">
                            <div class="flex flex-col items-start md:items-end">
                                <div class="font-semibold text-sm">{{ Auth::user()->name }}</div>
                                <p class="text-xs font-thin">{{ Auth::user()->email }}</p>
                            </div>
                            <img class="h-10 w-10 rounded-full object-contain bg-orange-200"
                                src="{{ Auth::user()->avatar ? Auth::user()->avatar : asset('images/user-icon.png') }}" />
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{ route('cart') }}"
                                        class="flex flex-row gap-4 items-center px-4 py-2 hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                                        </svg>
                                        <label>Cart</label>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('order') }}"
                                        class="flex flex-row gap-4 items-center px-4 py-2 hover:bg-gray-100">
                                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                                        </svg>

                                        <label>Order</label>
                                    </a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                  this.closest('form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                        out</a>
                                </form>
                            </div>
                        </div>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                            class="block py-2 px-3 bg-orange-500 text-white text-center font-semibold rounded-full md:bg-orange-500 md:py-2 md:px-4">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
