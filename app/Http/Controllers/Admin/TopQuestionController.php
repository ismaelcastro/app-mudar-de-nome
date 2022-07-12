<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TopQuestionRequest;
use App\Models\TopQuestion;
use App\Models\TopQuestionCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use function GuzzleHttp\Promise\all;

class TopQuestionController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $topQuestions = TopQuestion::all();

        return view('admin.pages.top_questions.index', compact('topQuestions'));
    }

    public function show(TopQuestion $topQuestion)
    {
        return view('admin.pages.top_questions.show', compact('topQuestion'));
    }

    /**
     * @param TopQuestionCategory $questionCategory
     * @return Application|Factory|View
     */
    public function create(TopQuestionCategory $questionCategory)
    {
        $category_list = ['' => 'Selecione'];
        $category_list += $questionCategory->combo()->all();

        return view('admin.pages.top_questions.create', compact('category_list'));
    }

    /**
     * @param TopQuestionRequest $questionRequest
     * @return RedirectResponse
     */
    public function store(TopQuestionRequest $questionRequest)
    {
        TopQuestion::create($questionRequest->all());

        return redirect()->route('admin.top_questions.index')->with('success', 'Dúvida cadastrada com sucesso.!');
    }

    /**
     * @param TopQuestion $topQuestion
     * @param TopQuestionCategory $questionCategory
     * @return Application|Factory|View
     */
    public function edit(TopQuestion $topQuestion, TopQuestionCategory $questionCategory)
    {
        $category_list = ['' => 'Selecione'];
        $category_list += $questionCategory->combo()->all();

        return view('admin.pages.top_questions.edit', compact('category_list', 'topQuestion'));
    }

    /**
     * @param TopQuestionRequest $questionRequest
     * @param TopQuestion $topQuestion
     * @return RedirectResponse
     */
    public function update(TopQuestionRequest $questionRequest, TopQuestion $topQuestion)
    {
        $topQuestion->fill($questionRequest->all());
        $topQuestion->save();

        return redirect()->route('admin.top_questions.index')->with('success', 'Principal Dúvida atualizada com sucesso');
    }

    /**
     * @param TopQuestion $topQuestion
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(TopQuestion $topQuestion)
    {
        $topQuestion->delete();

        return redirect()->route('admin.top_questions.index')->with('success', 'Principal Dúvida deletada com sucesso');
    }

}
