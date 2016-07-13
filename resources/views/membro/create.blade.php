@extends('admin_template')

@section('content')

    {!! Form::model(new App\Membro(), ['route' => 'membro.store']) !!}
        @include('membro.partials._form',['submit_text' => 'Incluir'])
    {!! Form::close() !!}

@endsection