<x-guest-layout>
    <main class="my-8">
        <div class="container mx-auto px-6">
            <h3 class="text-gray-700 text-2xl font-medium">Categories</h3>
            {{-- <span class="mt-3 text-sm text-gray-500">200+ Products</span> --}}
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                @forelse ($categories as $category)
                <a href="{{route('categories.show',$category)}}">
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url(
                            @if(isset($category->image['image']))
                            /storage/{{$category->image['image']}}
                            @else
                            /images/category.jpg
                            @endif
                            )">
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">{{$category->name}}</h3>
                            <h4 class="text-gray-700">{{$category->slug}}</h4>
                            <span class="text-gray-500 my-2" style="float: right">Products
                                :{{$category->products_count}}</span>
                        </div>
                    </div>
                </a>
                @empty

                @endforelse
            </div>
            <div class="flex justify-center">
                <div class="mt-5">
                    {!! $categories->render() !!}
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
