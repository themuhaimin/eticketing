<?php
namespace App\Transformers;

use App\Blog;
use League\Fractal\TransformerAbstract;
//use Auth;
class BlogTransformer extends TransformerAbstract
{
  protected $availableIncludes =[
    'blogs'
  ];
  function transform(Blog $blog)
  {
    return [
      'id'     => $blog->id,
      'judul' => $blog->judul,
      'content' => $blog->content,
      'label' => $blog->label,
      'gambar' => $blog->gambar,
    ];
  }
}
