<?php

namespace App\Http\Livewire;

use App\Models\Merchant;
use Livewire\Component;

class MerchantAdmin extends Component
{
    public function render()
    {
        return view('livewire.merchant-admin', ['merchants' => Merchant::latest()->paginate(10)]);
    }

    public function approve(Merchant $merchant)
    {
        if ($merchant->approved == 1) {
            $merchant->approved = 0;
            $merchant->save();
        } else {
            $merchant->approved = 1;
            $merchant->save();
        }
    }
}
