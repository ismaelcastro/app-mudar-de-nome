<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TopQuestionCategoryRequest;
use App\Models\TopQuestionCategory;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TopQuestionCategoryController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $topQuestionCategory = TopQuestionCategory::all();

        return view('admin.pages.top_questions_categories.index', compact('topQuestionCategory'));
    }

    /**
     * @param TopQuestionCategory $questionCategory
     * @return Application|Factory|View
     */
    public function show(TopQuestionCategory $questionCategory)
    {
        return view('admin.pages.top_questions_categories.show', compact('questionCategory'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.top_questions_categories.create');
    }

    /**
     * @param TopQuestionCategoryRequest $questionCategoryRequest
     * @return RedirectResponse
     */
    public function store(TopQuestionCategoryRequest $questionCategoryRequest)
    {
        TopQuestionCategory::create($questionCategoryRequest->all());

        return redirect()->route('admin.top_questions_categories.index')->with('success', 'A Categoria foi cadastrada com sucesso.!');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $topQuestionCategory = TopQuestionCategory::find($id);

        return view('admin.pages.top_questions_categories.edit', compact('topQuestionCategory'));
    }

    /**
     * @param TopQuestionCategoryRequest $questionCategoryRequest
     * @param TopQuestionCategory $topQuestionCategory
     * @return RedirectResponse
     */
    public function update(TopQuestionCategoryRequest $questionCategoryRequest, TopQuestionCategory $topQuestionCategory)
    {
        $topQuestionCategory->fill($questionCategoryRequest->all());
        $topQuestionCategory->save();

        return redirect()->route('admin.top_questions_categories.index')->with('success', 'Categoria atualizada com sucesso');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $topQuestionCategory = TopQuestionCategory::find($id);
        $topQuestionCategory->delete();

        return redirect()->route('admin.top_questions_categories.index')->with('success', 'Categoria deletada com sucesso');
    }
}
