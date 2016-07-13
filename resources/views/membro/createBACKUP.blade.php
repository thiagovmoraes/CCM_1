@extends('admin_template')

@section('content')
    <form action="{!!URL::route('membro.store')!!}" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" placeholder="Informe o nome" required>
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Informe o email" required>
        <label for="sexo">Sexo:</label>
        <select name="sexo">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>

        <label for="rg">RG</label>
        <input type="text" name="rg">

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" data-inputmask='"mask": "999.999.999-99"' data-mask>

        <label for="estadoCivil">Estado Civil</label>
        <select name="estadoCivil">
            <option value="So">Solteiro</option>
            <option value="Ca">Casado</option>
            <option value="Se">Separado</option>
            <option value="Di">Divorciado</option>
            <option value="Vi">Viúvo</option>
        </select>
        <!-- Logradouro -->
        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" placeholder="endereço com o número">
        <label for="cidade">Cidade</label>
        <input type="text" name="cidade">
        <label for="complemento">Complemento</label>
        <input type="text" name="complemento">
        <label for="cep">CEP</label>
        <input type="text" name="cep" data-inputmask='"mask": "99.999.-999"' data-mask>

        <!--Logradouro-->
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone">
        <label for="celular">Celular</label>
        <input type="text" name="celular">


        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
        </div>

        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <input type="submit">
    </form>
@endsection