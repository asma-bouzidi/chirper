<?php

namespace App\Policies;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ChirpPolicy
{
    public function update(User $user, Chirp $chirp)
{
    return $user->id === $chirp->user_id;
}

public function delete(User $user, Chirp $chirp)
{
    return $user->id === $chirp->user_id;
}

}
