<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;
use App\Http\Requests;
use App\Transformers\TicketTransformer;


class TicketController extends Controller
{
    public function ticket(Ticket $ticket,$id){
        $ticket=$ticket::where('wisata_id',$id)->get();
        return fractal()
        ->collection($ticket)
        ->transformWith(new TicketTransformer)
        ->toArray();
    }
}
