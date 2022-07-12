<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $request->request->add(['datetime_start' => $request->date_start.' '.$request->time_start ]);
        $request->request->add(['datetime_finish' => $request->date_finish.' '.$request->time_finish ]);
        $data = $this->_validate($request);
        $user = Event::create($data);
        return redirect()->back()->with('message','Evento criado com sucesso!');
    }

    protected function _validate(Request $request)
    {
        return $this->validate($request, [
            'call_id'  => 'required|numeric',
            'name'  => 'required',
            'datetime_start' => 'required|date',
            'datetime_finish'  => 'required|date',
            'users'  => 'required',
            'status'  => 'nullable',
            'alert'  => 'required|numeric',
            'description'  => 'required'
        ]);        
    }
}
