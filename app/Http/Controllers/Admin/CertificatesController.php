<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Functions;
use App\Models\Call;
use App\Models\Changetype;
use App\Models\Client;
use App\Models\Reason;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificatesController extends Controller
{
    public function index()
    {
        $dataForm = [];
        $clients = Client::query()->orderBy('name', 'asc')->paginate(15);
        $profile_color = Client::PROFILE_COLOR;
        $states = Client::STATES_PHONE;

        return view("admin.pages.certificates.index",
            compact("clients", "dataForm", "profile_color", "states")
        );
    }

    public function show(Client $client, Call $call_model, Changetype $changetype, Reason $reason)
    {
        $function = new Functions;
        $changes_type = $changetype->combo()->all();
        $reasons = $reason->combo()->all();
        $case_action = Call::CASE_ACTION;
        $procedural_step_list = Call::PROCEDURAL_STEP;

        if (!is_null($client->phone) && strlen($client->phone) == 11) {
            $phone = $function->mask($client->phone, '(##)# ####-####');
            $client->phone = $phone;
        }

        return view('admin.pages.certificates.show', compact(
                'client', 'case_action', 'changes_type', 'reasons', 'call_model', 'procedural_step_list'
            )
        );
    }

    public function search(Request $request, Client $client)
    {
        $dataForm = $request->except('_token');
        $profile_color = Client::PROFILE_COLOR;
        $states = Client::STATES_PHONE;

        if (isset($dataForm['searh-interno']) && isset($dataForm['char'])) {
            unset($dataForm['char']);
            $request->request->remove('char');
        }

        $collection = $client->where(function ($query) use ($dataForm) {
            if (isset($dataForm['searh-interno'])) {
                $query->where('name', 'LIKE', '%' . $dataForm['searh-interno'] . '%')
                    ->orWhere('email', 'LIKE', '%' . $dataForm['searh-interno'] . '%')
                    ->orWhere(function ($q) use ($dataForm) {
                        $searh_interno = $dataForm['searh-interno'];
                        $searh_interno = preg_replace('/[^0-9]/', '', $searh_interno);
                        if (!empty($searh_interno) && is_numeric($searh_interno)) {
                            $q->where('cpf', $searh_interno);
                        }
                    });
            }
            if (isset($dataForm['char'])) {
                $char = trim($dataForm['char']);
                $query->where('name', 'LIKE', $char . '%');
            }

        });

        if (isset($dataForm['ord'])) {
            $ord = $dataForm['ord'];
            $ordArray = explode(';', $ord);
            $field = $ordArray[0];
            $direction = isset($ordArray[1]) && $ordArray[1] == 'desc' ? 'desc' : 'asc';
            $collection = $collection->orderBy($field, $direction);
        }
        if (!isset($dataForm['profile']) && !isset($dataForm['state'])) {
            $clients = $collection->paginate(15);
        } else {
            $clients = $collection->get();
        }
        if (isset($dataForm['profile']))
            $clients = $clients->where('profile', $dataForm['profile']);

        if (isset($dataForm['state']))
            $clients = $clients->whereIn('ddd', explode(',', $dataForm['state']));

        if (isset($dataForm['profile']) || isset($dataForm['state'])) {
            $clients = $clients->all();
        }

        return view(
            'admin.pages.certificates.index',
            compact(
                'clients',
                'dataForm',
                'profile_color',
                'states'
            )
        );
    }
}
