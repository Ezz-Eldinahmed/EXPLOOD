<x-app-layout>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 mt-5">
        <div class="px-2">
            <div class="shadow-lg rounded-lg bg-blue-300">
                <img alt="..." style="height: 300px" @if (isset($category->image['image']))
                src="/storage/{{$category->image['image']}}"
                @else
                src="/images/category.jpg"
                @endif
                class="w-full align-middle rounded-lg">
                <blockquote class="relative p-4">
                    <h4 class="text-xl font-bold text-white">
                        {{$category->name}}
                    </h4>
                    <p class="text-md font-light text-white">{{$category->slug}}</p>
                </blockquote>
            </div>
        </div>
        <div class="col-span-2">
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                @forelse ($category->products as $product )
                <a href="{{route('products.show',$product)}}">
                    <div class="pb-2 mx-1 bg-gray-100" style="margin-bottom: 5px">
                        <div class="text-blueGray-500 text-center inline-flex items-center justify-center">
                            <img @if (isset($product->image['image'])) src="/storage/{{$product->image['image']}}" @else
                            src="/images/product.jpg"
                            @endif>
                        </div>
                        <div class="px-2">
                            <h6 class="text-xl mb-1 font-semibold">{{$product->name}}</h6>
                            <p class="text-sm mb-2 text-blueGray-500">{{$product->description}}</p>
                            <p class="text-right text-blueGray-500">${{$product->price}}</p>
                        </div>
                    </div>
                </a>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
