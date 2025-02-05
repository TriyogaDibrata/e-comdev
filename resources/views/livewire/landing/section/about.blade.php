<section id="catalogue" class="bg-white">
    <div class="max-w-screen-xl mx-auto py-10 px-6 md:px-10">

        <div class="max-w-screen mx-auto mb-6">
            <h1 class="text-4xl font-extrabold text-start"><span class="text-orange-500">About Us</span></h1>
        </div>

        <div class="max-w-screen mx-auto mb-6">
            <div class="flex flex-col-reverse gap-4 md:flex-row justify-between items-center">
                <div class="max-w-2xl pr-4">
                    <h3 class="text-2xl font-bold">
                        {{ $general->site_name }}
                    </h3>
                    <p class="mt-2 font-light text-sm">
                        {{ $general->site_description }}
                    </p>

                    <div>
                        <div class="flex flex-row items-center gap-4 mt-4">

                            <svg class="w-6 h-6 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                    clip-rule="evenodd" />
                            </svg>


                            <p class="text-sm font-bold">{{ $general->more_configs['address'] }}</p>

                        </div>

                        <div class="flex flex-row items-center gap-4 mt-4">

                            <svg class="w-6 h-6 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z" />
                            </svg>


                            <p class=" text-sm font-bold">{{ $general->support_phone }}</p>

                        </div>
                    </div>
                </div>

                <div class="p-4 rounded-lg shadow-round-shadow shadow-orange-100 min-w-80">
                    <img class="rounded-md" src="{{ asset('images/profil.png') }}" />
                </div>
            </div>
        </div>

        {{-- @php
            dd($general);
        @endphp --}}
</section>

{{-- box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; --}}
