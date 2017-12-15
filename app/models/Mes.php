<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    protected $fillable = ['nome', 'user_id','ano'];

    //um mes tem muitas contas
    public function contas(){
        return $this->hasMany(Conta::class);
    }

    //Um mes pertence a um usuario
    public function user(){
        return $this->hasOne(User::class);
    }
}
