<?php

namespace App\Policies;

use App\Attachment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttachmentPolicy
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

    public function edit(User $user, Attachment $attachment)
    {
        return $user->id === $attachment->user->id;
    }
}
