<?php

namespace App\Http\Controllers\Client;

use App\Models\Affiliation;
use App\Models\Call;
use App\Models\CallExtra;
use App\Http\Controllers\Controller;
use App\Models\DocumentCategory;
use App\Models\ProcessCategory;
use App\Models\TopQuestion;
use App\Models\TopQuestionCategory;
use Illuminate\Http\Request;
use Illuminate\View\View as ViewAlias;

class ProcessoController extends Controller
{
    public function index()
    {
        return view('client.pages.processo.index');
    }

    public function acompanhamento()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id', 'desc')->first();

        $top_questions = TopQuestion::with('top_question_category')->orderBy('order', 'asc')->get();
        $top_questions_category = TopQuestionCategory::all();

        $call_subject = Call::SUBJECT;
        $call_procedural = Call::PROCEDURAL_STEP;
        $call_procedural_status = Call::PROCEDURAL_STATUS;
        $call_procedural_icons = Call::PROCEDURAL_STATUS_ICONS;

        $docExtras = CallExtra::where('call_id', $call->id)->whereNull('extra_category_id')->count();
        $docExtrasFile = CallExtra::where('call_id', $call->id)->whereNull('extra_category_id')->whereNotNull('file')->count();
        if ($docExtras == 0 && $docExtrasFile == 0) {
            $percent = 0;
        } else {
            $percent = $docExtrasFile / ($docExtras / 100);
        }

        $process_categories_colors = ProcessCategory::all()->pluck('color', 'name')->all();

        return view(
            'client.pages.processo.acompanhamento',
            compact(
                'percent',
                'client',
                'call',
                'call_subject',
                'call_procedural',
                'call_procedural_status',
                'call_procedural_icons',
                'top_questions',
                'top_questions_category',
                'docExtras',
                'process_categories_colors'
            )
        );
    }

    /**
     * Listagem de Categorias do Documentos Extras.
     *
     * @param CallExtra $call_extra
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|ViewAlias
     */
    public function docsextra(CallExtra $call_extra)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id', 'desc')->first();
        $document_category = DocumentCategory::all();

        $top_questions = TopQuestion::with('top_question_category')->orderBy('order', 'asc')->get();
        $top_questions_category = TopQuestionCategory::all();

        return view(
            'client.pages.processo.documentacao-extras',
            compact(
                'client',
                'call',
                'call_extra',
                'document_category',
                'top_questions',
                'top_questions_category'
            )
        );
    }

    public function documentacaoExtra(Request $request, DocumentCategory $document_category, CallExtra $call_extra)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id', 'desc')->first();

        $client_id_url = isset($request->client_id) && is_numeric($request->client_id) ? (int)$request->client_id : null;

        if ($document_category->by_contact && is_null($client_id_url)) {
            return redirect()->route('client.processo.documentacao.documento.extra.documentos_por_nome', ['document_category' => $document_category->id]);
        }

        $documents_list = $document_category->documents;
        return view(
            'client.pages.processo.documentos-extras',
            compact(
                'document_category',
                'call_extra',
                'call',
                'documents_list',
                'client',
                'client_id_url'
            )
        );
    }

    public function documentosExtrasPorNome(DocumentCategory $document_category)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id', 'desc')->first();
        $type_list = Affiliation::TYPE;
        $category_id = $document_category->id;

        $affiliations = $call->Affiliations()->whereHas('call_documents_extras', function ($q) use ($category_id) {
            $q->whereNotNull('status')->whereNull('extra_category_id')
                ->whereHas('document', function ($qq) use ($category_id) {
                    $qq->where('document_category_id', $category_id);
                });
        })->get();

        $claimantExtras = CallExtra::where('client_id', $client->id)->whereNull('extra_category_id')
            ->whereHas('document', function ($query) use ($category_id) {
                $query->where('document_category_id', $category_id);
            })->get();

        return view(
            'client.pages.processo.documentos-extra_por_nome',
            compact(
                'document_category',
                'call',
                'client',
                'claimantExtras',
                'affiliations',
                'type_list'
            )
        );
    }

    /**
     * Envia os Documentos Extras.
     *
     * @param Call $call
     * @return \Illuminate\Http\RedirectResponse
     */
    public function client_document_extras(Call $call)
    {
        $call->procedural_status = "com_advogado";
        $call->procedural_step = "Com Advogado";
        $call->save();

        return redirect()->route('client.processo.acompanhamento')->with('success', 'Solicitação enviada');
    }
}
