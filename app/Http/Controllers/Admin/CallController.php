<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

use App\Http\Requests\CallRequest;
use App\Models\Access;
use App\Models\Call;
use App\Models\CallRegister;
use App\Models\Client;
use App\Models\Changetype;
use App\Models\Reason;
use App\Models\CallHonorary;
use App\Models\CallExpense;
use App\Models\Goal;
use App\Models\ProposalField;
use App\Models\TaskList;
use App\Models\Task;
use App\Models\User;
use App\Models\Role;
use App\Models\Tag;
use Illuminate\Support\Carbon;

class CallController extends Controller
{

    public function change_status(Request $request, Call $call)
    {
        if (isset($request->status)) {
            $call->status = $request->status;
            $call->save();
        }
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }

    public function index(Changetype $changetype, Reason $reason, Call $call_model, Request $request)
    {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);

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



        $areas_all = Call::OCCUPATION_AREA;
        $user_occupation_area = auth()->user()->occupation_area;

        $areas_list = $areas_all;
        if (!is_null($user_occupation_area)) {
            $areas_list = [$user_occupation_area => $areas_all[$user_occupation_area]];
        }
        $year = date('Y');
        $month = date('m');
        $day = date('d');
        $total_honorary = 0;


        $qtd_calls_month = Call::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)
            ->select('id')->count();

        $calls_signed = Call::whereNotNull('signed')->whereIn('stage_call', ['dados', 'assinado'])
            ->whereYear('signed', '=', $year)->whereMonth('signed', '=', $month)->orderBy('signed', 'asc')
            ->get();

        $calls_signed_day = Call::whereNotNull('signed')->whereIn('stage_call', ['dados', 'assinado'])
            ->whereYear('signed', '=', $year)->whereMonth('signed', '=', $month)->whereDay('signed', '=', $day)->orderBy('signed', 'asc')
            ->get();

        $calls_signed_week = Call::whereNotNull('signed')->whereIn('stage_call', ['dados', 'assinado'])
            ->whereBetween('signed', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            //->whereYear('signed', '=', $year)->whereMonth('signed', '=', $month)->whereDay('signed', '=', $day)
            ->orderBy('signed', 'asc')
            ->get();

        if (count($calls_signed) > 0) {
            $calls_signed_ids = $calls_signed->pluck('id')->all();
            $total_honorary = CallHonorary::whereIn('call_id', $calls_signed_ids)->sum('amount');
        }
        $current_goal = Goal::where('goal', '>', $total_honorary)->orderBy('goal', 'asc')->first();
        $next_goal = Goal::where('goal', '>', $current_goal->goal)->orderBy('goal', 'asc')->first();
        $current_percent = $total_honorary / ($current_goal->goal / 100);
        $current_percent = round($current_percent);
        $remaining_goal = $current_goal->goal - $total_honorary;
        if ($qtd_calls_month > 0) {
            $qtd_conversion = count($calls_signed) / ($qtd_calls_month / 100);
            $qtd_conversion = round($qtd_conversion);
        } else {
            $qtd_conversion = 0;
        }

        if (isset($dataForm['status_call'])) {
            $atual_status = $dataForm['status_call'];
        } else {
            //$dataForm['status_call'] = ['novo'];
            //$atual_status = ['novo'];
        }


        //dd($dataForm)
        $calls = $call_model->where(function ($query) use ($dataForm) {
            $query->whereNull('stage_case');
            if (isset($dataForm['occupation_area']))
                $query->where('occupation_area', $dataForm['occupation_area']);
            if (isset($dataForm['stars']))
                $query->whereIn('stars', $dataForm['stars']);
            if (isset($dataForm['position']))
                $query->whereIn('changetype_id', $dataForm['position']);
            if (isset($dataForm['reason']))
                $query->whereIn('reason_id', $dataForm['reason']);
            if (isset($dataForm['stage_call']))
                $query->where('stage_call', $dataForm['stage_call']);
            if (isset($dataForm['title'])) {
                $var_title = $dataForm['title'];
                $query->where(function ($q) use ($var_title) {
                    $q->whereHas('client', function ($q) use ($var_title) {
                        $q->where('name', 'LIKE', '%' . $var_title . '%')
                            ->orWhere('email', 'LIKE', '%' . $var_title . '%')
                            ->orWhere(function ($q) use ($var_title) {
                                $searh_interno = $var_title;
                                $searh_interno = preg_replace('/[^0-9]/', '', $searh_interno);
                                if (!empty($searh_interno) && is_numeric($searh_interno)) {
                                    $q->where('cpf', $searh_interno);
                                }
                            });
                    })->orWhere('title', 'LIKE', '%' . $var_title . '%');
                });
            }

            if (isset($dataForm['status_call']) && count($dataForm['status_call']) > 0)
                $query->whereIn('status', $dataForm['status_call']);
            if (isset($dataForm['date_start']) && !is_null($dataForm['date_start']) && isset($dataForm['date_finish']) &&  !is_null($dataForm['date_finish']))
                $query->whereBetween('created_at', [$dataForm['date_start'] . ' 00:00:00', $dataForm['date_finish'] . ' 23:59:59']);
            if (isset($dataForm['call_state'])) {
                foreach ($dataForm['call_state'] as $key => $value) {
                    if ($value == "novos") {
                        $query->whereIn('status', ['novo']);
                    } elseif ($value == "em_andamento") {
                        $query->orWhereIn('status', ['tentativa', 'sem_contato', 'pendente', 'atrasado']);
                    } elseif ($value == "fechados") {
                        $query->orWhereIn('status', ['finalizado', 'baixo_interesse', 'custo_alto', 'prazo_estimado', 'concorrente', 'futuramente', 'curiosidade', 'encerrado', 'assinado']);
                    }
                }
            }
        });



        if (!isset($dataForm['state'])) {
            $calls = $calls->orderBy('id', 'desc')->paginate(15);
        } else {
            $calls = $calls->orderBy('id', 'desc')->get();
        }

        if (isset($dataForm['states']))
            $calls = $calls->whereIn('uf', $dataForm['states'])->all();

        $qtd_calls_new = Call::where('status', 'novo')->count();
        $qtd_calls_attempt = Call::where('status', 'tentativa')->count();

        return view(
            'admin.pages.calls.index',
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
                'stage_call',
                'qtd_calls_new',
                'qtd_calls_attempt',
                'current_goal',
                'current_percent',
                'remaining_goal',
                'next_goal',
                'total_honorary',
                'calls_signed',
                'calls_signed_day',
                'calls_signed_week',
                'qtd_conversion',
                'areas_list'
            )
        );
    }

    public function create(Client $clients, Changetype $changetype, Reason $reason)
    {
        $option_void = ['' => 'Selecione'];
        $client_list = $option_void + $clients->combo()->all();
        $changes_type = $option_void + $changetype->combo()->all();
        $reasons = $option_void + $reason->combo()->all();
        $case_action = $option_void + Call::CASE_ACTION;
        $source_list = $option_void + Call::SOURCE;
        $area_list = $option_void + Call::OCCUPATION_AREA;

        $type_enum = $option_void + Client::TYPE_ENUM;
        $type_email = $option_void + Client::TYPE_EMAIL;

        return view(
            'admin.pages.calls.create',
            compact(
                'client_list',
                'case_action',
                'changes_type',
                'reasons',
                'source_list',
                'type_enum',
                'type_email',
                'area_list'
            )
        );
    }

    public function store(CallRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $client = Client::find($request->client_id);

        DB::beginTransaction();

        if ($request->occupation_area == 'retificacao') {
            if (empty($request->title)) {
                $changetype = Changetype::find($request->changetype_id);
                $data['title'] = ucwords($request->caseaction) . ' ' . ucwords($changetype->name);
            }
        } elseif ($request->occupation_area == 'divorcio') {
            $data['title'] = 'Divórcio ' . $client->name;
        }

        $call = Call::create($data);
        $dataRegister =
            [
                'client_id' => $client->id,
                'call_id' => $call->id,
                'description' => $request->description,
                'type' => 'normal'
            ];
        $call_register = CallRegister::create($dataRegister);

        if ($call && $call_register) {
            DB::commit();
            return redirect()->route('admin.calls.index')->with('success', 'Atendimento Adicionado com sucesso!');
        } else {
            DB::rollback();
            return redirect()->route('admin.calls.index')->with('error', 'Não foi possível salvar o atendimento!');
        }
    }

    public function change_stage_case(Request $request, Call $call)
    {
        $data = $this->validate($request, [
            'stage_case' => "required"
        ]);
        $call->fill($data);
        $call->save();
        return redirect()->back()->with('success', 'Atualizado com sucesso');
    }

    public function change_stage_call(Request $request, Call $call)
    {
        $data = $this->validate($request, [
            'stage_call' => "required|in:dados,emissao,assinatura,assinado,cancelado"
        ]);
        $call->fill($data);
        $call->save();

        if (is_null($call->stage_call) || $call->stage_call == 'dados') {
            $call->status = 'em_andamento';
            $call->last_proposal = date('Y-m-d H:i:s');
            $call->save();
        }

        return redirect()->back()->with('success', 'Atualizado com sucesso');
    }

    public function show(Call $call, Changetype $changetype, Reason $reason, TaskList $task_list)
    {
        $call_model = new Call;
        $arrayVoid = ['' => 'Selecione'];
        $changes_type = $changetype->combo()->all();
        $reasons = $reason->combo()->all();
        $case_action = Call::CASE_ACTION;
        $source_list = Call::SOURCE;
        $court_costs = Call::COURT_COSTS;
        $feedback_list = Call::FEEDBACK;
        $priority_list = $arrayVoid + Task::PRIORITY;
        $case_feedback = Call::FEEDBACK;
        $tag_list = Tag::TAG_LIST;
        $relationship_list = Call::RELATIONSHIP_CLAIMANT;

        $court_costs = $arrayVoid + $court_costs;
        $payment_form = $arrayVoid + Call::PAYMENTFORM;

        $task_list = $arrayVoid + $task_list->combo()->all();

        $sum_honrary = $call->call_honorary()->sum('amount');
        $sum_expense = $call->call_expense()->sum('amount');

        $honraries = $call->call_honorary()->get();
        $expenses = $call->call_expense()->get();
        $tot_proposal = ($sum_honrary > 0 ? 'R$ ' . number_format(($sum_honrary), 2, ',', '.') : '');


        $call_registers = CallRegister::where('call_id', $call->id)->where('step', 'call')->where(function ($query) {
            $query->orWhereNotNull('user_id');
        })->get();

        $call_registers2 = CallRegister::where('call_id', $call->id)->where('step', 'call')->WhereNotNull('client_id')->get();

        $usersadm = User::get()->pluck('name', 'id')->all();
        $roles_list = Role::all()->pluck('label', 'id')->all();

        $access = Access::where('call_id', $call->id)
            ->where('finish', '>=', date('Y-m-d H:i:s'))
            ->where('client_id', $call->client_id)
            ->orderBy('id', 'desc')->first();

        $qtd_installment =  ['' => 'Selecione', 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 10 => 10, 11 => 11, 12 => 12];
        $gender_list = ['' => 'Selecione'] + Client::GENDER_LIST;
        $client = $call->client;

        $call->job = $client->job;
        $call->date_birth = $client->date_birth;
        $call->gender = $client->gender;

        $call_honorary = $call->call_honorary()->where('description', 'honorary')->first();
        if ($call_honorary) {
            $call->amount_honorary = $call_honorary->amount;
        }

        $corrections_quantity = $call->call_honorary()->where('description', 'coautor')->count();
        $call->corrections_quantity = $corrections_quantity == 0 ? 1 : $corrections_quantity + 1;

        $proposal_fields = ProposalField::where('call_id', $call->id)->get();
        foreach ($proposal_fields as $field) {
            $key_field = $field->key;
            $call->$key_field = $field->value;
        }


        return view(
            'admin.pages.calls.show',
            compact(
                'call',
                'call_registers',
                'call_registers2',
                'changes_type',
                'reasons',
                'case_action',
                'case_feedback',
                'source_list',
                'court_costs',
                'tot_proposal',
                'honraries',
                'expenses',
                'payment_form',
                'task_list',
                'usersadm',
                'roles_list',
                'priority_list',
                'call_model',
                'feedback_list',
                'access',
                'qtd_installment',
                'gender_list',
                'tag_list',
                'relationship_list'
            )
        );
    }

    public function edit(Call $call, Client $clients, Changetype $changetype, Reason $reason)
    {
        $option_void = ['' => 'Selecione'];
        $client_list = $option_void + $clients->combo()->all();
        $changes_type = $option_void + $changetype->combo()->all();
        $reasons = $option_void + $reason->combo()->all();
        $case_action = $option_void + Call::CASE_ACTION;
        $source_list = $option_void + Call::SOURCE;
        $area_list = $option_void + Call::OCCUPATION_AREA;

        $type_enum = $option_void + Client::TYPE_ENUM;
        $type_email = $option_void + Client::TYPE_EMAIL;
        return view(
            'admin.pages.calls.edit',
            compact(
                'call',
                'client_list',
                'case_action',
                'changes_type',
                'reasons',
                'source_list',
                'type_enum',
                'type_email',
                'area_list'
            )
        );
    }

    public function changeCase(Call $call)
    {
        $sum_honrary = $call->call_honorary()->sum('amount');
        $int_stars = $call->stars;
        if (is_null($call->paymentform)) {
            return redirect()->back()->with('error', 'Você ainda não selecionou a forma de pagamento');
        } elseif ($sum_honrary <= 0) {
            return redirect()->back()->with('error', 'Você ainda não adicionou a proposta');
        } elseif (is_null($int_stars) || $int_stars < 3) {
            return redirect()->back()->with('error', 'O número de estrelas é inferior a 3');
        }
        $data = [
            'status' => 'assinado',
            'casedate' => date('Y-m-d H:i:s'),
            'stage_call' => 'assinado',
            'stage_case' => 'solicitacao_documentos'
        ];
        $call->fill($data);
        $call->save();

        $dataRegister = [
            'user_id' => Auth::user()->id,
            'call_id' => $call->id,
            'description' => "<strong>{$call->client->firstname}</strong> assinou o contrato",
            'step' => 'case'
        ];
        CallRegister::create($dataRegister);

        return redirect()->route('admin.calls.index')->with('success', 'Atendimento transformado em caso!');
    }

    public function finishCall(Call $call)
    {
        $data = [
            'status' => 'encerrado',
            'stage_call' => 'cancelado'
        ];
        $call->fill($data);
        $call->save();
        return redirect()->route('admin.calls.index')->with('success', 'Atendimento encerrado!');
    }

    public function updatePayment(Request $request, Call $call)
    {
        $data = $this->validate($request, [
            'paymentform' => "required",
            'max_installments' => 'nullable|numeric',
            'paydate' => 'nullable'
        ]);
        $call->fill($data);
        $call->save();

        return redirect()->back()->with('success', 'Atualizado com sucesso');
    }

    public function update(CallRequest $request, Call $call)
    {
        $data = $request->only(array_keys($request->rules()));
        $client = Client::find($request->client_id);

        DB::beginTransaction();

        $call->fill($data);
        $call->save();

        $dataRegister =
            [
                'user_id' => Auth::user()->id,
                'call_id' => $call->id,
                'description' => $request->description
            ];
        $call_register = CallRegister::create($dataRegister);

        if ($call && $call_register) {
            DB::commit();
            return redirect()->back()->with('success', 'Atendimento Atualizado com sucesso!');
        } else {
            DB::rollback();
            return redirect()->back()->with('error', 'Não foi possível atualizar o atendimento!');
        }
    }

    public function deleteRegister(Request $request, CallRegister $call_register)
    {
        $call_register->delete();
        return redirect()->back()->with('success', 'Registro excluído com sucesso!');
    }

    public function updateRegister(Request $request, CallRegister $call_register)
    {
        if ($request->fildRegister && !empty($request->fildRegister)) {
            $call_register->description = $request->fildRegister;
            $call_register->save();
            return redirect()->back()->with('success', 'Registro atualizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Não foi possível atualizar o registro!');
        }
    }

    public function storeRegister(Request $request, Call $call)
    {
        $request['type'] = 'normal';
        $request['call_id'] = $call->id;
        $request['user_id'] = Auth::user()->id;


        $data = $this->validate($request, [
            'user_id' => 'required|numeric',
            'call_id' => "required|numeric",
            'description' => 'required',
            'type' => 'nullable',
            'step' => 'nullable'
        ]);

        CallRegister::create($data);
        return redirect()->back()->with('success', 'Registro Adicionado com sucesso!');
    }

    public function valida_proposal(Request $request)
    {
        $max_installments = $request->paymentform == 'gerencianet' ? 'required' : 'nullable';
        $qtd_stars = $request->rating;

        $job = 'nullable';
        $date_birth = 'nullable|date';
        $gender = 'required';
        $amount_honorary = 'required';
        $paymentform = 'required';

        if (!is_null($qtd_stars) && ($qtd_stars == 4 || $qtd_stars == 5)) {
            $job = 'required';
            $date_birth = 'required|date';
        }

        if (!is_null($qtd_stars) && $qtd_stars == 1) {
            $gender = 'nullable';
            $amount_honorary = 'nullable';
            $paymentform = 'nullable';
        }

        return $this->validate($request, [
            'rating' => 'required|numeric',
            'motivo' => "nullable",
            'is_claimant' => "nullable",
            'relationship_claimant'  => "nullable",
            'corrections_quantity' => 'nullable',
            'gender' => $gender,
            'date_birth' => $date_birth,
            'job' => $job,
            'amount_honorary' => $amount_honorary,
            'paymentform' => $paymentform,
            'max_installments' => $max_installments,
            'paydate' => 'nullable',
            'gerencianet_id' => 'nullable'
        ]);
    }

    public function proposalStore(Request $request, Call $call)
    {
        $data = $this->valida_proposal($request);

        $corrections_quantity = $data['corrections_quantity'] ?? null;
        $motivo = $data['motivo'] ?? null;
        $data_call['stars'] =  $data['rating'];
        $data_call['paymentform'] =  $data['paymentform'];
        $data_call['max_installments'] =  $data['max_installments'];
        $data_call['paydate'] =  $data['paydate'];
        $data_call['gerencianet_id'] =  $data['gerencianet_id'];

        $data_call['star_reason'] = $motivo;

        if ($data['rating'] == 2) {
            $data_call['status'] = $motivo;
        } elseif ($data['rating'] == 1) {
            $data_call['status'] = 'encerrado';
        } elseif ($data['rating'] == 3) {
            $data_call['status'] = 'em_andamento';
        } elseif ($data['rating'] == 4) {
            $data_call['status'] = 'em_andamento';
        } elseif ($data['rating'] == 5) {
            $data_call['status'] = 'em_andamento';
        }

        $data_call['is_claimant'] = isset($data['is_claimant']) && $data['is_claimant'] == "1" ? true : false;
        $data_call['relationship_claimant'] = $data['relationship_claimant'] ?? null;

        $call->fill($data_call);
        $call->save();

        $client = $call->client;
        $client->gender = $data['gender'];
        $client->job = $data['job'];
        $client->date_birth = $data['date_birth'];
        $client->save();

        $dataRegister = [
            'user_id' => auth()->user()->id,
            'call_id' => $call->id,
            'description' => $call->client->first_name . ' recebeu ' . $call->stars . ' estrela de ' . auth()->user()->name . ' - <i><b>' . $motivo . '</b></i>',
            'type' => 'normal',
            'step' => 'call'
        ];
        CallRegister::create($dataRegister);

        CallHonorary::where('call_id', $call->id)->delete();

        if ($call->stars > 1) {
            $data_honorary = [
                'call_id' => $call->id,
                'amount' => $data['amount_honorary'],
                'description' => 'honorary'
            ];
            CallHonorary::create($data_honorary);


            if (!is_null($corrections_quantity)) {
                $corrections_quantity_cont = $corrections_quantity - 1;
                for ($cont = 1; $cont <= $corrections_quantity_cont; $cont++) {
                    $data_honorary = [
                        'call_id' => $call->id,
                        'amount' => '0,00',
                        'description' => 'coautor'
                    ];
                    CallHonorary::create($data_honorary);
                }
            }
        }

        if ($data['rating'] >= 2 && $request->button_title != 'save') {
            if ($call->stage_call != 'dados') {
                $call->stage_call = 'dados';
                $call->save();
            } else {
                $call->stage_call = null;
                $call->save();
                $call->stage_call = 'dados';
                $call->save();
            }
        }



        $object_of_action = $request->object_of_action ?? null;
        $assets = $request->assets ?? null;
        $descendants_quantity = $request->descendants_quantity ?? null;
        $custodian = $request->custodian ?? null;
        $fixed_food = $request->fixed_food ?? null;
        $percentage_food = $request->percentage_food ?? null;
        $unemployed_food = $request->unemployed_food ?? null;
        $ex_spouse_pension = $request->ex_spouse_pension ?? null;
        $value_of_goods = $request->value_of_goods ?? null;
        $court_costs = $request->court_costs ?? null;

        if (!is_null($descendants_quantity)) {
            $call->descendants_quantity = $descendants_quantity;
            $call->save();
        }

        $proposal_fild_data = [
            "object_of_action" => $object_of_action,
            "assets" => $assets,
            "descendants_quantity" => $descendants_quantity,
            "custodian" => $custodian,
            "fixed_food" => $fixed_food,
            "percentage_food" => $percentage_food,
            "unemployed_food" => $unemployed_food,
            "ex_spouse_pension" => $ex_spouse_pension,
            "value_of_goods" => $value_of_goods,
            "court_costs" => $court_costs
        ];

        foreach ($proposal_fild_data as $key => $value) {
            ProposalField::updateOrCreate(
                ['call_id' => $call->id, 'key' => $key],
                ['value' => $value]
            );
        }

        $msg = 'Proposta adicionada com sucesso!';
        if ($request->button_title == 'save') {
            $msg = 'As informações foram salvas com sucesso';
        }

        return redirect()->back()->with('success',  $msg);

        /*
        $amountHonoraryArray = (is_array($request->amount_honorary) ? $request->amount_honorary : []);
        $descriptionHonoraryArray = (is_array($request->description_honorary) ? $request->description_honorary : []);
        for ($cont = 0; $cont < count($amountHonoraryArray); $cont++) {
            $value = $amountHonoraryArray[$cont];
            $description = $descriptionHonoraryArray[$cont];
            if ($value != '') {
                $data = [
                    'call_id' => $call->id,
                    'amount' => $value,
                    'description' => $description
                ];
                CallHonorary::create($data);
            }
        }

        $amountExpenseArray = (is_array($request->amount_expense) ? $request->amount_expense : []);
        $descriptionExpenseArray = (is_array($request->description_expense) ? $request->description_expense : []);
        for ($cont = 0; $cont < count($amountExpenseArray); $cont++) {
            $value = $amountExpenseArray[$cont];
            $description = $descriptionExpenseArray[$cont];
            if ($value != '') {
                $data = [
                    'call_id' => $call->id,
                    'amount' => $value,
                    'description' => $description
                ];
                CallExpense::create($data);
            }
        }

        $data = $this->validate($request, [
            'paymentform' => "required",
            'max_installments' => 'nullable|numeric',
            'paydate' => 'nullable'
        ]);
        $call->fill($data);
        $call->save();
        */
    }

    public function type(Request $request, CallRegister $call_register)
    {
        $data['type'] = (isset($request->type) && $request->type != '' ? 'important' : 'normal');
        $call_register->fill($data);
        $call_register->save();
        return redirect()->back()->with('success', 'Atualizado com sucesso!');
    }

    public function changeaction(Request $request, Call $call)
    {
        if (in_array($request->caseaction, array_keys(Call::CASE_ACTION))) {
            $data['caseaction'] = $request->caseaction;
            $call->fill($data);
            $call->save();
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Não pode atualizar!');
        }
    }

    public function changetype(Request $request, Call $call)
    {
        if (isset($request->changetype_id) && is_numeric($request->changetype_id)) {
            $data['changetype_id'] = $request->changetype_id;
            $call->fill($data);
            $call->save();
            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Não pode atualizar!');
        }
    }

    public function changeReason(Request $request, Call $call)
    {
        if (isset($request->reason_id) && is_numeric($request->reason_id)) {
            $reasonatual_id = $call->reason_id;
            $reasonatual_obj = Reason::find($reasonatual_id);
            $reasonatual_name = $reasonatual_obj->name;

            $data['reason_id'] = $request->reason_id;
            $call->fill($data);
            $call->save();

            $reasonnew_id = $call->reason_id;
            $reasonnew_obj = Reason::find($reasonnew_id);
            $reasonnew_name = $reasonnew_obj->name;

            $step = 'call';
            if (is_null($call->casedate)) {
                $step = 'call';
            } elseif (!is_null($call->casedate) && is_null($call->process)) {
                $step = 'case';
            } elseif (!is_null($call->casedate) && !is_null($call->process)) {
                $step = 'precess';
            }

            $dataRegister = [
                'user_id' => auth()->user()->id,
                'call_id' => $call->id,
                'description' => "Motivo alterado de {$reasonatual_name} para {$reasonnew_name} por " . auth()->user()->name . ".",
                'step' => $step
            ];
            CallRegister::create($dataRegister);


            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Não pode atualizar!');
        }
    }

    public function changeStar(Request $request, Call $call)
    {
        if (isset($request->stars) && is_numeric($request->stars)) {
            $motivo = $request->motivo;
            $data['stars'] =  $request->stars;
            if ($request->stars == 2) {
                $data['status'] = $motivo;
            }
            $call->fill($data);
            $call->save();

            $dataRegister = [
                'user_id' => auth()->user()->id,
                'call_id' => $call->id,
                'description' => $call->client->first_name . ' recebeu ' . $call->stars . ' estrela de ' . auth()->user()->name . ' - <i><b>' . $motivo . '</b></i>',
                'type' => 'normal',
                'step' => 'call'
            ];
            CallRegister::create($dataRegister);

            return redirect()->back()->with('success', 'Atualizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Não pode atualizar!');
        }
    }

    public function destroy(Call $call)
    {
        $call->stage_call = 'cancelado';
        $call->save();

        $call->delete();
        return redirect()->route('admin.calls.index')->with('success', 'Excluído com sucesso!');
    }

    public function honraryDestroy(CallHonorary $honrary)
    {
        $honrary->delete();
        return redirect()->back()->with('success', 'Excluído com sucesso!');
    }

    public function expenseDestroy(CallExpense $expense)
    {
        $expense->delete();
        return redirect()->back()->with('success', 'Excluído com sucesso!');
    }

    public function generate_breve_relato(Call $call)
    {
        $name = $call->title;
        $description = $call->breve_relato;
        $nm_amigavel = Str::slug($name, '-');

        $description = str_replace(chr(10), '<br />', $description);

        foreach ($call->rectifications as $rectification) {
            $description .= '<br /><br />';
            $description .= '<strong>NOME ATUAL:</strong> ' . $rectification->currentname . '<br />';
            $description .= '<strong>NOME PRETENDIDO:</strong> ' . $rectification->desiredname . '<br />';
        }

        $dompdf = new \Dompdf\Dompdf;
        $dompdf->loadhtml($description);
        $dompdf->setPaper('A4', 'portrait');
        //ob_clean();
        $dompdf->render();
        $dompdf->stream($nm_amigavel . '.pdf');
    }
}
