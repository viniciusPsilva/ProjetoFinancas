<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = ['nome','mes_id','valor','vencimento','status'];

    //uma conte tem um mes
    public function mes(){
        return $this->belongsTo('App\models\Mes');
    }
}
