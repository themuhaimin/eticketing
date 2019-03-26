<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Wisata;
use App\Http\Requests;
use App\Transformers\WisataTransformer;

class WisataController extends Controller
{
    public function wisata(Wisata $wisata){
        $wisata=$wisata->all();
        return fractal()
        ->collection($wisata)
        ->transformWith(new WisataTransformer)
        ->toArray();
    }
    public function add(Request $request,Wisata $wisata)
    {
      $this->validate($request,[
        'nama' =>'required|min:10',
      ]);
      $wisata=$wisata->create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'jam_buka' => $request->jam_buka,
        'gambar' => $request->gambar,
      ]);
      $respon= fractal()
              ->item($wisata)
              ->transformWith(new WisataTransformer)
              ->toArray();
      return response()->json($respon,201);
    }
}
