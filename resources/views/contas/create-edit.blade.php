@extends('template.template')

@section('content')

    @if(isset($conta))
        <form class="form-horizontal" method="post" action="{{route('contas.update',$conta->id)}}">
            {!! method_field('PUT') !!}
    @else
        <form class="form-horizontal" method="post" action="{{route('contas.store')}}">
    @endif
        <fieldset>
            <!-- Form Name -->
            <legend>Form Name</legend>

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <!-- Text input-->
            <div class="form-group {{$errors->has('nome') ? 'has-error' : ''}}">
                <label class="col-md-4 control-label" for="nome">Nome:</label>
                <div class="col-md-6">
                    <input id="nome" name="nome" type="text" placeholder="NOME" class="form-control input-md" required="" value="{{$conta->nome or old('nome')}}" >
                    @if($errors->has('nome'))
                            <p class ="help-block">{{$errors->first('nome')}}</p>
                    @endif
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group {{$errors->has('valor')? 'has-error': ''}}">
                <label class="col-md-4 control-label" for="valor">Valor</label>
                <div class="col-md-2">
                    <input id="valor" name="valor" type="text" placeholder="VALOR" class="form-control input-md" required="" value="{{$conta->valor or old('valor')}}">
                    @if($errors->has('valor'))
                        <p class="help-block">{{$errors->first('valor')}}</p>
                    @endif
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group {{$errors->has('mes_id')? 'has-error': ''}}">
                <label class="col-md-4 control-label" for="mes_id">Mes</label>
                <div class="col-md-4">
                    <select id="mes_id" name="mes_id" class="form-control">
                        @foreach($meses as $m)
                            <option value="{{$m->id}}">{{$m->nome}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('mes_id'))
                        <p class ="help-block">{{$errors->first('mes_id')}}</p>
                    @endif
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group {{$errors->has('vencimento')?'has-error' : ''}}">
                <label class="col-md-4 control-label" for="vencimento">Vencimento</label>
                <div class="col-md-4">
                    <input id="vencimento" name="vencimento" type="date" placeholder="Vencimento" class="form-control input-md" required="" value="{{$conta->vencimento or old('vencimento')}}">
                    <span class="help-block">ex: 22/10/2017</span>
                    @if($errors->has('vencimento'))
                        <p class="help-block">{{$errors->first('vencimento')}}</p>
                    @endif
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="btn-enviar"></label>
                <div class="col-md-4">
                    <button id="btn-enviar" name="btn-enviar" class="btn btn-primary">Enviar</button>
                </div>
            </div>

        </fieldset>
    </form>

@endsection