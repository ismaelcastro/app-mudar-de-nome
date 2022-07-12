<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientsController extends Controller
{
    public function change_mail(Request $request)
    {
        $client = auth('client')->user();
        $data = $this->_validate_change_mail($request,$client->id);
        $client->fill($data);
        $client->save();
        return redirect()->back()->with('success','e-mail alterado!');
    }

    public function change_stagecall(Request $request)
    {
        if(isset($request->stage)){
            $stage = $request->stage;
            $client = auth('client')->user();
            $call = $client->call()->orderBy('calls.id','desc')->first();
            $call->stage_call = $stage;
            $call->save();
        }
        return redirect()->back();
    }

    protected function _validate_change_mail(Request $request, $id)
    {
        return $this->validate($request, [
            'email' => "required|string|email|max:191|unique:clients,email,{$id},id"
        ]);
    }
}
