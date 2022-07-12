<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Help;
use App\Models\Role;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Help $help)
    {
        $pages = Help::PAGES;
        return view('admin.pages.help.index', compact('pages','help'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Help::PAGES;
        return view('admin.pages.help.create', compact('pages'));
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
        $help = Help::create($data);
        session(['last_task_list' => $help->id]);
        return redirect()->back()->with('success','Lista adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $Help
     * @return \Illuminate\Http\Response
     */
    public function show(Help $help)
    {
        return view('admin.pages.help.show', compact('task_list'));
    }

    public function update_order(Request $request)
    {
        foreach($request->order as $id=>$order){
            Help::where('id',$id)->update(['order'=>$order]);
        }
        return redirect()->back()->with('success','Ordem atualizada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $help
     * @return \Illuminate\Http\Response
     */
    public function edit(Help $help)
    {
        $pages = Help::PAGES;
        return view('admin.pages.help.edit', compact('pages', 'help'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $help
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Help $help)
    {
        $data = $this->_validate($request);
        $help->fill($data);
        $help->save();
        return redirect()->back()->with('success','Atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $help
     * @return \Illuminate\Http\Response
     */
    public function destroy(Help $help)
    {
        $help->delete();
        return redirect()->route('admin.help.index')->with('success','Excluído com sucesso!');
    }

    public function box(Help $help)
    {
        $arrayVoid = ['' => 'Selecione'];
        $help = $arrayVoid+$help->combo()->all();
        $last_task_list = ( session()->has('last_task_list') ? session()->get('last_task_list') : null );
        return view('admin.help.box', compact('task_list', 'last_task_list'));
    }

    protected function _validate(Request $request)
    {
        return $this->validate($request, [
            'name'  => 'required|max:191',
            'pages' => 'nullable',
            'description' => 'nullable'
        ]);        
    }
}
