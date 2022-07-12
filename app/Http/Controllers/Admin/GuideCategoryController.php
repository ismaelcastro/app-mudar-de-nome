<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\GuideCategoryRequest;
use App\Http\Controllers\Controller;

use App\Models\GuideCategory;

class GuideCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guide_categories = GuideCategory::all();
        return view('admin.pages.guide_categories.index', compact('guide_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.guide_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuideCategoryRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['forwardingagent'] = $request->has('forwardingagent');
        $data['package'] = $request->has('package');
        GuideCategory::create($data);
        return redirect()->back()->with('success','Categoria adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GuideCategory $guide_category)
    {
        return view('admin.pages.guide_categories.show', compact('guide_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GuideCategory $guide_category)
    {
        return view('admin.pages.guide_categories.edit', compact('guide_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuideCategoryRequest $request, GuideCategory $guide_category)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['forwardingagent'] = $request->has('forwardingagent');
        $data['package'] = $request->has('package');
        $guide_category->fill($data);
        $guide_category->save();
        return redirect()->route('admin.guide_categories.index')->with('success','Categoria atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuideCategory $guide_category)
    {
        $guide_category->delete();
        return redirect()->route('admin.guide_categories.index')->with('success','Categoria excluída com sucesso!');
    }
}
