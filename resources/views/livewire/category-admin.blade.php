<div>
    @if (session()->has('success'))
    <div class="p-2">
        <div class="inline-flex items-center bg-white leading-none text-green-600 rounded-full p-2 shadow text-sm">
            <span
                class="inline-flex bg-green-600 text-white rounded-full h-6 px-3 justify-center items-center text-">SUCCESS</span>
            <span class="inline-flex px-2">{{ session()->get('success') }}</span>
        </div>
    </div>
    @endif

    <h3 class="text-gray-700 text-2xl font-medium">Categories</h3>
    <div class="grid gap-5 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 mt-6">
        <a class="my-2 mx-1 bg-indigo-500 border border-transparent rounded-md py-1 px-2 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        href="{{route('categories.create')}}">ADD Category</a>

        @forelse ($categories as $category)
        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
            <a href="{{route('categories.show',$category)}}">
                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url(
                    @if(isset($category->image['image']))
                    /storage/{{$category->image['image']}}
                    @else
                    /images/example_20190110_8.jpg
                    @endif
                    )">
                </div>
                <div class="flex my-2">
                    <a class="mx-2 bg-indigo-600 border border-transparent rounded-md py-1 px-2 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{route('categories.edit',$category)}}"><i class="fa fa-edit"></i>
                    </a>
                    <form method="POST" action="{{route('categories.destroy',$category)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-indigo-600 border border-transparent rounded-md py-1 px-2 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{$category->name}}</h3>
                    <h4 class="text-gray-700">{{$category->slug}}</h4>
                    <span class="text-gray-500 my-2" style="float: right">Products
                        :{{$category->products_count}}</span>
                </div>
            </a>
        </div>
        @empty

        @endforelse
    </div>
    <div class="flex justify-center">
        <div class="mt-5">
            {!! $categories->links() !!}
        </div>
    </div>
</div>
