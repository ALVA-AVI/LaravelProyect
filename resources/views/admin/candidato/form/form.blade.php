<div class="form-group">
    <div class="row">
        <div class="col">
            {!! Form::label('titulo','Titulo *') !!}
            {!! Form::text('titulo',old('titulo'),['class'=>'form-control','placeholder'=>'Titulo','autocomplete'=>'off']) !!}
            {!! $errors->first('titulo','<small class="form-text text-danger">:message</small>') !!}
        </div>
        <div class="col">
            {!! Form::label('departament_id','Zona *') !!}
            {!! Form::text('departament_id',old('departament_id'),['class'=>'form-control','placeholder'=>'Zona','autocomplete'=>'off']) !!}
           {{-- !!Form::select('departament_id',$departaments,old('departament_id'),['class'=>'form-control','placeholder'=>'SeleccioneRegion'])!! --}}
            {!! $errors->first('departament_id','<small class="form-text text-danger">:message</small>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            {!! Form::label('descripcion','Descripción breve *') !!}
            {!! Form::textarea('descripcion',null,['id'=>'descripcion','rows'=>'2','class'=>'form-control','placeholder'=>'describa una brebe reseña.']) !!}
            {!! $errors->first('descripcion','<small class="form-text text-danger">:message</small>') !!}
        </div>
        <div class="col">
            {!! Form::label('archivo','Seleccione Archivo .PDF') !!}
            <div class="custom-file" id="cont-image">
                {!! Form::file('archivo',['class'=>'custom-file-input','onchange'=>'return validarDocumento()','id'=>'archivo']) !!}
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
        <div class="col">
            <div id="visorPdf">

            </div>
        </div>
    </div>
</div>
