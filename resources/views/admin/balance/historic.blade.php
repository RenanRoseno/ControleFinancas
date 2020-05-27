@extends('adminlte::page')

@section('title', 'Sistema de Saldo')


@section('content_header')

<h1>Histórico</h1>

<ol class="breadcrumb">
    <li><a href=""> Home</a></li>
    <li><a href=""> Saldo </a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">

    </div>
    <div class="box-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>VALOR</th>
                    <th>TIPO</th>
                    <th>RECEBEDOR</th>
                    <th>DATA</th>
                </tr>
            </thead>
            <tbody>
                @forelse($historics as $historic)
                <tr>
                    <td>{{ $historic->id}}</td>
                    <td>{{number_format($historic->amount, 2, ',','.')}}</td>
                    <td>{{$historic->type}}</td>
                    <td>{{$historic->user_id_transaction}}</td>
                    <td>{{$historic->date}}</td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop