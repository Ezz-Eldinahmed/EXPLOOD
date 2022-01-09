<x-guest-layout>
    <div class="grid grid-cols-3 gap-5 mx-5">
        <div class="mb-5 col-span-2">
            <table class="min-w-full mt-5 mb-5 divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-3 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                            Order Details
                        </th>
                        <th scope="col"
                            class="px-3 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th scope="col"
                            class="px-3 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                            Quantity
                        </th>
                        <th scope="col"
                            class="px-3 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-3 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                            Total Cost
                        </th>

                        <th scope="col" class="relative px-6 py-3">
                            Shipping Cost
                            {{-- <span class="sr-only"></span> --}}
                        </th>
                        <th scope="col"
                            class="px-3 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                            Orderd At
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($orders as $order)
                    <tr>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="text-sm font-medium text-gray-900">
                                    @foreach ($order->orderItems as $orderItem)
                                    <h4>
                                        Name {{$orderItem->productSku->product->name}}
                                    </h4>
                                    <h5>
                                        Price {{$orderItem->price}}
                                    </h5>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$order->id}}</div>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            {{$order->quantity}}
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{$order->status}}
                            </span>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap  text-center text-sm text-gray-500">
                            {{$order->total}}
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                            {{$order->shipping_cost}}
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                            {{$order->created_at->diffForHumans()}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                -
                            </div>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">-</div>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                            -
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                -
                            </span>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap  text-center text-sm text-gray-500">
                            -
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap text-center text-sm font-medium">
                            -
                        </td>
                    </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

        <div>
            <img src="../../../images/Assorted_Bright_T_Shirts_large.jpg" class="mt-6">
        </div>
    </div>

</x-guest-layout>
