<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function admin(?User $user)
    {
        if(isset($user) && $user->isAdmin()){
            return Response::allow();
        }
        return Response::deny();
    }
}
