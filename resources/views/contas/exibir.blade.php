@extends('template.template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{$conta->nome}}</div>
        <div class="panel-body">
            <p>Valor : {{$conta->valor}}</p>
            <p>Vencimento: {{$conta->vencimento}}</p>
            <p>Status: 
                <b 
                     @if($conta->status == "Pagar")
                        class = "text-danger" 
                    @else
                        class="text-success" 
                    @endif> 
                        {{$conta->status}}
                </b>
            </p>
        </div>
    </div>

<div  class="form-container">
<form class="horizontal-form-acoes-contas" method="post" action="{{route('pagarConta',$conta->id)}}">
        {!! csrf_field() !!}
        <button class="btn btn-success">Pagar conta {{$conta->nome}}</button>
    </form>
    <form class="horizontal-form-acoes-contas" method="post" action="{{route('contas.destroy',$conta->id)}}">
        {!! method_field('DELETE') !!}
        {!! csrf_field() !!}
        <button class="btn btn-danger">Deletar conta {{$conta->nome}}</button>
    </form>
    
<div>    
@endsection