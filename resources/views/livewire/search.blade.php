<div class="flex flex-col items-center mt-5">
    <div class="w-full md:w-1/2 flex flex-col items-center">
        <div class="w-full px-4">
            <div class="flex flex-col items-center relative">
                <div class="w-full">
                    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                        <div class="flex flex-auto flex-wrap"></div>
                        <input placeholder="Search" wire:model.debounce.500ms='search'
                            class="px-3 py-2 appearance-none outline-none w-full text-gray-800">
                        <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
                            <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                    xml:space="preserve" width="512px" height="512px">
                                    <path
                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @if ($products)
                <div
                    class="absolute shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
                    <div class="flex flex-col w-full">
                        @forelse ($products as $product)
                        <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100">
                            <div
                                class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                <div class="w-6 flex flex-col items-center">
                                    <div
                                        class="flex relative w-10 h-10 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">
                                        <img class="rounded-full" alt="A"
                                            src="https://randomuser.me/api/portraits/men/62.jpg">
                                    </div>
                                </div>
                                <div class="w-full items-center flex">
                                    <div class="mx-2 -mt-1">{{$product->name}}
                                        <div
                                            class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500">
                                            {{$product->description}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty

                        <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100">
                            <div
                                class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                <div class="w-6 flex flex-col items-center">
                                    <div
                                        class="flex relative w-10 h-10 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">
                                        <img class="rounded-full" alt="A"
                                            src="https://randomuser.me/api/portraits/men/62.jpg">
                                    </div>
                                </div>
                                <div class="w-full items-center flex">
                                    <div class="mx-2 -mt-1">result not exists <div
                                            class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500">
                                            --- ---
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
