<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Call;
use App\Models\CallRegister;
use App\Models\Client;

class HistoricController extends Controller
{
    public function index(Request $request, CallRegister $callRegister)
    {
        $dataForm = $request->except('_token');
        $call_title = '';
        $call_registers = $callRegister
        ->join('calls', 'call_registers.call_id', '=', 'calls.id')
        ->join('clients', 'calls.client_id', '=', 'clients.id')
        ->where(function ($query) use ($dataForm) {

            if(isset($dataForm['call_id']))
                $query->where('call_registers.call_id', $dataForm['call_id']);

            if(isset($dataForm['title']))
                $query->where('clients.name', 'like', '%'.$dataForm['title'].'%');

            if(isset($dataForm['who_create'])){
                if($dataForm['who_create'] == 'automatico'){
                    $query->whereNull('call_registers.client_id');
                    $query->whereNull('call_registers.user_id');
                }elseif($dataForm['who_create'] == 'usuario'){
                    $query->whereNull('call_registers.client_id');
                    $query->whereNotNull('call_registers.user_id');
                }elseif($dataForm['who_create'] == 'cliente'){
                    $query->whereNotNull('call_registers.client_id');
                    $query->whereNull('call_registers.user_id');
                }
            }

            if(isset($dataForm['date_start']) && isset($dataForm['date_finish']) ){
                $query->whereBetween('call_registers.created_at', [$dataForm['date_start'].' 00:00:00',$dataForm['date_finish'].' 23:59:59']);
            }
        })
        ->select('call_registers.*');

        $call_registers = $call_registers->paginate(15);

        if(isset($dataForm['call_id'])){
            $call_id = $dataForm['call_id'];
            $call = Call::find($call_id);
            $call_title = $call->title.' | '.$call->client->name;
        }

        return view('admin.pages.call_registers.index', 
            compact('call_registers', 'dataForm', 'call_title')
        );
    }
}
