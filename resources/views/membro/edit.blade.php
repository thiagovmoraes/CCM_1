@extends('admin_template')

@section('content')
    {!! Form::model($membro,['method'=>'PATCH', 'route' => ['membro.update', $membro->id]]) !!}

        @include('membro.partials._form',['submit_text'=>'Atualizar'])

    {!! Form::close() !!}
@endsection
