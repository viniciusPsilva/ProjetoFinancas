<?php

namespace App\Http\Controllers;

use App\Http\Requests\MesFormRequest;
use App\models\Conta;
use App\models\Mes;
use App\User;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MesController extends Controller
{
    private $mes;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(Mes $mes)
    {
        $this->middleware('auth');
        $this->mes = $mes;
    }

    public function index()
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mes.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MesFormRequest $request)
    {
        $formData = $request->all();
        $formData['user_id'] = Auth::user()->id;
        $formData['ano'] = date('Y');

        $insert = $this->mes->create($formData);

        $insertError = 'Erro ao cadastrar';

        if ($insert) {
            return redirect()->route('home');
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mes = $this->mes->find($id);

        $contas = Util::getContasMes($id);


        return view('mes.exibir', compact('mes','contas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mes = $this->mes->find($id);
        $title = "Editar $mes->nome";
        return view('mes.create-edit',compact('mes','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MesFormRequest $request, $id)
    {
        $mes = $this->mes->find($id);
        $formData = $request->all();

        $update = $mes->update($formData);

        $sucessMesage = "O Mês de $mes->nome foi alterado com sucesso!";

        if ($update){
           return view('sucess',compact('sucessMesage'));
        }else{
            return redirect()->route('mes.create')->whith(['errors'=>"Erro ao Editar $mes->id"]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->mes->find($id)->delete();
        return redirect()->route('gerenciarMes');
    }

    public function gerenciar()
    {
        if (isset(Auth::user()->id)) {
            $meses = Util::getMesToUser($this->mes);
        }
        return view('mes.gerenciar', compact('meses'));

    }
}
