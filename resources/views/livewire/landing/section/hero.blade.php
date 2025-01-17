<section id="hero" class="bg-white">
    <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 py-10 px-6 md:px-10 items-center">
        <div class="text-center md:text-left" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
            <h1 class="max-w-2xl text-4xl lg:text-6xl font-extrabold">Seaside Delights &amp; <span
                    class="text-orange-500">Ocean's Bounty</span> Seafood</h1>
            <p class=" font-light text-lg py-4">Fresh Catches Delivered Daily: Fish, Crab, Lobster, and More!</p>
            <button id="book-btn" name="book-btn" class="bg-orange-500 py-2 px-4 rounded-full text-white"
                onclick="scrollToSection('catalogue')">Order
                Now</button>
        </div>
        <div data-aos="fade-down" data-aos-duration="1500" data-aos-delay="500">
            <div id="carousel-example" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    @foreach ($this->getImages() as $image)
                        <div class="hidden duration-1000 " data-carousel-item>
                            <img src="{{ $image }}"
                                class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
