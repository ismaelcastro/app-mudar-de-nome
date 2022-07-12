<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProcessCategoryRequest;
use App\Models\ProcessCategory;
use App\Models\ProcessType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Call;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProcessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $processCategory = ProcessCategory::all();

        return view('admin.pages.process_category.index', compact('processCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(ProcessType $processType)
    {
        $category_list = ['' => 'Selecione'];
        $category_list += $processType->combo()->all();
        $status_list_call = Call::PROCEDURAL_STATUS;

        return view('admin.pages.process_category.create', compact('category_list','status_list_call'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProcessCategoryRequest $request
     * @return Application|Factory|View
     */
    public function store(ProcessCategoryRequest $request)
    {
        ProcessCategory::create($request->all());

        return redirect()->route('admin.process_category.index')->with('success', 'Estado do Processo adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param ProcessCategory $processCategory
     * @return Application|Factory|View
     */
    public function show(ProcessCategory $processCategory)
    {
        return view('admin.pages.process_category.show', compact('processCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProcessCategory $processCategory
     * @param ProcessType $processType
     * @return Application|Factory|View
     */
    public function edit(ProcessCategory $processCategory, ProcessType $processType)
    {
        $category_list = ['' => 'Selecione'];
        $category_list += $processType->combo()->all();
        $status_list_call = Call::PROCEDURAL_STATUS;

        return view('admin.pages.process_category.edit', compact('processCategory', 'category_list','status_list_call'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(ProcessCategoryRequest $request, ProcessCategory $processCategory)
    {
        $processCategory->fill($request->all());
        $processCategory->save();

        return redirect()->route('admin.process_category.index')->with('success', 'Estado do Processo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws \Exception
     */
    public function destroy(ProcessCategory $processCategory)
    {
        $processCategory->delete();

        return redirect()->route('admin.process_category.index')->with('success', 'Estado do Processo excluído com sucesso!');
    }
}
