<?php

namespace App\Http\Controllers\teste;

use App\Util;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TesteController extends Controller
{
    public function index(){
        $mes_id = 9;

        dd(Util::getContasMes($mes_id));
    }
}
