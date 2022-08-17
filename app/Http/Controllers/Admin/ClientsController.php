<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Functions;
use App\Helpers\MauticHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Call;
use App\Models\Changetype;
use App\Models\Reason;
use App\Mail\SendMailCreatePassword;
use App\Http\Requests\ClientRequest;
use App\Models\Affiliation;

class ClientsController extends Controller
{

    public function index()
    {
        $dataForm = [];
        $clients = Client::orderBy('name', 'asc')->paginate(15);
        $profile_color = Client::PROFILE_COLOR;
        $states = Client::STATES_PHONE;

        return view("admin.pages.clients.index",
            compact("clients", "dataForm", "profile_color", "states")
        );
    }

    public function create()
    {
        $voidOption = ['' => 'Selecione'];
        $type_enum = $voidOption + Client::TYPE_ENUM;
        $type_email = $voidOption + Client::TYPE_EMAIL;
        $type_address = $voidOption + Client::ADDRESS_TYPE;
        $marital_status = $voidOption + Client::MARITAL_STATUS;
        $treatment = $voidOption + Client::TREATMENT;

        return view('admin.pages.clients.create',
            compact('type_enum', 'type_email', 'type_address', 'marital_status', 'treatment')
        );
    }

    public function store(ClientRequest $request, Client $client): \Illuminate\Http\RedirectResponse
    {
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 10);
        $data = $request->only(array_keys($request->rules()));
        $data['password'] = Hash::make($password);
        $client = Client::create($data);
        if ($request->has('send_mail')) {
            $to = $client->email;
            $data2 = [
                'name' => $client->first_name,
                'email' => $client->email,
                'password' => $password
            ];
            Mail::to($to)->send(new SendMailCreatePassword($data2));
        }
        session(['lastClient' => $client->id]);

        return redirect()->route('admin.clients.index')->with('success', 'Adicionado com sucesso!');
    }

    public function show(Client $client, Call $call_model, Changetype $changetype, Reason $reason)
    {
        // template metronic: account/overview.html
        $function = new Functions;
        $changes_type = $changetype->combo()->all();
        $reasons = $reason->combo()->all();
        $case_action = Call::CASE_ACTION;
        $procedural_step_list = Call::PROCEDURAL_STEP;

        $clientId = $client->id;
        // $calls = $call_model->where(function ($query) use ($clientId) {
        //     $query->whereNull('stage_case')
        //         ->where(function ($q) use ($clientId) {
        //             $affiliation_array = Affiliation::where('client_id', $clientId)->get()->pluck('call_id')->all();
        //             if (count($affiliation_array) > 0) {
        //                 $q->where('client_id', $clientId)->orWhereIn('id', $affiliation_array);
        //             } else {
        //                 $q->where('client_id', $clientId);
        //             }
        //         });
        // })->get();

        // $cases = $call_model->where(function ($query) use ($clientId) {
        //     $query->whereNotNull('stage_call')
        //         ->whereNotNull('stage_case')
        //         ->whereNull('process')
        //         ->where(function ($q) use ($clientId) {
        //             $affiliation_array = Affiliation::where('client_id', $clientId)->get()->pluck('call_id')->all();
        //             if (count($affiliation_array) > 0) {
        //                 $q->where('client_id', $clientId)->orWhereIn('id', $affiliation_array);
        //             } else {
        //                 $q->where('client_id', $clientId);
        //             }
        //         });
        // })->get();

        // $process = $call_model->where(function ($query) use ($clientId) {
        //     $query->whereNotNull('process')
        //         ->where(function ($q) use ($clientId) {
        //             $affiliation_array = Affiliation::where('client_id', $clientId)->get()->pluck('call_id')->all();
        //             if (count($affiliation_array) > 0) {
        //                 $q->where('client_id', $clientId)->orWhereIn('id', $affiliation_array);
        //             } else {
        //                 $q->where('client_id', $clientId);
        //             }
        //         });
        // })->get();

        if (!is_null($client->phone) && strlen($client->phone) == 11) {
            $phone = $function->mask($client->phone, '(##)# ####-####');
            $client->phone = $phone;
        }


        return view(
            'admin.pages.clients.show',
            compact(
                'client',
                //'calls',
                //'cases',
                //'process',
                'case_action',
                'changes_type',
                'reasons',
                'call_model',
                'procedural_step_list'
            )
        );
    }

    public function edit(Client $client)
    {
        // template metronic - dist/account/settings.html
        $voidOption = ['' => 'Selecione'];
        $type_enum = $voidOption + Client::TYPE_ENUM;
        $type_email = $voidOption + Client::TYPE_EMAIL;
        $type_address = $voidOption + Client::ADDRESS_TYPE;
        $marital_status = $voidOption + Client::MARITAL_STATUS;
        $treatment = $voidOption + Client::TREATMENT;

        return view(
            'admin.pages.clients.edit',
            compact(
                'client',
                'type_enum',
                'type_email',
                'type_address',
                'marital_status',
                'treatment'
            )
        );
    }

    public function update(ClientRequest $request, Client $client)
    {
        $data = $request->only(array_keys($request->rules()));
        $client->fill($data);
        $responseClient = $client->save();
        if (isset($request->page_return)) {
            if ($request->page_return == 'case_breve_relato') {
                return redirect()->to(url()->previous() . '#info-documentos_top')->with(['success' => 'Atualizado com sucesso!', 'openModal' => 'breverelatoModal', 'step_number' => '0']);
            }
        }
        return redirect()->route('admin.clients.index')->with('success', 'Atualizado com sucesso');
    }

    public function box(Client $clients)
    {
        $option_void = ['' => 'Selecione'];
        $client_list = $option_void + $clients->combo()->all();
        return view('admin.pages.clients.box', compact('client_list'));
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Excluído com sucesso');
    }

    public function update_image(Request $request, Client $client)
    {
        $client->image = $request->image;
        $client->save();
    }

    public function remove_picture(Client $client)
    {
        $client->image = null;
        $client->save();
        return redirect()->back()->with('success', 'Imagem removida!');
    }

    public function sinc_mautic()
    {
        $clients = Client::whereNull('mautic_id')->get();
        echo '<table border="1" width="100%">';
        echo '<tr>';
        echo '  <th>Cliente</th>';
        echo '  <th>Retorno</th>';
        echo '</tr>';
        foreach ($clients as $client) {
            echo '<tr>';
            echo '  <td>';
            echo $client->id . ' | ' . $client->name;
            echo '  </td>';
            echo '  <td>';
            try {
                $mautic = new MauticHelper;
                $mautic_id = $mautic->add_contact($client);
                if (!is_null($mautic_id) && is_numeric($mautic_id)) {
                    $client->mautic_id = $mautic_id;
                    $client->save();
                    echo $mautic_id;
                } else {
                    if (isset($mautic_id[0]['message']))
                        var_dump($mautic_id[0]['message']);
                    else
                        var_dump($mautic_id);
                }
            } catch (\Exception $e) {
                var_dump($e);
            }

            echo '  </td>';
            echo '</tr>';
        }
        echo '</table>';
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
            /*
            if(isset($dataForm['state'])){
                $query->whereIn('SUBSTR(addressstate,0,2)', explode(',',$dataForm['state']) );
            }
            */
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
            'admin.pages.clients.index',
            compact(
                'clients',
                'dataForm',
                'profile_color',
                'states'
            )
        );
    }

}
