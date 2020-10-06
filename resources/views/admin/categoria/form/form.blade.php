<div class="form-group">
    {!! Form::label('name','Nombre *') !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Categoría...','autocomplete'=>'off']) !!}
    {!! $errors->first('name','<small class="form-text text-danger">:message</small>') !!}
</div>
<div class="form-group">
    {!! Form::label('module','Modulo *') !!}
    {!! Form::select('module', getModulesArray(),null,['class'=>'form-control','placeholder'=>'Seleccione...'])!!}
    {!! $errors->first('module','<small class="form-text text-danger">:message</small>') !!}
</div>


