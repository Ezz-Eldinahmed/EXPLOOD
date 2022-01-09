<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductEdit
{
    use HandlesAuthorization;

    public function merchant(User $user, Product $product)
    {
        if (Auth::check()) {
            return $user->id == $product->user->id;
        }
    }
}
