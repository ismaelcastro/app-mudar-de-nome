<?php

namespace App\Http\Controllers\Client;

use App\Models\Changetype;
use App\Http\Controllers\Controller;

class PedidoController extends Controller
{
    public function detalhes()
    {
        $changeTypes = Changetype::all();

        return view('client.pages.pedido.detalhe', compact('changeTypes'));
    }
}
