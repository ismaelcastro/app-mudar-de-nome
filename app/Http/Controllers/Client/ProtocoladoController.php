<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Help;

class ProtocoladoController extends Controller
{
    public function start()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id', 'desc')->first();
        $help_page = 'fase_final_elaboração';
        $helps = Help::where('pages', 'REGEXP', '[[:<:]]' . $help_page . '[[:>:]]')->orderBy('order', 'asc')->get();
        return view('client.pages.protocolado.start', compact('client', 'call', 'helps'));
    }

    public function andamento()
    {
        $help_page = 'fase_final_elaboração';
        $helps = Help::where('pages', 'REGEXP', '[[:<:]]' . $help_page . '[[:>:]]')->orderBy('order', 'asc')->get();
        return view('client.pages.protocolado.andamento', compact('helps'));
    }
}
