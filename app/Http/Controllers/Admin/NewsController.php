<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use App\Http\Requests\NewsRequest;
use App\Models\NewsCategory;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $news = News::paginate(15);
        return view('admin.pages.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(NewsCategory $news_category)
    {
        $category_list = ['' => 'Selecione'];
        $category_list += $news_category->combo()->all();
        return view('admin.pages.news.create', compact('category_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['slug'] =  Str::slug($request->name);
        $data['websites'] = (is_array($request->websites) ? implode(',', $request->websites) : $request->websites); 
        News::create($data);
        return redirect()->route('admin.news.index')->with('success','Notícia adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.pages.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsCategory $news_category, News $news)
    {
        $category_list = ['' => 'Selecione'];
        $category_list += $news_category->combo()->all();
        if(!is_null($news->websites))
            $news->websites = explode(',', $news->websites);
        return view('admin.pages.news.edit', compact('news', 'category_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['slug'] =  Str::slug($request->name);
        $data['websites'] = (is_array($request->websites) ? implode(',', $request->websites) : $request->websites); 
        $news->fill($data);
        $news->save();
        return redirect()->route('admin.news.index')->with('success','Notícia atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success','Notícia excluída com sucesso!');
    }
}
