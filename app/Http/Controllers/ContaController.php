<?php

namespace App\Http\Controllers;

use App\models\Conta;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContaController extends Controller
{
    private $conta;
    function __construct(Conta $conta)
    {
        $this->conta = $conta;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $meses = Util::getMesToUser();

        return view('contas.create-edit',compact('meses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        $formData['status'] = "Pagar";
        $insert = $this->conta->create($formData);

        $sucessMesage = "Conta adicionada com sucesso!";

        return view('sucess',compact('sucessMesage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conta = $this->conta->find($id);

        return view('contas.exibir', compact('conta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meses = Util::getMesToUser(Auth::user()->id);
        $conta  = $this->conta->find($id);

        return view('contas.create-edit',compact('conta','meses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formData =  $request->all();

        $conta = $this->conta->find($id);

        $conta->update($formData);
        $sucessMesage = "Conta $conta->nome foi alterada com sucesso!";

        return view('sucess',compact('sucessMesage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->conta->find($id)->delete();
        return redirect()->route('gerenciarMes');
    }

    /**
     * Altera o status da conta para Pago 
     */
    public function pagarConta($id){

        $conta = $this->conta->find($id);
        $conta->status = "Pago";

        $conta->update();

        return redirect()->back();
    }

}
