<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DocumentCategoryRequest;
use App\Http\Controllers\Controller;

use App\Models\DocumentCategory;

class DocumentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document_categories = DocumentCategory::orderBy('order')->paginate(15);
        return view('admin.pages.document_categories.index', compact('document_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.document_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentCategoryRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['forwardingagent'] = $request->has('forwardingagent');
        $data['package'] = $request->has('package');
        $data['client_add'] = $request->has('client_add');
        $data['by_contact'] = $request->has('by_contact');
        DocumentCategory::create($data);
        return redirect()->back()->with('success', 'Categoria adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $document_category
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentCategory $document_category)
    {
        return view('admin.pages.document_categories.show', compact('document_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $document_category
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentCategory $document_category)
    {
        return view('admin.pages.document_categories.edit', compact('document_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $document_category
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentCategoryRequest $request, DocumentCategory $document_category)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['forwardingagent'] = $request->has('forwardingagent');
        $data['package'] = $request->has('package');
        $data['client_add'] = $request->has('client_add');
        $data['by_contact'] = $request->has('by_contact');
        $document_category->fill($data);
        $document_category->save();
        return redirect()->route('admin.document_categories.index')->with('success', 'Categoria atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $document_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentCategory $document_category)
    {
        $document_category->delete();
        return redirect()->route('admin.document_categories.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
