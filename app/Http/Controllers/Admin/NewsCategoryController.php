<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use App\Http\Requests\NewsCategoryRequest;
use App\Models\NewsCategory;


class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_categories = NewsCategory::paginate(15);
        return view('admin.pages.news_categories.index', compact('news_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.news_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCategoryRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['slug'] =  Str::slug($request->name);
        NewsCategory::create($data);
        return redirect()->back()->with('success','Categoria adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $news_category
     * @return \Illuminate\Http\Response
     */
    public function show(NewsCategory $news_category)
    {
        return view('admin.pages.news_categories.show', compact('news_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $news_category
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsCategory $news_category)
    {
        return view('admin.pages.news_categories.edit', compact('news_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $news_category
     * @return \Illuminate\Http\Response
     */
    public function update(NewsCategoryRequest $request, NewsCategory $news_category)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['slug'] =  Str::slug($request->name);
        $news_category->fill($data);
        $news_category->save();
        return redirect()->route('admin.news_categories.index')->with('success','Categoria atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $news_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsCategory $news_category)
    {
        $news_category->delete();
        return redirect()->route('admin.news_categories.index')->with('success','Categoria excluída com sucesso!');
    }
}
