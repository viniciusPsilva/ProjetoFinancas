@extends('template.template')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{$conta->nome}}</div>
        <div class="panel-body">
            <p>Valor : {{$conta->valor}}</p>
            <p>Vencimento: {{$conta->vencimento}}</p>
        </div>
    </div>

    <form method="post" action="{{route('contas.destroy',$conta->id)}}">
        {!! method_field('DELETE') !!}
        {!! csrf_field() !!}
        <button class="btn btn-danger">Deletar conta de {{$conta->nome}}</button>
    </form>
@endsection