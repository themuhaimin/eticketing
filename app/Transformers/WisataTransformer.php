<?php
namespace App\Transformers;

use App\Wisata;
use League\Fractal\TransformerAbstract;
//use Auth;
class WisataTransformer extends TransformerAbstract
{
  protected $availableIncludes =[
    'wisatas'
  ];
  function transform(Wisata $wisata)
  {
    return [
      'id'     => $wisata->id,
      'nama' => $wisata->nama,
      'alamat' => $wisata->alamat,
      'jam_buka' => $wisata->jam_buka,
      'gambar' => $wisata->gambar,
    ];
  }
}
