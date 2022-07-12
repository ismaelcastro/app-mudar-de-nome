<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\ReasonRequest;
use App\Http\Controllers\Controller;

use App\Models\Reason;

class ReasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Reason $reason)
    {
        $reasons = $reason->paginate(15);
        return view('admin.pages.reasons.index', compact('reasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('admin.pages.reasons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReasonRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        Reason::create($data);
        return redirect()->route('admin.reasons.index')->with('success','Motivo adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $reason
     * @return \Illuminate\Http\Response
     */
    public function show(Reason $reason)
    {
        return view('admin.pages.reasons.show', compact('reason'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $reason
     * @return \Illuminate\Http\Response
     */
    public function edit(Reason $reason)
    {
        $reason->tags = explode(',', $reason->tags);
        return view('admin.pages.reasons.edit', compact('reason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $reason
     * @return \Illuminate\Http\Response
     */
    public function update(ReasonRequest $request, Reason $reason)
    {
        $data = $request->only(array_keys($request->rules()));        
        $reason->fill($data);
        $reason->save();
        return redirect()->route('admin.reasons.index')->with('success','Motivo atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reason $reason)
    {
        $reason->delete();
        return redirect()->route('admin.reasons.index')->with('success','Motivo excluído com sucesso!');
    }    

}
