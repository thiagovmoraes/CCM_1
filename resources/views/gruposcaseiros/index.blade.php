@extends('admin_template')

@section('content')
    @if (Session::has('mensagem'))
        <div class="flash alert-info">
            <p>{{ Session::get('mensagem') }}</p>
        </div>
    @endif

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Grupos Caseiros</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="membros1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nome </th>
                    <th></th>
                </tr>
                </thead> <!--cabeçalho -->
                <tbody>
                    @if($gruposcaseiros->count())
                        @foreach($gruposcaseiros as $grupoCaseiro)
                            <tr> <!--linhas e colunas-->
                                {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('gruposCaseiros.destroy', $grupoCaseiro))) !!}
                                <td style="width: 350px">{{{ $grupoCaseiro->nome }}} </td>
                                <td style="width: 140px">{!! link_to_route('gruposCaseiros.edit','Editar', array($grupoCaseiro),array('class' => 'btn btn-info')) !!}  {!! Form::submit('Excluir', array('class' => 'btn btn-danger')) !!}</td>
                                {!! Form::close() !!}
                            </tr>
                        @endforeach
                    @else
                        <tr>Nenhum grupo caseiro encontrado.</tr>
                    @endif
                </tbody>
                <tfoot>
                <tr>
                    <th>Nome</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
            <a href="gruposCaseiros/create" class="btn btn-default pull-left"><i class="fa fa-plus"></i> Incluir</a>
        </div>

    </div>

@endsection