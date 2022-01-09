<div>
    @if (session()->has('message'))
    <div class="p-2" class="shadow-md">
        <div class="inline-flex items-center bg-white leading-none rounded-full p-2 shadow text-sm" style="color: red">
            <span style="background: red"
                class="inline-flex text-white rounded-full h-6 px-3 justify-center items-center text-">Warning</span>
            <span class="inline-flex px-2">{{ session()->get('message') }}</span>
        </div>
    </div>
    @endif

    @if (session()->has('success'))
    <div class="p-2" class="shadow-md">
        <div class="inline-flex items-center bg-white leading-none rounded-full p-2 shadow text-sm"
            style="color: green">
            <span style="background: green"
                class="inline-flex text-white rounded-full h-6 px-3 justify-center items-center text-">Success</span>
            <span class="inline-flex px-2">{{ session()->get('success') }}</span>
        </div>
    </div>
    @endif

    <div class="w-full grid grid-cols-1 gap-y-8 gap-x-6 items-start sm:grid-cols-12 lg:gap-x-8">
        <div class="aspect-w-2 aspect-h-3 rounded-lg bg-gray-100 overflow-hidden sm:col-span-4 lg:col-span-5">
            <img @if (isset($product->image['image']))
            src="/storage/{{$product->image['image']}}"
            @else
            src="/images/product.jpg"
            @endif
            class="object-center object-cover">
        </div>
        <div class="sm:col-span-8 lg:col-span-7">
            <h2 class="text-2xl font-extrabold text-gray-900 sm:pr-12">
                {{$product->name}}
            </h2>

            <section aria-labelledby="information-heading" class="mt-2">
                <h3 id="information-heading" class="sr-only">Product information</h3>

                <p class="text-2xl text-gray-900">
                    ${{$product->price}}
                </p>

                <div class="mt-2">
                    @if ($stock > 0)
                    <div class="p-2" class="shadow-md">
                        <div class="inline-flex items-center bg-white leading-none rounded-full p-2 shadow text-sm"
                            style="color: green">
                            <span style="background: green"
                                class="inline-flex text-white rounded-full h-6 px-3 justify-center items-center text-"></span>
                            <span class="inline-flex px-2"> In stock
                            </span>
                        </div>
                    </div>
                    @else
                    <div class="p-2" class="shadow-md">
                        <div class="inline-flex items-center bg-white leading-none rounded-full p-2 shadow text-sm"
                            style="color: gray">
                            <span style="background: yellow"
                                class="inline-flex text-white rounded-full h-6 px-3 justify-center items-center text-"></span>
                            <span class="inline-flex px-2"> Out Of Stock
                            </span>
                        </div>
                    </div>
                    @endif
                </div>
            </section>

            <section aria-labelledby="options-heading" class="mt-2">
                <h3 id="options-heading" class="sr-only">Product options</h3>

                <div>
                    <h4 class="text-sm text-gray-900 font-medium">Color</h4>
                    <fieldset class="mt-2">
                        <legend class="sr-only">
                            Choose a color
                        </legend>
                        <div class="flex items-center space-x-3">
                            @foreach ($product->productSkus as $sku)
                            <label
                                class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400">
                                <input type="radio" value="{{$sku->colour->id}}" wire:model="colour" class="sr-only"
                                    aria-labelledby="color-choice-0-label">
                                <p id="color-choice-0-label" class="sr-only">
                                    {{$sku->colour->name}}
                                </p>
                                <span aria-hidden="true" style="background: {{$sku->colour->name}}"
                                    class="h-8 w-8 border border-black border-opacity-10 rounded-full"></span>
                            </label>
                            @endforeach
                        </div>
                    </fieldset>
                </div>

                <div class="mt-2">
                    <label class="text-gray-700 text-sm" for="count">Count:</label>
                    <div class="flex items-center mt-1">
                        <button wire:click="incrementCount"
                            class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                        <span class="text-gray-700 text-lg mx-2">{{$count}}</span>
                        <button wire:click="decrementCount"
                            class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="mt-5">
                    <div class="flex items-center justify-between">
                        <h4 class="text-sm text-gray-900 font-medium">Size</h4>
                    </div>

                    <fieldset class="mt-2">
                        <legend class="sr-only">
                            Choose a size
                        </legend>
                        <div class="grid grid-cols-4 gap-4">
                            @foreach ($product->productSkus as $sku)
                            <label
                                class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 bg-white shadow-sm text-gray-900 cursor-pointer">
                                <input type="radio" wire:model="size" value="{{$sku->size->id}}" class="sr-only"
                                    aria-labelledby="size-choice-4-label">
                                <p id="size-choice-4-label">
                                    {{$sku->size->name}}
                                </p>

                                <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true">
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </fieldset>
                </div>
                <div class="flex">
                    <button type="submit" wire:click="addToCart"
                        class="mt-3 w-1/2 mr-2 bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                        To Cart</button>
                </div>
            </section>
        </div>
    </div>
</div>
