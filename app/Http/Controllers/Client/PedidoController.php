<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PedidoController extends Controller
{
    public function detalhes()
    {
        return view("client.pages.pedido.detalhe");
    }
}
