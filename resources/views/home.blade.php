@extends('template.template')

@section('content')
<div class="container">
    <div class="row">

        <!-- Home logOff-->
        <div class="col-md-12 ">
            <h1>Calendário</h1>
        </div>

        <!-- Home user login-->


            <!-- Exibe todos os meses do usuário -->
            @if(isset($meses))
            <div class="row">
                @if(isset($meses))
                @foreach($meses as $m)

                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading text-center"><a href="{{route('mes.show',$m->id)}}">{{$m->nome}}</a></div>
                                <div class="panel-body">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li role="presentation" class="active"><a href="{{route('mes.show',$m->id)}}">contas <span class="badge">{{\App\Util::getQtdContas($m->id)}}</span></a></li>
                                        <li role="presentation"><a href="{{route('mes.show',$m->id)}}">Valor a Pagar <span class="badge">{{\App\Util::getTotalMes($m->id)}}</span></a></li>

                                    </ul>
                                </div>

                            </div>
                        </div>
                @endforeach
                @endif
            </div>
            @endif
    </div>
</div>
@endsection
