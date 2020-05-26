@extends('adminlte::page')

@section('title', 'Sistema de Saldo')


@section('content_header')
<h1>Saldo</h1>

<ol class="breadcrumb">
  <li><a href=""> Home</a></li>
  <li><a href=""> Saldo </a></li>
</ol>
@stop

@section('content')
<div class="box">
  <div class="box-header">
    <a class="btn btn-primary" href="{{ route('balance.deposit')}}"><i class="fas fa-plus"></i>&nbsp;Depositar </a>
    @if ($amount > 0)
      <a class="btn btn-danger" href="{{ route('balance.withdrawn')}}"> <i class="fas fa-minus"></i>&nbsp;Sacar</a>
    @endif
  </div>
  <div class="box-body">
    @include('admin.includes.alerts')
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>R$ {{ number_format($amount, 2, ',','.')}}</h3>

      </div>
      <div class="icon">
        <i class="ion ion-cash"></i>
      </div>
      <a href="#" class="small-box-footer">Histórico<i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
@stop