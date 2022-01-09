<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MerchantPolicy
{
    use HandlesAuthorization;

    public function product_create(User $user)
    {
        if ($user->merchant) {
            return $user->merchant->approved == 1;
        }
    }
}
