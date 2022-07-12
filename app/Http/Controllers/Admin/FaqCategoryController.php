<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\FaqCategoryRequest;
use App\Models\FaqCategory;


class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq_categories = FaqCategory::paginate(15);
        return view('admin.pages.faq_categories.index', compact('faq_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.faq_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqCategoryRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['slug'] =  Str::slug($request->name);
        FaqCategory::create($data);
        return redirect()->back()->with('success','Categoria adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $faq_category
     * @return \Illuminate\Http\Response
     */
    public function show(FaqCategory $faq_category)
    {
        return view('admin.pages.faq_categories.show', compact('faq_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $faq_category
     * @return \Illuminate\Http\Response
     */
    public function edit(FaqCategory $faq_category)
    {
        return view('admin.pages.faq_categories.edit', compact('faq_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $faq_category
     * @return \Illuminate\Http\Response
     */
    public function update(FaqCategoryRequest $request, FaqCategory $faq_category)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['slug'] =  Str::slug($request->name);
        $faq_category->fill($data);
        $faq_category->save();
        return redirect()->route('admin.faq_categories.index')->with('success','Categoria atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FaqCategory $faq_category)
    {
        $faq_category->delete();
        return redirect()->route('admin.faq_categories.index')->with('success','Categoria excluída com sucesso!');
    }
}
