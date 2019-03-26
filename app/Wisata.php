<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    //
    protected $fillable = [
        'nama', 'alamat', 'jam_buka','gambar'
    ];
    public function tickets()
    {
      return $this->hasMany(Ticket::class);
    }
}
