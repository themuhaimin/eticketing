<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        '',
    ];
    public function wisata()
    {
      return $this->belongsTo('App\Wisata');
    }
}
