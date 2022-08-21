<?php

namespace App\Http\Controllers\Admin;

use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Affiliation;
use App\Models\Call;
use App\Models\Client;
use App\Models\Reason;
use App\Models\DocumentCategory;
use App\Models\CallExtra;
use App\Models\TaskList;
use App\Models\Task;
use App\Models\User;
use App\Models\CallDocument;
use App\Models\CallHonorary;
use App\Models\ExtraCategory;
use App\Models\ProcessCategory;

class ProcessController extends Controller
{
    public function index(Request $request, Call $call_model, TaskList $task_list, Reason $reason)
    {
        $arrayVoid = ['' => 'Selecione'];
        $task_list = $arrayVoid + $task_list->combo()->all();
        $usersadm = User::get()->pluck('name', 'id')->all();
        $priority_list = $arrayVoid + Task::PRIORITY;
        $dataForm = $request->except('_token');
        $reasons = $reason->combo()->all();

        $stage_case_list = Call::STAGE_CASE;
        $procedural_step_list = Call::PROCEDURAL_STEP;

        $areas_all = Call::OCCUPATION_AREA;
        $user_occupation_area = auth()->user()->occupation_area;
        $areas_list = $areas_all;
        if (!is_null($user_occupation_area)) {
            $areas_list = [$user_occupation_area => $areas_all[$user_occupation_area]];
        }

        $process_categories_colors = ProcessCategory::all()->pluck('color', 'name')->all();

        //dd('Programador mexendo, vai levar poucos minutos',$dataForm, $stage_case_list);

        $calls = $call_model
            ->join('clients', 'calls.client_id', '=', 'clients.id')
            ->join('reasons', 'reasons.id', '=', 'calls.reason_id')
            ->where(function ($query) use ($dataForm) {
                $query->whereNotNull('process');
                if (isset($dataForm['procedural_step'])) {
                    $query->whereIn('procedural_step', $dataForm['procedural_step']);
                }

                if (isset($dataForm['occupation_area']))
                    $query->where('occupation_area', $dataForm['occupation_area']);

                if (isset($dataForm['stage_case']))
                    $query->whereIn('stage_case', $dataForm['stage_case']);

                if (isset($dataForm['paymentform']))
                    $query->where('paymentform', $dataForm['paymentform']);

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

                if (isset($dataForm['date_start']) && isset($dataForm['date_finish'])) {
                    $field_date_search = $dataForm['field_date_search'];
                    $query->whereBetween('calls.' . $field_date_search, [$dataForm['date_start'] . ' 00:00:00', $dataForm['date_finish'] . ' 23:59:59']);
                }
            })->select('calls.*');

        if (isset($dataForm['ord'])) {
            $ord = $dataForm['ord'];
            $ordArray = explode(';', $ord);
            $field = $ordArray[0];
            $direction = isset($ordArray[1]) && $ordArray[1] == 'desc' ? 'desc' : 'asc';
            $calls = $calls->orderBy($field, $direction);
        }
        $calls = $calls->paginate(20);

        $qtd_ministerio_publico = Call::whereNotNull('process')->where('procedural_step', 'Aguardando Ministério Público')->count();
        $qtd_documentos_extras = Call::whereNotNull('process')->where('procedural_step', 'Aguardando Cliente')->count();
        $qtd_analises = Call::whereNotNull('process')->where('procedural_step', 'Documentos em Análise')->count();
        $qtd_audiencias = Call::whereNotNull('process')->where('procedural_step', 'Audiência Designada')->count();
        $qtd_conclusos = Call::whereNotNull('process')->where('procedural_step', 'Conclusos')->count();
        $qtd_transito_julgado = Call::whereNotNull('process')->where('procedural_step', 'Aguardando Trânsito em Julgado')->count();
        $qtd_mandado = Call::whereNotNull('process')->where('procedural_step', 'Aguardando Mandado de Averbação')->count();
        $qtd_averbacao = Call::whereNotNull('process')->where('procedural_step', 'Averbação em Cartório')->count();
        $qtd_servico_averbacao = 0; //Call::whereNotNull('process')->where('procedural_step','Aguardando Ministério Público')->count();
        $qtd_arquivado = Call::whereNotNull('process')->where('procedural_step', 'Arquivado')->count();

        return view(
            'admin.pages.process.index',
            compact(
                'calls',
                'dataForm',
                'task_list',
                'usersadm',
                'priority_list',
                'stage_case_list',
                'procedural_step_list',
                'reasons',
                'process_categories_colors',

                'qtd_ministerio_publico',
                'qtd_documentos_extras',
                'qtd_analises',
                'qtd_audiencias',
                'qtd_conclusos',
                'qtd_transito_julgado',
                'qtd_mandado',
                'qtd_averbacao',
                'qtd_servico_averbacao',
                'qtd_arquivado',
                'areas_list'
            )
        );
    }

    public function show(
        Request $request,
        DocumentCategory $documentCategory,
        CallExtra $callExtra,
        Call $call,
        Reason $reason,
        CallDocument $callDocument,
        TaskList $task_list
    ) {
        $profile_color = Client::PROFILE_COLOR;
        $arrayVoid = ['' => 'Selecione'];
        $reasons = $reason->combo()->all();
        $documentCategories = $documentCategory->all();
        $extraCategories = ExtraCategory::where('call_id', $call->id)->get();
        $procedural_steps = ProcessCategory::all();
        $affiliation_types = Affiliation::TYPE;
        $qtd_coautor = CallHonorary::where('call_id', $call->id)->where('description', 'coautor')->count();
        $qtd_retificacoes_permitidas = $qtd_coautor + 1;

        $docsAll = $call->document_extras()->whereNull('extra_category_id')->count();
        $docsSends = $call->document_extras()->whereNull('extra_category_id')->whereNotNull('file')->count();
        $docsPending = $call->document_extras()->where('status', 'pending')->whereNull('extra_category_id')->count();
        $docsDisapproved = $call->document_extras()->where('status', 'disapproved')->whereNull('extra_category_id')->count();
        $docsApproved = $call->document_extras()->where('status', 'approved')->whereNull('extra_category_id')->count();

        $docExtraQtdNew = $call->document_extras()->where('status', 'new')->count();
        $docExtraQtdDisp = $call->document_extras()->where('status', 'disapproved')->count();

        $task_list = $arrayVoid + $task_list->combo()->all();
        $priority_list = $arrayVoid + Task::PRIORITY;
        $usersadm = User::get()->pluck('name', 'id')->all();

        $call_procedural_status = Call::PROCEDURAL_STATUS;
        $call_procedural_icons = Call::PROCEDURAL_STATUS_ICONS;

        if (isset($request->allregistercase))
            $call_registers = $call->call_register_desc->where('step', 'precess')->all();
        elseif (isset($request->allregister))
            $call_registers = $call->call_register_desc->all();
        else
            $call_registers = $call->call_register_last(5)->where('step', 'precess')->get();

        $access = Access::where('call_id', $call->id)
            ->where('finish', '>=', date('Y-m-d H:i:s'))
            ->where('client_id', $call->client_id)
            ->orderBy('id', 'desc')->first();

        $requerente = $call->Affiliations()->where('type', 'claimant')->first()->client ?? false;
        if (!$requerente) {
            $requerente = $call->client;
        }

        $process_categories_colors = ProcessCategory::all()->pluck('color', 'name')->all();

        $proposal_fields_list = $call->proposal_fields->pluck('value', 'key')->all();

        $all_breve = 'disapproved';

        return view(
            'admin.pages.process.show',
            compact(
                'call',
                'documentCategories',
                'docsAll',
                'docsSends',
                'callExtra',
                'docsPending',
                'docsDisapproved',
                'docsApproved',
                'docExtraQtdNew',
                'docExtraQtdDisp',
                'reasons',
                'call_registers',
                'callDocument',
                'task_list',
                'usersadm',
                'priority_list',
                'profile_color',
                'extraCategories',
                'access',
                'call_procedural_status',
                'call_procedural_icons',
                'procedural_steps',
                'process_categories_colors',
                'affiliation_types',
                'qtd_retificacoes_permitidas',
                'all_breve',
                'requerente',
                'proposal_fields_list'
            )
        );
    }

    public function storedocument(Request $request, Call $call)
    {
        foreach ($request->document_id as $item) {
            $document_name = Document::find((int)$item)->name;

            $data = [
                'client_id' => (int)$request->client_id,
                'user_id' => $call->user_id,
                'call_id' => $call->id,
                'document_id' => $item,
                'name' => $document_name
            ];

            Validator::make($data, [
                'document_id' => 'required|numeric'
            ])->validate();

            CallExtra::create($data);
        }
        return redirect()->to(url()->previous() . '#info-docsextras_top')->with('success', 'Adicionado com sucesso!');
    }

    public function document_approve(CallExtra $callExtra)
    {
        $data = [
            'status' => 'approved'
        ];
        $callExtra->fill($data);
        $callExtra->save();

        $call_id = $callExtra->call_id;

        $docsTots = CallExtra::where('call_id', $call_id)->whereNull('extra_category_id')->count();
        $docsApproved = CallExtra::where('call_id', $call_id)->whereNull('extra_category_id')->where('status', 'approved')->count();
        if ($docsTots == $docsApproved) {
            $data2 = [
                'name' => $callExtra->call->title_doc_extra,
                'call_id' => $call_id
            ];
            $extraCategory = ExtraCategory::create($data2);
            $extraCategory_id = $extraCategory->id;
            CallExtra::where('call_id', $call_id)->whereNull('extra_category_id')->update(['extra_category_id' => $extraCategory_id]);

            /** @var Call $call */
            $call = Call::find($call_id);
            $data = [
                'title_doc_extra' => null,
                'procedural_status' => 'em_andamento',
                'procedural_step' => 'Processo Distribuído',
                'date_procedural_status' => Carbon::now()
            ];
            $call->fill($data);
            $call->save();
        }
        return redirect()->to(url()->previous() . '#info-docsextras_top')->with('success', 'Status do documento atualizado!');
    }

    public function document_reprove(Request $request, CallExtra $callExtra)
    {
        $data = [
            'status' => 'disapproved',
            'reason' => $request->reason
        ];
        Validator::make($data, [
            'reason'  => 'required|max:191'
        ])->validate();
        $callExtra->fill($data);
        $callExtra->save();
        return redirect()->to(url()->previous() . '#info-docsextras_top')->with('success', 'Status do documento atualizado!');
    }

    public function document_destroy(CallExtra $callExtra)
    {
        $callExtra->delete();
        return redirect()->to(url()->previous() . '#info-docsextras_top')->with('success', 'Documento excluído!');
    }

    public function request_extra_documents(Call $call)
    {
        $data_agora = date('d/m/Y');
        $call->title_doc_extra = "Documentos Extras – solicitados dia {$data_agora}";
        $call->save();
        return redirect()->to(url()->previous() . '#info-docsextras_top')->with('success', 'Agora você solicitar documentos extras!');
    }


    public function document_anexo(Request $request, CallExtra $callExtra)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $call_id = $callExtra->call_id;
            $call = Call::find($call_id);

            $extension = $request->file->extension();
            $fileName = str_replace($extension, '', $request->file->getClientOriginalName());
            $folder = Str::slug($call->client_id . '-' . $call->client->name);
            $fileNameFormated = Str::slug($fileName) . '_' . rand(10, 99) . '.' . $extension;
            $upload = $request->file->storeAs($folder, $fileNameFormated, 'private');
            if ($upload) {
                $data = [
                    'file' => $fileNameFormated,
                    'status' => 'pending'
                ];
                $callExtra->fill($data);
                $callExtra->save();
                return redirect()->to(url()->previous() . '#info-docsextras_top')->with('success', 'Arquivo anexado com sucesso!');
            } else {
                return redirect()->to(url()->previous() . '#info-docsextras_top')->with('error', 'Não foi possível fazer upload!');
            }
        }
    }

    /**
     * Send to client Document Extras
     *
     * @param Call $call
     * @return RedirectResponse
     */

    public function change_procedural_step(Call $call, $step)
    {
        $call->procedural_step = $step;
        $call->save();
        return redirect()->back()->with('success', 'Atualizado com sucesso!');
    }

    public function send_document_extras(Call $call)
    {
        //$call->procedural_status = "com_requerente";
        $call->procedural_step = "Aguardando Cliente";
        //$call->date_procedural_status = Carbon::now();
        $call->save();

        return redirect()->to(url()->previous() . '#info-docsextras_top')->with('success', 'O Cliente foi notificado');
    }
}
