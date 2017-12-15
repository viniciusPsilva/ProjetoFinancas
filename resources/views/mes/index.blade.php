@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h1>Calendario</h1>
            </div>
            <!-- Exibe todos os meses do usuário -->
                @if(isset($meses))
                    @foreach($meses as $m)
                        <div class="panel panel-default">
                            <div class="panel-heading">{{$m->nome}}</div>
                            <div class="panel-body">
                                <ul class="nav nav-pills" role="tablist">
                                    <li role="presentation" class="active"><a href="#">contas <span class="badge">{{\App\Util::getQtdContas($m->id)}}</span></a></li>
                                    <li role="presentation"><a href="#">Valor a Pagar <span class="badge">349.34</span></a></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif

        </div>
    </div>
@endsection
