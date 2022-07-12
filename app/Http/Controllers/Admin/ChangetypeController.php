<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Changetype;
use App\Http\Controllers\Controller;

class ChangetypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $changetypes = Changetype::paginate(15);
        return view('admin.pages.changetypes.index', compact('changetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.changetypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->_validate($request);
        Changetype::create($data);
        return redirect()->route('admin.changetypes.index')->with('success','Adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $changetype
     * @return \Illuminate\Http\Response
     */
    public function show(Changetype $changetype)
    {
        return view('admin.pages.changetypes.show', compact('changetype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $changetype
     * @return \Illuminate\Http\Response
     */
    public function edit(Changetype $changetype)
    {
        return view('admin.pages.changetypes.edit', compact('changetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $changetype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Changetype $changetype)
    {
        $data = $this->_validate($request);
        $changetype->fill($data);
        $changetype->save();
        return redirect()->route('admin.changetypes.index')->with('success','Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $changetype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Changetype $changetype)
    {
        $changetype->delete();
        return redirect()->route('admin.changetypes.index')->with('success','Excluído com sucesso!');
    }

    protected function _validate(Request $request)
    {
        return $this->validate($request, [
            'name'  => 'required|max:191'
        ]);
    }
}
