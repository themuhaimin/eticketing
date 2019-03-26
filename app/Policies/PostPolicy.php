<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Post;
class PostPolicy
{
    use HandlesAuthorization;
    public function update(User $user,Post $post)
    {
      return $user->ownsPost($post);
    }
}
