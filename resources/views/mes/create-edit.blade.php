@extends('template.template')

@section('content')

    <div class="container">
        @if(isset($mes))
            <form class="form-horizontal" method="POST" action="{{route('mes.update',$mes->id)}}">
                {!! method_field('PUT') !!}
        @else
            <form class="form-horizontal" method="POST" action="{{route('mes.store')}}">
        @endif
                <fieldset>

                <!-- Form Name -->
                <legend>{{$title or 'Novo mês'}}</legend>

                <!--CSRF TOKEN input-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <!-- Text input-->
                <div class="form-group {{$errors->has('nome') ? 'has-error' : ''}}">
                    <label class="col-md-4 control-label" for="nome">Nome</label>
                    <div class="col-md-6">
                        <input id="nome" name="nome" type="text" placeholder="NOME" class="form-control input-md" required="" value="{{$mes->nome or old('nome')}}">
                    @if($errors->has('nome'))
                        <p class="help-block">{{$errors->first('nome')}}</p>
                    @endif

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btn-enviar"></label>
                    <div class="col-md-4">
                        <button class="btn btn-primary">Enviar</button>
                    </div>
                </div>

            </fieldset>
        </form>


@endsection