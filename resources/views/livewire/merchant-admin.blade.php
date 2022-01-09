<div>
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

        <h3 class="text-gray-700 text-2xl font-medium">Merchants</h3>
        <div class="grid gap-5 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 mt-6">
            @forelse ($merchants as $merchant)
            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                <h4 class="px-5 py-3 text-gray-700">{{$merchant->user->name}}</h4>

                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('
                    @if(isset($merchant->image['image']))
                        /storage/{{$merchant->image['image']}}
                    @else
                    /images/female-buyer-male-seller-store-260nw-1376189453.jpg
                    @endif
                    ')">
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{$merchant->description}}</h3>
                    <button
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                        wire:click="approve({{$merchant}})">
                        @if ($merchant->approved == 1)
                        Approved
                        @else
                        Pending
                        @endif
                    </button>
                    <h4 class="text-gray-700">{{$merchant->created_at->diffForHumans()}}</h4>
                </div>
                </a>
            </div>
            @empty

            @endforelse
        </div>
        <div class="flex justify-center">
            <div class="mt-5">
                {!! $merchants->links() !!}
            </div>
        </div>
    </div>
</div>
