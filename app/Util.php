<?php

namespace App;

use App\models\Conta;
use App\models\Mes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Util
{
    public static function getQtdContas($mes_id){
        $contas = Conta::all()->where('mes_id', $mes_id);
        return count($contas);
    }

    public static function getTotalMes($id_mes){
        $mes = DB::table('mes')->select('mes.*')
            ->join('contas','mes.id','=','contas.mes_id')->where('mes_id',$id_mes)
            ->select(DB::raw('sum(contas.valor)as total_contas'))->value('total_contas');

        return (string)$mes;
    }

    public static function getContasMes($id_mes){
        $contas = DB::table('contas')->select('contas.*')
            ->join('mes','contas.mes_id','=','mes.id')->where('mes.user_id',Auth::user()->id)->where('mes.id',$id_mes)->get();
        return $contas;
    }

    public static function getMesToUser(){

        return $meses = Mes::all()->where('user_id', Auth::user()->id );
    }
}
