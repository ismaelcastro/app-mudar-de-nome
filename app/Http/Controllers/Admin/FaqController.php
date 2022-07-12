<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\FaqRequest;
use App\Models\FaqCategory;
use App\Models\Faq;


class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::paginate(15);
        return view('admin.pages.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FaqCategory $faq_category)
    {
        $category_list = ['' => 'Selecione'];
        $category_list += $faq_category->combo()->all();
        return view('admin.pages.faqs.create', compact('category_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['websites'] = (is_array($request->websites) ? implode(',', $request->websites) : $request->websites); 
        Faq::create($data);
        return redirect()->route('admin.faqs.index')->with('success','Faq adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return view('admin.pages.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(FaqCategory $faq_category, Faq $faq)
    {
        $category_list = ['' => 'Selecione'];
        $category_list += $faq_category->combo()->all();
        if(!is_null($faq->websites))
            $faq->websites = explode(',', $faq->websites);
        return view('admin.pages.faqs.edit', compact('faq', 'category_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['websites'] = (is_array($request->websites) ? implode(',', $request->websites) : $request->websites); 
        $faq->fill($data);
        $faq->save();
        return redirect()->route('admin.faqs.index')->with('success','Faq atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success','Faq excluída com sucesso!');
    }
}
