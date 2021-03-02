<div class="form-group">
    {!! Form::label('tema', 'Tema a Consultar', ['class'=>'sr-only']) !!}
    {!! Form::select('tema', $temas, old('tema'), ['class'=>'form-control','placeholder'=>'Estoy interesado en']) !!}
    {!! $errors->first('tema','<small class="form-text text-danger">:message</small>') !!}
</div>
<div class="form-group">
    {!! Form::label('nombre', 'Nombre', ['class'=>'sr-only']) !!}
    {!! Form::text('nombre', old('nombre'), ['class'=>'form-control','placeholder'=>'Nombre']) !!}
    {!! $errors->first('nombre','<small class="form-text text-danger">:message</small>') !!}
</div>
<div class="form-group">
    {!! Form::label('apellido', 'Apellidos', ['class'=>'sr-only']) !!}
    {!! Form::text('apellido', old('apellido'), ['class'=>'form-control','placeholder'=>'Apellidos']) !!}
    {!! $errors->first('apellido','<small class="form-text text-danger">:message</small>') !!}
</div>
<div class="form-group">
    {!! Form::label('correo', 'Correo electronico', ['class'=>'sr-only']) !!}
    {!! Form::email('correo', old('correo'), ['class'=>'form-control','placeholder'=>'alguien@domino.com']) !!}
    {!! $errors->first('correo','<small class="form-text text-danger">:message</small>') !!}
</div>
<div class="form-group">
    {!! Form::label('contexto', 'Contexto', ['class'=>'sr-only']) !!} 
    {!! Form::textarea('contexto', old('contexto'), ['class'=>'form-control','rows'=>'2','placeholder'=>'Describa su consulta']) !!}
    {!! $errors->first('contexto','<small class="form-text text-danger">:message</small>') !!}
</div>
<div class="form-group">
    {!! Form::label('celular', 'Celular', ['class'=>'sr-only']) !!}
    {!! Form::text('celular', old('celular'), ['class'=>'form-control','placeholder'=>'123456789']) !!}
    {!! $errors->first('celular','<small class="form-text text-danger">:message</small>') !!}
</div>



