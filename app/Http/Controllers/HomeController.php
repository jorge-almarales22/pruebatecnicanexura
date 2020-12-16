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
        $roles = Role::get();
        return view('home', compact('areas','empleados','roles'));
    }

    public function empleado_store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'genero' => 'required',
            'descripcion' => 'required',
            'roles' => 'required'
        ]);
        $empleado = new Empleado();
        $empleado->nombre = $request->nombre;
        $empleado->email = $request->email;
        $empleado->sexo = $request->genero;
        if($request->boletin != null){
            $empleado->boletin = $request->boletin;
        }
        $empleado->descripcion = $request->descripcion;
        $empleado->area_id = $request->area;
        $empleado->save();
        $empleado->roles()->sync(request()->get('roles'));
        return back()->with('status', 'se guardo correctamente el empleado');
    }

    public function editEmpleado(Empleado $empleado)
    {
        $areas = Area::get();
        $roles = Role::get();
        return view('empleados.edit', compact('empleado', 'areas','roles'));
    }

    public function updateEmpleado(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'genero' => 'required',
            'descripcion' => 'required',
            'roles' => 'required'
        ]);
        $empleado->nombre = $request->nombre;
        $empleado->email = $request->email;
        $empleado->sexo = $request->genero;
        if($request->boletin != null){
            $empleado->boletin = $request->boletin;
        }
        $empleado->descripcion = $request->descripcion;
        $empleado->area_id = $request->area;
        $empleado->save();
        $empleado->roles()->sync(request()->get('roles'));
        return redirect()->route('home')->with('status', 'se ha actualizado correctamente el empleado');
    }

    public function deleteEmpleado(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('home')->with('status', 'se elimino el usuario con exito');
    }

}
