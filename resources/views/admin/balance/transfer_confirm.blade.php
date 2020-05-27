@extends('adminlte::page')

@section('title', 'Sistema de Saldo')


@section('content_header')
<h1>Fazer Transferência (APENAS EM R$)</h1>

<ol class="breadcrumb">
    <li><a href=""> Home</a></li>
    <li><a href=""> Saldo </a></li>
</ol>
@stop

@section('content')
<div class="box">

    <div class="box-body">
        <div class="box-header">
        <h4><strong>Recebedor:</strong> {{$usuario->name}}</h4>    
        <h3>Valor da Transferência</h3>
        <p>Seu saldo atual: R$ {{ number_format($balance->amount, 2, ',','.')}}</p>
        </div>
        @include('admin.includes.alerts')
        <form method="post" action="{{route('transfer.send')}}">
            {!! csrf_field() !!}  

            <input type="hidden" name="usuario_id" value="{{$usuario->id}}"> 
            <div class="form-group">
                <input type="text" name="val" class="form-control" placeholder="Ex: 1000.00" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Transferir</button>
            </div>
        </form>
    </div>
</div>
@stop