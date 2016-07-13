@extends('admin_template')

@section('content')

    {!! Form::model(new App\gruposCaseiros(), ['route' => 'gruposCaseiros.store']) !!}
        @include('gruposcaseiros.partials._form',['submit_text' => 'Incluir'])
    {!! Form::close() !!}

@endsection