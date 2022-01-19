<div>
    <div class="flex items-center justify-end w-full">

        <button wire:click="$emit('showCart')" class="notification text-gray-600 focus:outline-none mx-4 sm:mx-0">
            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <span
                class="absolute rounded-full bg-red-600 w-8 h-4 top right p-0 m-0 text-white font-mono text-sm  leading-tight text-center">{{$cart}}
            </span>
        </button>

        <div class="flex sm:hidden">
            <button type="button" wire:click="$emit('showCart')"
                class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500"
                aria-label="toggle menu">
                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                    <path fill-rule="evenodd"
                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                    </path>
                </svg>
                <span
                    class="absolute rounded-full bg-red-600 w-8 h-4 top right p-0 m-0 text-white font-mono text-sm  leading-tight text-center">{{$cart}}
                </span>
            </button>
        </div>
    </div>
</div>
