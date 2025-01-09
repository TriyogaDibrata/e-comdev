<div>
    <!-- Button to open modal -->
    <button onclick="toggleModal('cartModal-{{ $productId }}')"
        class="bg-orange-500 py-1 px-2 rounded-md text-white my-2">Add To Cart +</button>

    <!-- Modal -->
    <div id="cartModal-{{ $productId }}"
        class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Add to Cart</h3>
                <div class="mt-2">
                    <p>Product: {{ $productName }}</p>
                    <p>Price: {{ $productPrice }}</p>
                    <!-- Add more product details as needed -->
                </div>
                <div class="mt-4">
                    <button type="button" onclick="toggleModal('cartModal-{{ $productId }}')"
                        class="bg-red-500 text-white px-4 py-2 rounded">Close</button>
                    <button type="button" wire:click="addToCart({{ $productId }})"
                        class="bg-green-500 text-white px-4 py-2 rounded">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle("hidden");
    }
</script>
