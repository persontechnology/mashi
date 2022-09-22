<?php

namespace App\Http\Controllers;

use App\Http\Requests\Credito\RqStore;
use App\Models\Credito;
use App\Models\PagoRubroCredito;
use App\Models\RubrosCredito;
use App\Models\TipoCredito;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Validation\ValidationException;
class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditos=Credito::latest()->paginate(25);
        $data = array('creditos' => $creditos);
        return view('credito.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'tipo_creditos'=>TipoCredito::get(),
            'usuarios' => User::orderBy('apellidos','asc')->get()
        );
        return view('credito.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RqStore $request)
    {
        $data = $request->all();
        $data['tipo_credito_id']=$request->tipo_credito;
        $data['monto_prestamo']=$request->amount;
        $data['tasa_tae']=$request->rate;
        $data['plazo']=preg_replace('/\D/', '', $request->term);
        $data['termino']=preg_replace('/[0-9]+/', '', $request->term);
        $data['asesor_id']=Auth::user()->id;
        $data['user_id']=$request->socio;
        $credito=Credito::create($data);
        // rubros de credito
        foreach ($request->numero_pago as $np) {
            $rubros_data = array(
                'numero_pago'=>$np,
                'fecha_pago'=>$request->fecha_pago[$np],
                'monto_pago'=>$request->monto_pago[$np],
                'interes_total'=>$request->interes[$np],
                'pago_total'=>$request->pago_total[$np],
                'saldo_capital'=>$request->saldo_capital[$np],
                'credito_id'=>$credito->id,
            );
            RubrosCredito::create($rubros_data);
        }
        
        // request()->session()->flash('success','Credito guardado');
        return redirect()->route('credito.show',$credito->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function show(Credito $credito)
    {
        return view('credito.show',['credito'=>$credito]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function edit(Credito $credito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credito $credito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credito $credito)
    {
        //
    }

    public function pdf($id)
    {

        $options = [
            'orientation'   => 'portrait',
            'header-html'   => view()->make('pdf.header')->render(),
            'footer-html'   => view()->make('pdf.footer')->render()
          ];
          
        $credito=Credito::findOrFail($id);
        $pdf = PDF::loadView('credito.pdf',['credito'=>$credito])->setOptions($options);
        return $pdf->inline('CREDITO-'.$credito->numero.'.pdf');
    }

    public function cobrarRubro($id)
    {
        $rubroCredito=RubrosCredito::find($id);
        $data = array('rubroCredito' => $rubroCredito );
        return view('credito.cobrar-rubro',$data);
    }
    public function guardarCobrarRubro(Request $request)
    {
        $rg_decimal="/^[0-9,]+(\.\d{0,2})?$/";
        $request->validate([
            'valor'=>'required|regex:'.$rg_decimal.'|gt:0',
            'id'=>'required|exists:rubros_creditos,id'
        ]);
        $rubroCredito=RubrosCredito::find($request->id);
        if($request->valor<=$rubroCredito->montoCobrarPagoRubroCreditos()){
            try {
                DB::beginTransaction();
                $pagoRubroredito=new PagoRubroCredito();
                $pagoRubroredito->valor=$request->valor;
                $pagoRubroredito->rubros_creditos_id=$request->id;
                $pagoRubroredito->cajero_id=Auth::id();
                $pagoRubroredito->save();
                DB::commit();
                request()->session()->flash('success','Cobro de '.$request->valor.' realizado exitosamente.');
            } catch (\Throwable $th) {
                request()->session()->flash('info','Ocurrio un error, porfavor vuelva a intentar. O consulte con administrador.'.$th->getMessage());
                DB::rollback();
            }
            
        }else{
            throw ValidationException::withMessages([
                'valor' => ['El valor a cobrar es incorrecto.'],
            ]);
        }
        return redirect()->route('credito.cobrarRubro',$request->id);
    }

    public function pdfCobrarRubro($id)
    {
        $pagoRubroCredito=PagoRubroCredito::find($id);
        $data = array(
            'pagoRubroCredito' => $pagoRubroCredito,
            'rubroCredito'=>$pagoRubroCredito->rubroCredito,
            'credito'=>$pagoRubroCredito->rubroCredito->credito,
            'socio'=>$pagoRubroCredito->rubroCredito->credito->socio
        );
        
        $options = [
            'orientation'   => 'portrait',
            'header-html'   => view()->make('pdf.header')->render(),
            'footer-html'   => view()->make('pdf.footer')->render()
          ];
          
        
        $pdf = PDF::loadView('credito.pdf-cobrar-rubro',$data)->setOptions($options);
        return $pdf->inline('PAGO CREDITO-'.$pagoRubroCredito->rubroCredito->numero_pago.' '.$pagoRubroCredito->rubroCredito->credito->socio->apellidos_nombres.'.pdf');
    }
}
