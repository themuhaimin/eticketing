<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Http\Requests;
use App\Transformers\BlogTransformer;

class BlogController extends Controller
{
    public function blog(Blog $blog){
        $blog=$blog->all();
        return fractal()
        ->collection($blog)
        ->transformWith(new BlogTransformer)
        ->toArray();
    }
    public function add(Request $request,Blog $blog)
    {
      $this->validate($request,[
        'content' =>'required|min:10',
      ]);
      $blog=$blog->create([
        'judul' => $request->judul,
        'content' => $request->content,
        'label' => $request->label,
        'gambar' => $request->gambar,
      ]);
      $respon= fractal()
              ->item($blog)
              ->transformWith(new BlogTransformer)
              ->toArray();
      return response()->json($respon,201);
    }
    public function blogDetails(Blog $blog,$id){
        $blog=$blog->find($id);
        return fractal()
        ->item($blog)
        ->transformWith(new BlogTransformer)
        ->includePosts()
        ->toArray();
      }
}
