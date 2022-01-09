<div wire:poll>
    @forelse ($orders as $order)
    <tr>
        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
            Payment from <span class="font-semibold">{{$order->user->name}}</span>
        </td>
        <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
            {{$order->created_at->diffForHumans()}}
        </td>
        <td class="p-4 whitespace-nowrap text-sm font-semibold text-gray-900">
            ${{$order->total}}
        </td>
    </tr>
    @empty

    @endforelse
</div>
