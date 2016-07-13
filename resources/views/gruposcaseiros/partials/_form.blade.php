<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome',null,array('required' => 'required')) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>
