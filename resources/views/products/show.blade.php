<x-app-layout>
    @can('merchant',$product)
    <div style="float: right">
        <a class="my-2 mx-1 pt-1 bg-indigo-600 border border-transparent rounded-md
        py-1 px-2 flex items-center justify-center text-base text-white
         hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{route('{product}.create',$product)}}">
            <p class="font-bold"> SKU <i class="fa fa-plus text-center"></i></p>
        </a>
        <div class="flex">
            <a class="mx-2 bg-indigo-600 border border-transparent rounded-md py-1 px-2 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{route('products.edit',$product)}}"><i class="fa fa-edit"></i>
            </a>
            <form method="POST" action="{{route('products.destroy',$product)}}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-indigo-600 border border-transparent rounded-md py-1 px-2 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>
    @endcan

    @livewire('purchase',['product'=>$product])

</x-app-layout>
