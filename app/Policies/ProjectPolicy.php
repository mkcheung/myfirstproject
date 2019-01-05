<?php

namespace App\Policies;

use App\User;
use App\Policy;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the policy.
     *
     * @param  \App\User  $user
     * @param  \App\Policy  $policy
     * @return mixed
     */
    public function update(User $user, Policy $policy)
    {
        return $policy->owner_id = $user_id;
    }

}
