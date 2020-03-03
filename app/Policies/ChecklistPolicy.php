<?php

namespace App\Policies;

use App\Checklist;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChecklistPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user, Checklist $checklist)
    {
        return $user->id === $checklist->user->id;
    }
}
