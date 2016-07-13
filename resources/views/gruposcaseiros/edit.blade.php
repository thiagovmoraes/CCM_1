@extends('admin_template')

@section('content')
    {!! Form::model($grupoCaseiro,['method'=>'PATCH', 'route' => ['gruposCaseiros.update', $grupoCaseiro->id]]) !!}

        @include('gruposcaseiros.partials._form',['submit_text'=>'Atualizar'])

    {!! Form::close() !!}
@endsection
