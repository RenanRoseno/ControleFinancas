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
        <form action="{{route('historic.search')}}" method="POST" class="form form-inline">
            {!! csrf_field() !!}
            <input type="text" name="id" class="form-control" placeholder="ID">
            <input type="date" name="date" class="form-control" placeholder="ID">

            <select name="type" class="form-control">
                <option value="">TIPO</option>

                @foreach ($types as $key=>$type)
                    <option value="{{$key}}">{{$type}}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="box-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>VALOR</th>
                    <th>TIPO</th>
                    <th>REMETENTE</th>
                    <th>DATA</th>
                </tr>
            </thead>
            <tbody>
                @forelse($historics as $historic)
                <tr>
                    <td>{{ $historic->id}}</td>
                    <td>R$ {{number_format($historic->amount, 2, ',','.')}}</td>
                    <td>{{$historic->type($historic->type)}}</td>
                    <td>
                        @if($historic->user_id_transaction)
                        {{$historic->userS->name}}
                        @else
                        -
                        @endif
                    </td>


                    <td>{{date("d/m/Y",strtotime($historic->date))}}</td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<center>
    @if(isset($dados))
    {!! $historics->appends($dados)->links() !!}    
    @else
    {!! $historics->links() !!}
    @endif

</center>
@stop