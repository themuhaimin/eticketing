<?php
namespace App\Transformers;

use App\Ticket;
use League\Fractal\TransformerAbstract;
//use Auth;
class TicketTransformer extends TransformerAbstract
{
  protected $availableIncludes =[
    'tickets'
  ];
  function transform(Ticket $ticket)
  {
    return [
      'id'     => $ticket->id_ticket,
      'nama' => $ticket->jenis_ticket,
      'alamat' => $ticket->harga,
      'wisata' => $ticket->wisata->nama,
    ];
  }
}
