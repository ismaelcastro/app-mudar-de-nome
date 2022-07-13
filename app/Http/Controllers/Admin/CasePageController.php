<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use App\Http\Requests\CasepageRequest;
use App\Models\CasePage;
use App\Models\Changetype;
use App\Models\Reason;
use App\Models\Call;

class CasePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $case_pages = CasePage::paginate(15);
        return view('admin.pages.case_pages.index', compact('case_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Changetype $changetype, Reason $reason)
    {
        $option_void = ['' => 'Selecione'];
        $changes_type = $option_void + $changetype->combo()->all();
        $reasons = $option_void + $reason->combo()->all();
        $case_action = $option_void + Call::CASE_ACTION;
        $tags_list = array_values(CasePage::TAGS);

        return view(
            'admin.pages.case_pages.create',
            compact('changes_type', 'reasons', 'case_action', 'tags_list')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CasepageRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['slug'] = Str::slug($request->name);
        CasePage::create($data);
        return redirect()->route('admin.case_pages.index')->with('success', 'Página adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  CasePage $case_page
     * @return \Illuminate\Http\Response
     */
    public function show(CasePage $case_page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CasePage $case_page
     * @return \Illuminate\Http\Response
     */
    public function edit(Changetype $changetype, Reason $reason, CasePage $case_page)
    {
        $option_void = ['' => 'Selecione'];
        $changes_type = $option_void + $changetype->combo()->all();
        $reasons = $option_void + $reason->combo()->all();
        $case_action = $option_void + Call::CASE_ACTION;
        $tags_list = array_values(CasePage::TAGS);
        return view(
            'admin.pages.case_pages.edit',
            compact('case_page', 'changes_type', 'reasons', 'case_action', 'tags_list')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CasePage $case_page
     * @return \Illuminate\Http\Response
     */
    public function update(CasepageRequest $request, CasePage $case_page)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['slug'] = Str::slug($request->name);
        $case_page->fill($data);
        $case_page->save();
        return redirect()->route('admin.case_pages.index')->with('success', 'Página atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CasePage $case_page
     * @return \Illuminate\Http\Response
     */
    public function destroy(CasePage $case_page)
    {
        $case_page->delete();
        return redirect()->route('admin.case_pages.index')->with('success', 'Página excluída com sucesso!');
    }
}
