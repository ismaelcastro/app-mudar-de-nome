<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Call;
use Gate;

use App\Models\User;
use App\Models\Role;
use App\Models\RoleUsers;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //if( Gate::denies('view_user') ) 
        //abort(403, 'Not Permissions Lists User');
        
        $users = $user->paginate(15);
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //if( Gate::denies('create_user') ) 
        //abort(403, 'Not Permissions Create User');

        $roles_list = $this->_rolesArray();
        $occupation_area_list = Call::OCCUPATION_AREA;
        return view('admin.pages.users.create', compact('roles_list','occupation_area_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if( Gate::denies('create_user') ) 
        //abort(403, 'Not Permissions Create User');

        $role_id = $request->role_id;
        $data = $this->_validate($request);

        if(!is_null($data['password']))
            $data['password'] = Hash::make($data['password']);

        $data['type'] = 'user';
        $user = User::create($data);

        if(is_array($role_id)){
            foreach ($role_id as $key => $value) {
                $dataRole = [
                    'role_id' => $value,
                    'user_id' => $user->id
                ];
                RoleUsers::create($dataRole);
            }
        }
        return redirect()->route('admin.users.index')->with('success','Usuário adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //if( Gate::denies('view_user') ) 
        //abort(403, 'Not Permissions Show User');

        return view('admin.pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //if( Gate::denies('edit_user') ) 
        //abort(403, 'Not Permissions Edit User');

        $roles_list = $this->_rolesArray();
        $roles = $user->roles()->get();
        $roles_id = [];
        foreach ($roles as $role) {
            array_push($roles_id, $role->id);
        }
        $user->role_id = $roles_id;
        $occupation_area_list = Call::OCCUPATION_AREA;
        unset($user->password);
        return view('admin.pages.users.edit', compact('user','roles_list','occupation_area_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //if( Gate::denies('edit_user') ) 
        //abort(403, 'Not Permissions Edit User');

        $role_id = $request->role_id;
        $data = $this->_validate($request, $user->id);

        if(!is_null($data['password']) && !empty($data['password']) ){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
      
        $data['type'] = 'user';
        $user->fill($data);
        $user->save();

        if(is_array($role_id)){
            RoleUsers::where('user_id', $user->id)->delete();
            foreach ($role_id as $key => $value) {
                $dataRole = [
                    'role_id' => $value,
                    'user_id' => $user->id
                ];
                RoleUsers::create($dataRole);
            }
        }
        return redirect()->back()->with('success','Usuário atualizado com sucesso');
    }

    public function update_image(Request $request, User $user)
    {
        $user->image = $request->image;
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //if( Gate::denies('delete_user') ) 
        //abort(403, 'Not Permissions Delete User');

        $user->delete();
        return redirect()->route('admin.users.index')->with('success','Usuário excluído com sucesso!');
    }

    protected function _validate(Request $request, $id = null)
    {
        if(is_null($id)){
            return $this->validate($request, [
                'name'  => 'required|max:191',
                'email' => "required|string|email|max:191|unique:users",
                'password'  => 'required|min:6|max:14',
                'image'  => 'nullable',
                'occupation_area' => 'nullable'
            ]);
        }else{
            return $this->validate($request, [
                'name'  => 'required|max:191',
                'email' => "required|string|email|max:191|unique:users,email,{$id},id",
                'password'  => 'nullable|min:6|max:14',
                'image'  => 'nullable',
                'occupation_area' => 'nullable'
            ]);
        }        
    }

    protected function _rolesArray()
    {       
        $role = Role::all()->pluck('label', 'id');
        return $role->all();
    }
}
