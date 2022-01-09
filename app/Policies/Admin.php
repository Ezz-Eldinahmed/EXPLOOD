<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Admin
{
    use HandlesAuthorization;

    public function dashboard(User $user)
    {
        if ($user->admin)
            return ($user->admin->role === 1);
    }
}
