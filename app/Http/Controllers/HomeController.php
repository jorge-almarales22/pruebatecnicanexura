<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Empleado;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $areas = Area::get();
        $empleados = Empleado::get();
        return view('home', compact('areas','empleados'));
    }

    public function empleado_store(Request $request)
    {
        // return $request;
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'genero' => 'required',
            'descripcion' => 'required',
        ]);
        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->email = $request->email;
        $empleado->sexo = $request->genero;
        $empleado->boletin = 1;
        $empleado->descripcion = $request->descripcion;
        $empleado->area_id = $request->area;
        $empleado->save();
        $rol = new Role();
        $permissions = [
            'rol_profesional' => $request->rol_profesional,
            'rol_gerente' => $request->rol_gerente,
            'rol_auxiliar' => $request->rol_auxiliar,
        ];
        $permissions = json_encode($permissions);
        $rol->nombre = $permissions;
        
        $empleado->roles()->save($rol);
        return back()->with('status', 'se guardo correctamente el empleado');

        
    }

    public function editEmpleado(Empleado $empleado)
    {
        $areas = Area::get();
        // $roles = $empleado->roles;
        // return $roles;
        return view('empleados.edit', compact('empleado', 'areas'));
    }

    public function updateEmpleado(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'genero' => 'required',
            'descripcion' => 'required',
        ]);
        $empleado->nombre = $request->nombre;
        $empleado->email = $request->email;
        $empleado->sexo = $request->genero;
        $empleado->boletin = 1;
        $empleado->descripcion = $request->descripcion;
        $empleado->area_id = $request->area;
        $empleado->save();
        // foreach ($empleado->roles as $role) {
        //     $role->pivot->role_id ;
        // }
        
        $rol = new Role();
        $permissions = [
            'rol_profesional' => $request->rol_profesional,
            'rol_gerente' => $request->rol_gerente,
            'rol_auxiliar' => $request->rol_auxiliar,
        ];
        $permissions = json_encode($permissions);
        $rol->nombre = $permissions;
        
        $empleado->roles()->save($rol);
        return redirect()->route('home')->with('status', 'se ha actualizado correctamente el empleado');
    }

    public function deleteEmpleado(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('home')->with('status', 'se elimino el usuario con exito');
    }

}
