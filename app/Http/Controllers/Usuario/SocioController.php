<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuario\Socio\RqActualizar;
use App\Http\Requests\Usuario\Socio\RqGuardar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;
class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array('socios' => User::role('Socio')->get() );
        return view('usuario.socio.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('numero_cuenta_siguente' => User::NumeroCuentaSiguente() );
        return view('usuario.socio.crear',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RqGuardar $request)
    {
        try {
            DB::beginTransaction();
            $user=User::create($request->all());
            $user->assignRole('Socio');
            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                $path = Storage::putFileAs(
                    'public/usuarios', $request->file('foto'), $user->id.'.'.$request->file('foto')->getClientOriginalExtension()
                );
                $user->foto=$path;
                $user->save();
            }
            DB::commit();
            return redirect()->route('socio.index');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('socio.create');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findOrFail($id);
        $data = array('socio' => $user );;
        return view('usuario.socio.detalle',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $data = array('socio' => $user );
        return view('usuario.socio.editar',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RqActualizar $request, $id)
    {
        $user=User::findOrFail($id);
        $this->authorize('update', $user);
        try {
            DB::beginTransaction();
            $user->fill($request->all())->save();
            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                Storage::delete($user->foto);
                $path = Storage::putFileAs(
                    'public/usuarios', $request->file('foto'), $user->id.'.'.$request->file('foto')->getClientOriginalExtension()
                );
                $user->foto=$path;
                $user->save();
            }
            DB::commit();
            return redirect()->route('socio.index')->with('success','Usuario actualizado');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('danger','Ocurrio un error, vuelva intentar o consulte con administrador'.$th->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $user=User::findOrFail($id);
        $this->authorize('delete', $user);
        try {
            DB::beginTransaction();
            
            $user->delete();
            Storage::delete($user->foto);
            DB::commit();
            return redirect()->route('socio.index')->with('success','Usuario eliminado');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('danger','NO se puede eliminar ya que contiene información relacionada, vuelva intentar o consulte con administrador'.$th->getMessage());
            
        }
    }
}
