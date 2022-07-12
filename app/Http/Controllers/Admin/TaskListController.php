<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\TaskList;
use App\Models\Role;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task_lists = TaskList::paginate(15);
        return view('admin.pages.task_lists.index', compact('task_lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles_list = Role::all()->pluck('label', 'id')->all();
        return view('admin.pages.task_lists.create', compact('roles_list'));
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
        $task_list = TaskList::create($data);
        session(['last_task_list' => $task_list->id]);
        return redirect()->back()->with('success','Lista adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $taskList
     * @return \Illuminate\Http\Response
     */
    public function show(TaskList $task_list)
    {
        return view('admin.pages.task_lists.show', compact('task_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $task_list
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskList $task_list)
    {
        $roles_list = Role::all()->pluck('label', 'id')->all();
        return view('admin.pages.task_lists.edit', compact('task_list', 'roles_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $task_list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskList $task_list)
    {
        $data = $this->_validate($request);
        $task_list->fill($data);
        $task_list->save();
        return redirect()->back()->with('success','Lista atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $task_list
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskList $task_list)
    {
        $user->delete();
        return redirect()->route('admin.task_lists.index')->with('success','Lista excluída com sucesso!');
    }

    public function box(TaskList $task_list)
    {
        $arrayVoid = ['' => 'Selecione'];
        $task_list = $arrayVoid+$task_list->combo()->all();
        $last_task_list = ( session()->has('last_task_list') ? session()->get('last_task_list') : null );
        return view('admin.task_lists.box', compact('task_list', 'last_task_list'));
    }

    protected function _validate(Request $request)
    {
        return $this->validate($request, [
            'name'  => 'required|max:191',
            'roles' => 'nullable'
        ]);        
    }
}
