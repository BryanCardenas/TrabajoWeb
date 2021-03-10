<?php

namespace App\Http\Controllers;

use App\Http\Requests\CambioContrasenaRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['login']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('crud.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.usuarios.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $request['password'] = Hash::make($request['password']);
        Usuario::create($request->all());
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('crud.usuarios.editar', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $request['password'] = Hash::make($request['password']);
        $usuario->update($request->all());
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == Auth::user()->id) {
            return back()->withErrors("No te debes eliminar a ti mismo");
        }
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }

    public function login(LoginRequest $request)
    {
        $credenciales = $request->only("email","password");
        if (Auth::attempt($credenciales)) {
            $usuario = Usuario::where("email",$request->email)->first();
            $usuario->marcarLogin();
            return redirect()->route('inicio');
        }else {
            return back()->withErrors("Credenciales erroneas");
        };
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('inicio');
    }

    public function password(CambioContrasenaRequest $request)
    {
        if (Hash::check($request['password-antigua'], Auth::user()->password) ){
            $usuario = Usuario::find(Auth::user()->id);
            $usuario->update(['password' => Hash::make($request['password'])]);
            return redirect()->route('inicio')->withErrors('Contraseña alterada correctamente');
        }else {
            return back()->withErrors("Contraseña actual erronea");
        };
    }
}
