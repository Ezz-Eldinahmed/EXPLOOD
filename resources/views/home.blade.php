<x-guest-layout>
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-16 lg:max-w-none">

                <h2 class="text-2xl font-extrabold text-gray-900">Shop By Category</h2>
                <div class="my-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">

                    @foreach ($categories as $category)
                    <div class="group relative mx-3">
                        <div
                            class="relative w-full mt-3 h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                            <img @if (isset($category->image['image'])) src="/storage/{{$category->image['image']}}"
                            @else src="/images/category.jpg" @endif
                            class="w-full h-full object-center object-cover">
                        </div>
                        <h3 class="mt-6 text-md text-gray-500">
                            <a href="{{route('categories.show',$category)}}">
                                <span class="absolute inset-0"></span>
                                {{$category->name}}
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">{{$category->slug}}</p>
                    </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    {!! $categories->render() !!}
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
