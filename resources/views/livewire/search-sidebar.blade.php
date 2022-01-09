<div>
    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
        <input placeholder="Search" wire:model.debounce.500ms='search' type="search"
            class="px-3 py-2 appearance-none outline-none w-full text-gray-800">
        <div class="text-gray-300 w-8 pl-2 pr-1 border-l flex items-center border-gray-200">
            <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                width="512px" height="512px">
                <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
            </svg>
        </div>
    </div>

    @foreach ($products as $product)
    <a href="{{route('products.show',$product->id)}}">
        <div
            class="container w-full items-center z-10 p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
            <div class="w-6 items-center shadow-xl">
                <div class="relative w-20 h-20 justify-center items-center m-1 mr-2 mt-1 rounded-full">
                    <img class="rounded-full" @if (isset($product->image['image']))
                    src="/storage/{{$product->image['image']}}"
                    @else
                    src="/images/new-product-development-process.jpg"
                    @endif
                    >
                </div>
            </div>
            <div class="w-full items-center">
                <div class="mx-2 -mt-1">{{$product->name}}
                    <div class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500">
                        {{$product->description}}</div>
                </div>
            </div>
        </div>
    </a>
    @endforeach

    <div class="relative my-3 pt-1">
        <label class="form-label block text-sm font-medium text-gray-700">Price</label>
        <div class="grid grid-cols-2">
            <div>
                <input type="number" wire:model="lowest" placeholder="Least"
                    class="mt-1 mr-2 w-full focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
                <input type="number" wire:model="highest" placeholder="Highest"
                    class="mt-1 mr-2 w-full focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>
    </div>

    <fieldset>
        <legend class="text-base font-medium text-gray-900">Category</legend>
        @foreach ($categories as $category)
        <div class="mt-2">
            <div class="flex items-start">
                <div class="flex items-center">
                    <input id="category_id" wire:model="category_id" type="radio" value="{{$category->id}}"
                        class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                </div>
                <div class="ml-3 text-sm">
                    <label for="category_id" class="font-medium text-gray-700">{{$category->name}}</label>
                    <p class="text-gray-500">{{$category->slug}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </fieldset>
</div>
