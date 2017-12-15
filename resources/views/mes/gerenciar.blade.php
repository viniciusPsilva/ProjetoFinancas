@extends('template.template')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Gerenciar Mês</div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Ações</td>
                    </tr>
                    </thead>
                    <tbody>
                    @forEach($meses as $m)
                        <tr>
                            <td>{{$m->nome}}</td>
                            <td>
                                <a href="{{route('mes.edit',$m->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="{{route('mes.show',$m->id)}}"><span class="glyphicon glyphicon-eye-open"></span></a>

                            </td>
                        </tr>
                    @endForEach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection