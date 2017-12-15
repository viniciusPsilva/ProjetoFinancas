@extends('template.template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Mês</div>
        <div class="panel-body">
            <p>Nome: {{$mes->nome}}</p>
            <p>Criado em: {{$mes->created_at}}</p>
            <p>Quantidade de contas: {{\App\Util::getQtdContas($mes->id )}}</p>
            <p>Valor total contas: R$: {{\App\Util::getTotalMes($mes->id)}}</p>
        </div>
    </div>
    <div class="mrg-btn-10"><a href="{{route('contas.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> &nbsp; Adicionar Conta</a>
    <div class="panel panel-default">
        <div class="panel-heading">Mês</div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>Conta</td>
                        <td>Valor</td>
                        <td>vancimento</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contas as $c)
                       <tr>
                           <td>{{$c->nome}}</td>
                           <td>R$:{{$c->valor}}</td>
                           <td>{{$c->vencimento}}</td>
                           <td>
                               <a href="{{route('contas.edit',$c->id)}}"><span class="glyphicon glyphicon-edit btn-table-edit"></span></a>
                               <a href="{{route('contas.show',$c->id)}}"><span class="glyphicon glyphicon-eye-open btn-table-show"></span></a>
                           </td>

                       </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <form method="Post" action="{{route('mes.destroy',$mes->id)}}">
        {!! method_field('DELETE') !!}
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button class="btn btn-danger" type="submit">Deletar {{$mes->nome}}</button>
    </form>



@endSection