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
                <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Product</h3>
                <form method="POST" enctype="multipart/form-data" class="shadow sm:rounded-md sm:overflow-hidden"
                    action="{{route('products.update',$product)}}">
                    @csrf
                    @method('PUT')

                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-2 sm:col-span-2">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                        Name
                                    </label>
                                    <div class="my-2 flex rounded-md shadow-sm">
                                        <input value="{{old('name',$product->name)}}" type="text" name="name"
                                            placeholder="Name"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                    </div>
                                    @error('name')
                                    <span class="text-md font-bold text-red-500 text-sm">{{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="slug" class="block text-sm font-medium text-gray-700">
                                        Slug
                                    </label>
                                    <div class="my-2 flex rounded-md shadow-sm">
                                        <input value="{{old('slug',$product->slug)}}" type="text" name="slug"
                                            placeholder="Slug"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                    </div>
                                    @error('slug')<span
                                        class="text-md font-bold text-red-500 text-sm">{{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="slug" class="block text-sm font-medium text-gray-700">
                                        Price
                                    </label>
                                    <div class="my-2 flex rounded-md shadow-sm">
                                        <input value="{{old('price',$product->price)}}" type="number" name="price"
                                            placeholder="price"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">

                                    </div>
                                    @error('price')<span
                                        class="text-md font-bold text-red-500 text-sm">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Description
                            </label>
                            <div class="mt-1">
                                <textarea id="description"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                    type="text" name="description" rows="4"
                                    placeholder="Description">{{old('description',$product->description)}}</textarea>
                            </div>

                            @error('description')<span
                                class="text-md font-bold text-red-500 text-sm">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="category_id" name="category_id" autocomplete="category_id"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($categories as $category)
                                <option value="{{($category->id)}}">{{($category->name)}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <label class="mx-5 block text-sm font-medium text-gray-700">
                            Cover photo
                        </label>
                        <div
                            class="mt-1 mx-5 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span class="mx-2">Upload a file</span>
                                        <input id="file-upload" name="image" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, GIF up to 10MB
                                </p>

                                @error('image')<span class="text-md font-bold text-red-500 text-sm">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="px-4 pb-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div>
                <img @if(isset($product->image)) src="/storage/app/{{$product->image['image']}}" @else
                src="../../../images/promotional-tshirts-500x500.jpg" @endif class="mt-6">
            </div>
        </div>

        <h3 class="text-lg my-3 font-medium leading-6 text-gray-900">Edit Product Sku</h3>
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-3 gap-5 mb-2">
                @foreach ($product->productSkus as $productSku)
                @livewire('product-skus',['productSku'=>$productSku],key($productSku->id))
                @endforeach
            </div>
        </div>
    </div>
</x-guest-layout>
