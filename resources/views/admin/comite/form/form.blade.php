<div class="form-group">
    <div class="row">
        <div class="col">
            {!! Form::label('titulo','Titulo de Comite *') !!}
            {!! Form::text('titulo',old('titulo'),['class'=>'form-control','placeholder'=>'Titulo de Comite','autocomplete'=>'off']) !!}
            {!! $errors->first('titulo','<small class="form-text text-danger">:message</small>') !!}
        </div>
        <div class="col">
            {!! Form::label('departament_id','Región ó Departamento *') !!}
            {!! Form::select('departament_id',$departaments,old('departament_id'),['class'=>'form-control','placeholder'=>'Seleccione Region']) !!}
            {!! $errors->first('departament_id','<small class="form-text text-danger">:message</small>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            {!! Form::label('province_id','Provincia') !!} <small>(Opcional)</small>
            <select name="province_id" id="province_id" data-old="{{ old('province_id') }}" class="form-control" placeholder="Seleccionar Provincia"></select>
            {!! $errors->first('province_id','<small class="form-text text-danger">:message</small>') !!}
        </div>
        <div class="col">
            {!! Form::label('district_id','Distrito') !!} <small>(Opcional)</small>
            <select name="district_id" id="district_id" data-old="{{ old('district_id') }}" class="form-control" placeholder="Seleccionar Provincia"></select>
            {!! $errors->first('district_id','<small class="form-text text-danger">:message</small>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            {!! Form::label('descripcion','Descripcion brebe *') !!}
            {!! Form::textarea('descripcion',null,['id'=>'descripcion','rows'=>'2','class'=>'form-control']) !!}
            {!! $errors->first('descripcion','<small class="form-text text-danger">:message</small>') !!}
        </div>
        <div class="col">
            {!! Form::label('archivo','Seleccione Archivo .PDF') !!}
            <div class="custom-file" id="cont-image">
                {!! Form::file('archivo',['class'=>'custom-file-input','onchange'=>'return validarImage()','id'=>'archivo']) !!}
                <label class="custom-file-label" for="archivo">Seleccione Archivo</label>
                {!! $errors->first('archivo','<small class="form-text text-danger">:message</small>') !!}
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col col-lg-4">
            {!! Form::label('fecha','Seleccione una Fecha *') !!}
            {!! Form::date('fecha', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            {!! $errors->first('fecha','<small class="form-text text-danger">:message</small>') !!}
        </div>
    </div>
</div>