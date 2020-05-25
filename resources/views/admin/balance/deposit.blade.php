@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>Fazer Depósito (APENAS EM R$)</h1>

<ol class="breadcrumb">
    <li><a href=""> Home</a></li>
    <li><a href=""> Saldo </a></li>
</ol>
@stop

@section('content')
<div class="box">

    <div class="box-body">
        <form method="post" action="{{route('deposit.store')}}">
        {!! csrf_field() !!}
        <div class="form-group row">
                <div class="row">
                 
                <label class="col-sm-2 col-form-label">
                        <h4>&nbsp;&nbsp;&nbsp;Valor do Depósito:</h4>
                    </label>
                    <div class="col-sm-2 col-form-label" >
                        <input type="text" name="val" class="form-control" placeholder="Ex: 1.000,00">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Depositar</button>
            </div>
        </form>
    </div>
</div>
@stop