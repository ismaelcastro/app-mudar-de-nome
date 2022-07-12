<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Http\Controllers\Controller;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goals = Goal::orderBy('goal','asc')->paginate(15);
        return view('admin.pages.goals.index', compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.goals.create');
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
        Goal::create($data);
        return redirect()->route('admin.goals.index')->with('success','Adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $goal
     * @return \Illuminate\Http\Response
     */
    public function show(Goal $goal)
    {
        return view('admin.pages.goals.show', compact('goal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $goal
     * @return \Illuminate\Http\Response
     */
    public function edit(Goal $goal)
    {
        return view('admin.pages.goals.edit', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $goal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goal $goal)
    {
        $data = $this->_validate($request);
        $goal->fill($data);
        $goal->save();
        return redirect()->route('admin.goals.index')->with('success','Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $goal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    {
        $goal->delete();
        return redirect()->route('admin.goals.index')->with('success','Excluído com sucesso!');
    }

    protected function _validate(Request $request)
    {
        return $this->validate($request, [
            'goal'  => 'required|max:191',
            'bonus'  => 'required|max:191',
            'color'  => 'nullable'
        ]);
    }
}
