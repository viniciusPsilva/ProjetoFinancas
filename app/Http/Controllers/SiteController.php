<?php

namespace App\Http\Controllers;

use App\models\Mes;
use App\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SiteController extends Controller
{
    private $mes;
    function __construct(Mes $mes)
    {
        $this->mes = $mes;
    }

    public function index(){

        if (isset(Auth::user()->id)){
           $meses = Util::getMesToUser();
        }
        return view('home',compact('meses'));
    }
}
