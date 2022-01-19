<div>
    <div class="@if ($show)
    translate-x-0 ease-out
    @else
    translate-x-full ease-in
    @endif fixed right-0 top-0 max-w-xs w-full z-20 h-full px-6 py-4 transition duration-300 transform overflow-y-auto
        bg-white border-l-2 border-gray-300">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
            <button wire:click='hideCart' class="text-gray-600 focus:outline-none">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <hr class="my-3">
        @if(isset($cartItems))
        @forelse ($cartItems as $cartItem)
        <div class="flex justify-between mt-6">
            <div class="flex">
                <img class="h-20 w-20 object-cover rounded" @if (isset($cartItem->productSku->product->image))
                src="/storage/{{$cartItem->productSku->product->image['image']}}"
                @else
                src="/images/example_20190110_8.jpg"
                @endif
                alt="">
                <div class="mx-3">
                    <button type="submit" wire:click='delete({{$cartItem}})'
                        class="bg-indigo-600 border border-transparent rounded-md py-1 px-2 flex items-center justify-center text-base font-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>

                    <h3 class="text-sm text-gray-600">{{$cartItem->productSku->name}}</h3>
                    <div class="flex items-center mt-2">
                        <button wire:click="increment({{$cartItem}})"
                            class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                        <span class="text-gray-700 mx-2">{{$cartItem->quantity}}</span>

                        <button wire:click="decrement({{$cartItem}})"
                            class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <span class="text-gray-600">${{$cartItem->productSku->product->price}}</span>
        </div>
        @empty

        @endforelse
        @endif

        {{-- <div class="mt-8">
            <form class="flex items-center justify-center">
                <input class="form-input w-48" type="text" placeholder="Add promocode">
                <button
                    class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    <span>Apply</span>
                </button>
            </form>
        </div> --}}

        @if (isset($cartItems))
        <button wire:click='orderNow'
            class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
            <span>Chechout</span>
            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </button>
        @else
        <p>Cart Is Empty</p>
        @endif
    </div>
</div>
