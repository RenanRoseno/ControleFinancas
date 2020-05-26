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
            <h3>Nome do Recebedor</h3>
        </div>
        @include('admin.includes.alerts')
        <form method="post" action="{{route('transfer.store')}}">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="text" name="recebedorInfo" class="form-control" placeholder="Nome do recebedor">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Próximo&nbsp;<i class="fas fa-angle-double-right"></i></button>
            </div>
        </form>
    </div>
</div>
@stop