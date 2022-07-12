<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Permission;
use App\Models\Role;
use App\Models\PermissionRole;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $roles = $role->paginate(15);
        return view('admin.pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions_list = $this->_permissionsArray();
        return view('admin.pages.roles.create', compact('permissions_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission_id = $request->permission_id;        
        $data = $this->_validate($request);
        $role = Role::create($data);
        if(is_array($permission_id)){
            foreach ($permission_id as $key => $value) {
                $dataRolePermission = [
                    'permission_id' => $value,
                    'role_id'       => $role->id
                ];
                PermissionRole::create($dataRolePermission);
            }
        }
        return redirect()->route('admin.roles.index')->with('success','Funções adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = $role->permissions()->get();
        return view('admin.pages.roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions_list = $this->_permissionsArray();
        $permissions = $role->permissions()->get();
        $permissions_id = [];
        foreach ($permissions as $permission) {
            array_push($permissions_id, $permission->id);
        }
        $role->permission_id = $permissions_id;
        return view('admin.pages.roles.edit', compact('role', 'permissions_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $permission_id = $request->permission_id;
        $data = $this->_validate($request);
        $role->fill($data);
        $role->save();


        PermissionRole::where('role_id', $role->id)->delete();

        if(is_array($permission_id)){
            foreach ($permission_id as $key => $value) {
                $dataRolePermission = [
                    'permission_id' => $value,
                    'role_id'       => $role->id
                ];
                PermissionRole::create($dataRolePermission);
            }
        }
        return redirect()->route('admin.roles.index')->with('success','Função atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success','Função excluída com sucesso!');
    }

    protected function _validate(Request $request)
    {
        return $this->validate($request, [
            'name'  => 'required|max:191',
            'label' => 'required|max:191'
        ]);
    }

    protected function _permissionsArray()
    {       
        $permission = Permission::all()->pluck('label', 'id');
        return $permission->all();
    }
}
