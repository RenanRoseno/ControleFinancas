@extends('adminlte::page')

@section('title', 'Sistema de Saldo')


@section('content_header')
<h1>Fazer Saque (APENAS EM R$)</h1>

<ol class="breadcrumb">
    <li><a href=""> Home</a></li>
    <li><a href=""> Saldo </a></li>
</ol>
@stop

@section('content')
<div class="box">

    <div class="box-body">
        @include('admin.includes.alerts')
        <form method="post" action="{{route('withdrawn.store')}}">
            {!! csrf_field() !!}
            <div class="form-group row">
                <div class="row">

                    <label class="col-sm-2 col-form-label">
                        <h4>&nbsp;&nbsp;&nbsp;Valor do Saque:</h4>
                    </label>
                    <div class="col-sm-2 col-form-label">
                        <input type="text" name="val" class="form-control" placeholder="Ex: 1000.00">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Sacar</button>
            </div>
        </form>
    </div>
</div>
@stop