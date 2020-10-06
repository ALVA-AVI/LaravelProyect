<div class="form-group">
    {!! Form::label('name','Tema ó Consulta') !!}
    {!! Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'Tema a brindar']) !!}
    {!! $errors->first('name','<small class="form-text text-danger">:message</small>') !!}
</div>