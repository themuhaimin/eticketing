<?php
namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;
use Auth;
class UserTransformer extends TransformerAbstract
{
  protected $availableIncludes =[
    'posts'
  ];
  function transform(User $user)
  {
    return [
      'id'     => $user->id,
      'name' => $user->name,
      'email' => $user->email,
      'registered' => $user->created_at->diffForHumans(),
    ];
  }
  public function includePosts(User $user)
  {
    $post = $user->posts;
    return $this->collection($post, new PostTransformer);
  }
}
