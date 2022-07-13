<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Functions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Call;
use App\Models\Client;

class AccessController extends Controller
{
    public function store(Call $call, Client $client)
    {
        $code = rand(10, 99) . $client->id . '_' . date('YmdHis');
        $finish = date('Y-m-d H:i:s', strtotime("+1 day"));

        Access::where('client_id', $client->id)->where('call_id', $call->id)->delete();

        $link = route('client.login.access', ['code' => $code]);
        $function = new Functions;
        $url = $function->encurta_url($link);

        Access::create([
            'client_id' => $client->id,
            'call_id' => $call->id,
            'code' => $code,
            'finish' => $finish,
            'url' => $url
        ]);


        return redirect()->back();
    }
}
