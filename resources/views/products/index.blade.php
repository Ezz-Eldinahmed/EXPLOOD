<x-app-layout>
    <h3 class="text-gray-700 text-2xl font-medium">Products</h3>

    <div class="bg-white">
        <div class="max-w-4xl mx-auto py-10 px-4 sm:py-16 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Products</h2>

            <div class="grid grid-cols-1 gap-y-5 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @forelse ($products as $product)
                <a href="{{route('products.show',$product)}}" class="group">
                    <div
                        class="w-full aspect-w-1 aspect-h-1 bg-gray-100 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                        <img @if (isset($product->image['image'])) src="/storage/{{$product->image['image']}}" @else
                        src="/images/product.jpg" @endif
                        class="w-full h-full object-center object-cover group-hover:opacity-75">
                    </div>
                    <h4 class="mt-2 text-gray-700">
                        {{$product->name}}
                    </h4>
                    <p class="text-sm">
                        {{$product->slug}}
                    </p>
                    <p class="text-sm font-medium text-gray-900">
                        ${{$product->price}}
                    </p>
                </a>

                @empty

                @endforelse

            </div>
            <div class="mt-5">
                {!! $products->render() !!}
            </div>
        </div>
    </div>
</x-app-layout>
