@extends('adminlte::page')

@section('title', 'Sistema de Saldo')

@section('content_header')
<h1>Meu perfil</h1>
@stop

@section('content')
<div class="box">
    <div class="box-body">
        @include('admin.includes.alerts')
        <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                @if(auth()->user()->image != null)
                <img src="{{url('storage/users/'.auth()->user()->image)}}" class="img-thumbnail" style="max-width:200px;max-height:200px;"><br>
                @endif
                <label class="form-label">
                <label class="form-label">
                    <h4>Mudar imagem de perfil</h4>
                </label>
                    <input type="file" class="file" name="image">
                </label>
            </div>
            <div class="form-group">
                <label class="form-label">
                    <h4>Nome</h4>
                </label>
                <input type="text" value=" {{auth()->user()->name}}" class="form-control" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label class="form-label">
                    <h4>Email</h4>
                </label>
                <input type="email" value=" {{auth()->user()->email}}" class="form-control" name="email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label class="form-label">
                    <h4>Senha</h4>
                </label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Atualizar perfil</button>
            </div>
        </form>
    </div>
</div>
@stop