
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome',null,array('required' => 'required')) !!}
</div>

<div class="form-group">
    {!!  Form::label('email', 'Email:') !!}
    {!! Form::email('email',null ,array('required' => 'required')) !!}
</div>

<div class="form-group">
    {!! Form::label('sexo', 'Sexo:') !!}
    {!! Form::select('sexo', array('M' => 'Masculino', 'F' => 'Feminino'),null, array('required' => 'required')) !!}
</div>

<div class="form-group">
    {!! Form::label('id_grupo_caseiro', 'Grupo Caseiro:') !!}
    {!! Form::select('id_grupo_caseiro', $gruposCaseiros,null, array('required' => 'required')) !!}
</div>

<div class="form-group">
    {!! Form::label('dtNascimento','Data de Nascimento:') !!}
    {!! Form::date('dtNascimento',null,array('required' => 'required')) !!}
</div>

<div class="form-group">
    {!! Form::label('fonePessoal','Telefone p/ Contato:') !!}
    {!! Form::text('fonePessoal',null) !!}
    {!! Form::label('celPessoal','Celular:') !!}
    {!! Form::text('celPessoal',null) !!}
</div>

<div class="form-group">
    {!! Form::label('cepEndPessoal', 'CEP:') !!}
    {!! Form::text('cepEndPessoal',null,array('required' => 'required','size'=>'10')) !!}
</div>

<div class="form-group">
    {!! Form::label('enderecoPessoal', 'Rua:') !!}
    {!! Form::text('enderecoPessoal',null,array('required' => 'required','size'=>'50')) !!}
    {!! Form::label('enderecoPessoal', 'Bairro:') !!}
    {!! Form::text('enderecoPessoal',null,array('required' => 'required','size'=>'30')) !!}
    {!! Form::label('nrEndPessoal','Nº') !!}
    {!! Form::text('nrEndPessoal',null,array('required' => 'required','type' => 'integer', 'size'=>'5')) !!}
    {!! Form::label('complEndPessoal', 'Complemento:') !!}
    {!! Form::text('complEndPessoal',null) !!}
</div>

<div class="form-group">
    {!! Form::label('cidadeEndPessoal', 'Cidade:') !!}
    {!! Form::text('cidadeEndPessoal',null,array('required' => 'required','size' => '20')) !!}
    {!! Form::label('ufEndPessoal', 'Estado:') !!}
    {!! Form::text('ufEndPessoal',null,array('required' => 'required',
                                    'size' => '2')) !!}
</div>

<div class="form-group">
    {!! Form::label('dataIngresso', 'Data de Ingresso:') !!}
    {!! Form::date('dataIngresso') !!}
</div>


<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>

<!-- Adicionando JQuery -->
<script src="//code.jquery.com/jquery-2.2.2.min.js"></script>

<!-- Adicionando Javascript -->
<script type="text/javascript" >

    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...")
                    $("#bairro").val("...")
                    $("#cidade").val("...")
                    $("#uf").val("...")
                    $("#ibge").val("...")

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });

</script>