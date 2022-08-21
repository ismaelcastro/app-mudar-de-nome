<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DocumentRequest;
use App\Http\Controllers\Controller;
use App\Models\Affiliation;
use App\Models\DocumentCategory;
use App\Models\Document;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        if (isset($request->document_category_id) && is_numeric($request->document_category_id)) {
            $document_category_id = (int)$request->document_category_id;
            $documents = Document::where('document_category_id', $document_category_id)->get();
        } else {
            $documents = Document::all();
        }

        return view('admin.pages.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param DocumentCategory $document_category
     * @return Application|Factory|Response|View
     */
    public function create(DocumentCategory $document_category)
    {
        $category_list = ['' => 'Selecione'];
        $category_list += $document_category->combo()->all();
        $type_list = Document::TYPES;
        $affiliation_list = ['' => 'Nenhum'] + Affiliation::TYPE;

        return view('admin.pages.documents.create', compact('category_list', 'type_list', 'affiliation_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DocumentRequest $request
     * @return RedirectResponse
     */
    public function store(DocumentRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        Document::create($data);

        return redirect()->route('admin.documents.index')->with('success', 'Documento adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param Document $document
     * @return Application|Factory|Response|View
     */
    public function show(Document $document)
    {
        return view('admin.pages.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $document
     * @param DocumentCategory $document_category
     * @return Application|Factory|Response|View
     */
    public function edit(Document $document, DocumentCategory $document_category)
    {
        $category_list = ['' => 'Selecione'];
        $category_list += $document_category->combo()->all();
        $type_list = Document::TYPES;
        $affiliation_list = ['' => 'Nenhum'] + Affiliation::TYPE;

        return view('admin.pages.documents.edit', compact('document', 'category_list', 'type_list', 'affiliation_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DocumentRequest $request
     * @param Document $document
     * @return RedirectResponse
     */
    public function update(DocumentRequest $request, Document $document)
    {
        $data = $request->only(array_keys($request->rules()));
        $document->fill($data);
        $document->save();

        return redirect()->back()->with('success', 'Documento atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Document $document)
    {
        $document->delete();

        return redirect()->route('admin.documents.index')->with('success', 'Documento excluído com sucesso!');
    }
}
