<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\GuideRequest;
use App\Http\Controllers\Controller;
use App\Models\GuideCategory;
use App\Models\Guide;
use Illuminate\Http\Response;
use Illuminate\View\View;
use function GuzzleHttp\Promise\all;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $guides = Guide::paginate(20);

        return view('admin.pages.guides.index', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param GuideCategory $guide_category
     * @return Application|Factory|Response|View
     */
    public function create(GuideCategory $guide_category)
    {
        $category_list = ['' => 'Selecione'];
        $category_list += $guide_category->combo()->all();
        $type_list = Guide::TYPES;

        return view('admin.pages.guides.create', compact('category_list', 'type_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GuideRequest $request
     * @return RedirectResponse
     */
    public function store(GuideRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        Guide::create($data);

        return redirect()->route('admin.guides.index')->with('success','Guia adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param Guide $guide
     * @return Application|Factory|Response|View
     */
    public function show(Guide $guide)
    {
        return view('admin.pages.guides.show', compact('guide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Guide $guide
     * @param GuideCategory $guide_category
     * @return Application|Factory|Response|View
     */
    public function edit(Guide $guide, GuideCategory $guide_category)
    {
        $category_list = ['' => 'Selecione'];
        $category_list += $guide_category->combo()->all();
        $type_list = Guide::TYPES;

        return view('admin.pages.guides.edit', compact('guide', 'category_list', 'type_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GuideRequest $request
     * @param Guide $guide
     * @return RedirectResponse
     */
    public function update(GuideRequest $request, Guide $guide)
    {
        $data = $request->only(array_keys($request->rules()));
        $guide->fill($data);
        $guide->save();

        return redirect()->route('admin.guides.index')->with('success','Guia atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Guide $guide
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();

        return redirect()->route('admin.guides.index')->with('success','Guia excluída com sucesso!');
    }
}
