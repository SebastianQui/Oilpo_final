<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function index()
    {
        $roles = Role::paginate();

        return view('role.index', compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * $roles->perPage());
    }


    public function guardar(){
        $campos = request()->validate([
            'rol' =>'required',
            'permisos'=> 'required',
        ]);
        Role::create($campos);
        return redirect()->route('roles.index') ->with('success', 'El rol se ha guardado.');
    }

    // public function show($id)
    // {
    //     $roles = Role::find($id);

    //     return view('role.show', compact('roles'));
    // }


    public function editar(Role  $role){
        $campos = request()->validate([
            'rol' =>'required',
            'permisos'=> 'required',
        ]);
        $role->update($campos);
        return redirect()->route('roles.index') ->with('success', ' ');
    }

    public function destroy($id)
    {
        $roles = Role::find($id)->delete();

        return redirect()->route('roles.index')
            ->with('borrado', 'Rol deleted successfully');
    }
}
