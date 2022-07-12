<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProcessTypeRequest;
use App\Models\ProcessType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProcessTypeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $processType = ProcessType::all();

        return view('admin.pages.process_type.index', compact('processType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.process_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProcessTypeRequest $request
     * @return Response
     */
    public function store(ProcessTypeRequest $request)
    {
        ProcessType::create($request->all());

        return redirect()->route('admin.process_type.index')->with('success', 'A Categoria foi cadastrada com sucesso.!');
    }

    /**
     * Display the specified resource.
     *
     * @param ProcessType $processType
     * @return Application|Factory|View
     */
    public function show(ProcessType $processType)
    {
        return view('admin.pages.process_type.show', compact('processType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $processType = ProcessType::find($id);

        return view('admin.pages.process_type.edit', compact('processType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProcessTypeRequest $request
     * @param ProcessType $processType
     * @return RedirectResponse
     */
    public function update(ProcessTypeRequest $request, ProcessType $processType)
    {
        $processType->fill($request->all());
        $processType->save();

        return redirect()->route('admin.process_type.index')->with('success', 'Categoria atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $processType = ProcessType::find($id);
        $processType->delete();

        return redirect()->route('admin.process_type.index')->with('success', 'Categoria deletada com sucesso');

    }
}
