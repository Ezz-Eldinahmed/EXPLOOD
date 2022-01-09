<x-guest-layout>
    <div class="container mx-auto px-6">
        @if (session()->has('success'))
        <div class="p-2">
            <div class="inline-flex items-center bg-white leading-none text-green-600 rounded-full p-2 shadow text-sm">
                <span
                    class="inline-flex bg-green-600 text-white rounded-full h-6 px-3 justify-center items-center text-">SUCCESS</span>
                <span class="inline-flex px-2">{{ session()->get('success') }}</span>
            </div>
        </div>
        @endif

        <div class="grid grid-cols-2 gap-5">
            <div class="mb-5">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Add Product Sku</h3>
                <form method="POST" class="shadow sm:rounded-md sm:overflow-hidden"
                    action="{{route('{product}.store',$product)}}">
                    @csrf
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-2 sm:col-span-2">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                        Name
                                    </label>
                                    <div class="my-2 flex rounded-md shadow-sm">
                                        <input value="{{old('name')}}" type="text" name="name" placeholder="Name"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                    </div>
                                    @error('name')
                                    <span class="text-md font-bold text-red-500 text-sm">{{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="slug" class="block text-sm font-medium text-gray-700">
                                        Stock
                                    </label>
                                    <div class="my-2 flex rounded-md shadow-sm">
                                        <input value="{{old('stock')}}" type="number" name="stock" placeholder="Stock"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">

                                    </div>
                                    @error('stock')<span
                                        class="text-md font-bold text-red-500 text-sm">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="colour_id" class="block text-sm font-medium text-gray-700">Colour</label>
                            <select id="colour_id" name="colour_id" autocomplete="colour_id"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($colours as $colour)
                                <option value="{{($colour->id)}}">{{($colour->name)}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="size_id" class="block text-sm font-medium text-gray-700">Size</label>
                            <select id="size_id" name="size_id" autocomplete="size_id"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($sizes as $size)
                                <option value="{{($size->id)}}">{{($size->name)}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="px-4 pb-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </form>
            </div>
            <div>
                <img src="../../../images/Assorted_Bright_T_Shirts_large.jpg" class="mt-6">
            </div>
        </div>
</x-guest-layout>
