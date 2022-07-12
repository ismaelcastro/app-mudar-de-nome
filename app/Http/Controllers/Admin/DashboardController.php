<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Call;
use App\Models\CallRegister;
use App\Models\Client;
use App\Models\Changetype;
use App\Models\Reason;
use App\Models\CallHonorary;
use App\Models\CallExpense;
use App\Models\TaskList;
use App\Models\Task;
use App\Models\User;
use App\Models\Role;

class DashboardController extends Controller
{
    public function call(Changetype $changetype, Reason $reason, Call $call_model, Request $request)
    {
        $dataForm = $request->except('_token');
        $changes_type = $changetype->combo()->all();
        $reasons = $reason->combo()->all();
        $case_action = Call::CASE_ACTION;
        $source_list = Call::SOURCE;
        $status_list = Call::STATUS;
        $statuscolor_list = Call::STATUS_COLOR;
        $states = Client::STATES;
        $call_state = Call::CALL_STATE;
        $stage_call = Call::STAGE_CALL;

        if(isset($dataForm['status_call'])){
            $atual_status = $dataForm['status_call'];
        }else{
            $dataForm['status_call'] = ['novo'];
            $atual_status = ['novo'];
        }
                
        $calls = $call_model->where(function ($query) use ($dataForm) {
            $query->whereNull('stage_case');
            if(isset($dataForm['stars']))
                $query->whereIn('stars', $dataForm['stars']);
            if(isset($dataForm['position']))
                $query->whereIn('changetype_id', $dataForm['position']);
            if(isset($dataForm['reason']))
                $query->whereIn('reason_id', $dataForm['reason']);
            if(isset($dataForm['stage_call']))
                $query->where('stage_call', $dataForm['stage_call']);
            if(isset($dataForm['title']))
                $query->where('title', 'LIKE', '%'.$dataForm['title'].'%');
            if(isset($dataForm['status_call']))
                $query->whereIn('status', $dataForm['status_call']);
            if(isset($dataForm['date_start']) && isset($dataForm['date_finish']) )
                $query->whereBetween('created_at', [$dataForm['date_start'].' 00:00:00',$dataForm['date_finish'].' 23:59:59']);
        });

        if(!isset($dataForm['state']) ){
            $calls = $calls->paginate(15);
        }else{
            $calls = $calls->get();
        }

        if (isset($dataForm['states']))
            $calls = $calls->whereIn('uf', $dataForm['states'])->all();

        return view('admin.pages.dashboard.call', 
            compact(
                'calls', 
                'call_model', 
                'case_action', 
                'changes_type', 
                'reasons', 
                'source_list', 
                'dataForm', 
                'status_list', 
                'states', 
                'statuscolor_list', 
                'atual_status',
                'call_state',
                'stage_call'
            )
        );
    }
    public function processual(Request $request, Call $call_model, TaskList $task_list, Reason $reason)
    {
        $arrayVoid = ['' => 'Selecione'];
        $task_list = $arrayVoid+$task_list->combo()->all();
        $usersadm = User::get()->pluck('name', 'id')->all();
        $priority_list = $arrayVoid+Task::PRIORITY;
        $dataForm = $request->except('_token');
        $reasons = $reason->combo()->all();

        $stage_case_list = Call::STAGE_CASE;
        $procedural_step_list = Call::PROCEDURAL_STEP;

        $calls = $call_model
        ->join('clients', 'calls.client_id', '=', 'clients.id')
        ->join('reasons', 'reasons.id', '=', 'calls.reason_id')
        ->where(function ($query) use ($dataForm) {
            $query->whereNotNull('process');
            if(isset($dataForm['procedural_step'])){
                $query->whereIn('procedural_step', $dataForm['procedural_step']);
            }

            if(isset($dataForm['stage_case']))
                $query->whereIn('stage_case', $dataForm['stage_case']);

            if(isset($dataForm['paymentform']))
                $query->where('paymentform', $dataForm['paymentform']);

            if(isset($dataForm['title']))
                $query->where('clients.name', 'like', '%'.$dataForm['title'].'%');

            if(isset($dataForm['date_start']) && isset($dataForm['date_finish']) ){
                $field_date_search = $dataForm['field_date_search'];
                $query->whereBetween('calls.'.$field_date_search, [$dataForm['date_start'].' 00:00:00',$dataForm['date_finish'].' 23:59:59']);
            }
        })->select('calls.*');

        if(isset($dataForm['ord'])){            
            $ord = $dataForm['ord'];
            $ordArray = explode(';',$ord);
            $field = $ordArray[0];
            $direction = isset($ordArray[1]) && $ordArray[1] == 'desc' ? 'desc' : 'asc';
            $calls = $calls->orderBy($field,$direction);            
        } 
        $calls = $calls->paginate(20);
        return view('admin.pages.dashboard.processual', 
            compact('calls', 'dataForm', 'task_list', 'usersadm', 'priority_list', 'stage_case_list', 'procedural_step_list','reasons')
        );
    }
    public function triagem(Request $request, Call $call_model, TaskList $task_list, Reason $reason)
    {
        $arrayVoid = ['' => 'Selecione'];
        $task_list = $arrayVoid+$task_list->combo()->all();
        $usersadm = User::get()->pluck('name', 'id')->all();
        $priority_list = $arrayVoid+Task::PRIORITY;
        $dataForm = $request->except('_token');
        $reasons = $reason->combo()->all();

        $stage_case_list = Call::STAGE_CASE;

        $calls = $call_model
        ->join('clients', 'calls.client_id', '=', 'clients.id')
        ->join('reasons', 'reasons.id', '=', 'calls.reason_id')
        ->where(function ($query) use ($dataForm) {
            $query->whereNotNull('stage_case');
            $query->whereNull('process');
            if(isset($dataForm['stage_case']))
                $query->whereIn('stage_case', $dataForm['stage_case']);
            if(isset($dataForm['reason']))
                $query->whereIn('reason_id', $dataForm['reason']);
            if(isset($dataForm['paymentform']))
                $query->where('paymentform', $dataForm['paymentform']);

            if(isset($dataForm['title']))
                $query->where('clients.name', 'like', '%'.$dataForm['title'].'%');
            
            if(isset($dataForm['date_start']) && isset($dataForm['date_finish']) ){
                $field_date_search = $dataForm['field_date_search'];
                $query->whereBetween('calls.'.$field_date_search, [$dataForm['date_start'].' 00:00:00',$dataForm['date_finish'].' 23:59:59']);
            }
                
        })
        ->select('calls.*');

        if(isset($dataForm['ord'])){            
            $ord = $dataForm['ord'];
            $ordArray = explode(';',$ord);
            $field = $ordArray[0];
            $direction = isset($ordArray[1]) && $ordArray[1] == 'desc' ? 'desc' : 'asc';
            $calls = $calls->orderBy($field,$direction);            
        }
        
        $calls = $calls->paginate(15);
        return view('admin.pages.dashboard.triagem', 
            compact('calls', 'dataForm', 'task_list', 'usersadm', 'priority_list', 'stage_case_list', 'reasons')
        );
    }

    public function search_json(Request $request)
    {
        $search = $request->q ?? null;
        if(!is_null($search)){
            $contacts = Client::select('id','name')->where(function($q) use ($search){
                $name_searchArray = explode(' ',$search);
                foreach($name_searchArray as $name_search){
                    $q->where('name', 'like', '%'.$name_search.'%' );
                } 
            })->orderBy('name','asc')->get();
            return response()->json($contacts);
        }
        return response()->json(['id' => '','name' => 'Selecione']);
    }
}
