@extends('layouts._layout')
@section('links')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('contenido')
    <div class="formulario-center">
        <div class="slider">
            <div class="container">
                {!! Form::open(['route'=>'afiliar.vista','method'=>'POST','files'=>true,'id'=>'formulario','enctype' => 'multipart / form-data']) !!}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-tile md-2 text-muted">COMPLETE TODOS LOS CAMPOS</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fecha_afiliacion"><strong>Fecha Afiliación</strong></label>
                                    {!! Form::date('fecha_afiliacion', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title mb-2 text-muted"><strong>DATOS PERSONALES</strong></h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nombre"><strong>Nombre<label class="importa">*</label></strong></label>
                                            {!! Form::text('nombre',old('nombre'),['class'=>'form-control', 'placeholder'=>'Nombre', 'autocomplete'=>'off']) !!}
                                            {!! $errors->first('nombre','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="apellidopat"><strong>Apellido Paterno<label class="importa">*</label></strong></label>
                                            {!! Form::text('apellidopat',old('apellidopat'),['class'=>'form-control', 'placeholder'=>'Apellido Paterno', 'autocomplete'=>'off']) !!}
                                            {!! $errors->first('apellidopat','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="apellidomat"><strong>Apellido Materno<label class="importa">*</label></strong></label>
                                            {!! Form::text('apellidomat',old('apellidomat'),['class'=>'form-control', 'placeholder'=>'Apellido Materno', 'autocomplete'=>'off']) !!}
                                            {!! $errors->first('apellidomat','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="dni"><strong>Documento de Intentidad<label class="importa">*</label></strong></label>
                                            {!! Form::text('dni',old('dni'),['class'=>'form-control', 'placeholder'=>'NRO DNI', 'autocomplete'=>'off','id'=>'dni']) !!}
                                            {!! $errors->first('dni','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="fechanac"><strong>Fecha Nacimiento<label class="importa">*</label></strong></label>
                                            {!! Form::date('fechanac',old('fechanac'),['class'=>'form-control', 'autocomplete'=>'off','max'=>'2020-01-01']) !!}
                                            {!! $errors->first('fechanac','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="estacivil"><strong>Estado Civil<label class="importa">*</label></strong></label>
                                            {!! Form::select('estacivil',getEstadoCivil(),old('estavicil'),['class'=>'form-control','placeholder'=>'Seleccione Estado Civil']) !!}
                                            {!! $errors->first('estacivil','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="sexo"><strong>Sexo<label class="importa">*</label></strong></label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sexo" id="sexom" value="1">
                                                <label class="form-check-label" for="sexo">Masculino</label>
                                              </div>
                                              <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="sexo" id="sexof" value="2">
                                                <label class="form-check-label" for="sexo">Femenino</label>
                                              </div>
                                              {!! $errors->first('sexo','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="ubigeonac"><strong>Lugar de Nacimiento<label class="importa">*</label></strong></label>
                                            {!! Form::text('ubigeonac',old('ubigeomac'),['class'=>'form-control','placeholder'=>'Lugar de Nacimiento']) !!}
                                            {!! $errors->first('ubigeonac','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="card-title md-2 text-muted"><strong>DOMICILO ACTUAL</strong></h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="region"><strong>Region<label class="importa">*</label></strong></label>
                                            {!! Form::select('region',$region,old('region'),['class'=>'form-control','placeholder'=>'seleccione region','id'=>'region']) !!}
                                            {!! $errors->first('region','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="province"><strong>Provincia<label class="importa">*</label></strong></label>
                                            <select name="province" id="province" data-old="{{ old('province') }}" class="form-control" placeholder="Seleccionar Provincia">
                                                <option value="0">Eleccione Provincia</option>
                                            </select>
                                            {!! $errors->first('province','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                        <div class="from-group">
                                            <label for="district"><strong>Distrito<label class="importa">*</label></strong></label>
                                            <select name="district" id="district" data-old="{{ old('district') }}" class="form-control" placeholder="Seleccionar Distrito">
                                                <option value="0">Eleccione Distrito</option>
                                            </select>
                                            {!! $errors->first('district','<small class="form-text text-danger">:message</small>') !!}
                                        </div><br>
                                        <div class="form-group">
                                            <label for="avenida"><strong>Avenida/Calle/Jirón <label class="importa">*</label></strong></label>
                                            {!! Form::text('avenida',old('avenida'),['class'=>'form-control','placeholder'=>'Avenida/Calle/Jirón']) !!}
                                            {!! $errors->first('avenida','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nro"><strong>Número Dirección<label class="importa">*</label></strong></label>
                                            {!! Form::text('nro',old('nro'),['class'=>'form-control','placeholder'=>'Numero Av.']) !!}
                                            {!! $errors->first('nro','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="sector"><strong>Urbanizacion/Sector/Caserío <label class="importa">*</label></strong></label>
                                            {!! Form::text('sector',old('sector'),['class'=>'form-control','placeholder'=>'Urbanizacion/Sector/Caserío']) !!}
                                            {!! $errors->first('sector','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="phone"><strong>Telefono - Celular <label class="importa">*</label></strong></label>
                                            {!! Form::text('phone',old('phone'),['class'=>'form-control','placeholder'=>'Telefono','id'=>'phone']) !!}
                                            {!! $errors->first('phone','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="correo"><strong>Correo Electrónico <label class="importa">*</label></strong></label>
                                            {!! Form::email('correo',old('correo'),['class'=>'form-control','placeholder'=>'ejemplo@dominio.com','autocomplete'=>'off']) !!}
                                            {!! $errors->first('correo','<small class="form-text text-danger">:message</small>') !!}
                                        </div>

                                        {{-- <div class="form-group">
                                             <!-- Button trigger modal Foto-->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                Cargar Fotografia
                                            </button>
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="photockb"><strong>Seleccional Imagen<label class="importa">*</label></strong></label>
                                            <input type="checkbox" name="photo" id="photockb">
                                            {!! Form::file('photo',['onchange'=>'return validarImage()','id'=>'photo','disabled'=>true]) !!}
                                            {!! $errors->first('photo','<small class="form-text text-danger">:message</small>') !!}
                                        </div>
                                        <div class="form-group">
                                            <div class="photoview" id="photoview">
                                                {{-- vista de la foto --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        {!! Form::submit('Procesar Registro', ['class'=>'btn btn-primary']) !!}
                        <a href="{{ route('index') }}" class="btn btn-danger">Cancelar Registro</a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{-- Modal --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Información</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="importa"><strong>(*)</strong></label> Indica que los campos son obligatorios.
            </div>
            <hr>
            <div class="form-group">
                <p>
                    La fotografía a cargar tiene que ser de las siguientes dimensiones: 
                    <label class="importa"><strong>378 - 508</strong> pixeles.</label> Tamaño pasaporte!
                </p>
            </div>
        </div>
        <!--div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div-->
      </div>
    </div>
  </div>
  {{-- End Modal --}}


@endsection

@section('scripts')
  <script type="text/javascript">
      function validarImage(){
            var archivoInput = document.getElementById('photo');
            var archivoRuta = archivoInput.value;
            var extPermitidas = /(.jpeg|.JPEG|.JPG|.jpg|.png|.PNG)$/i;

            if(!extPermitidas.exec(archivoRuta)){
                alert('Asegurate de haber seleccionado una Imagen');
                archivoInput.value = '';
                return false;
            }else{
                if(archivoInput.files && archivoInput.files[0]){
                    var visor = new FileReader();
                    visor.onload = function(e){
                        document.getElementById('photoview').innerHTML='<embed src="'+e.target.result+'" width="180px" height="200px">';
                    };
                    visor.readAsDataURL(archivoInput.files[0]);
                }
            }
        }

        $(document).ready(function(){
            $('input[type="checkbox"][name="photo"]').change(function() {
                if(this.checked) {
                    $('#exampleModal').modal('show');
                    $('#photo').prop('disabled',false);
                }else{
                    $('#photo').prop('disabled',true);
                }
            });
        });

        $(document).ready(function(){
            //poner en mayusculas todo los campos
            $('input').on('keypress',function(e){
                $input =$(this);
                setTimeout(function(){
                    $input.val($input.val().toUpperCase());
                });
            });
            //validar campo de dni / telefono celular
            $('#dni').attr({ maxLength : 8 });
            $('#phone').attr({maxLength: 9});
        });

        $(document).ready(function(){
            $(document).on('change','#region',function(){
                $.ajax({
                    type:"POST",
                    url:"{{ route('province') }}",
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{"region":$(this).val()},
                    success:function(rta){
                        $('#province').empty();
                        $('#province').append('<option value="0" disable="true" selected="true">Seleccione Provincia</option>');
                        $.each(rta, function(index, value){
                            //console.log(rta);
                            $('#province').append('<option value="'+ index +'">'+ value +'</option>');
                        });
                    }
                });
            });
            $(document).on('change','#province',function(){
                vModal ={
                    "region":$('#region').val(),
                    "province":$(this).val()<1000?"0"+$(this).val():$(this).val()
                };
                console.log(vModal);
                $.ajax({
                    type:"POST",
                    url:"{{ route('distrito') }}",
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:vModal,
                    success:function(rta){
                        $('#district').empty();
                        $('#district').append('<option value="0" disable="true" selected="true">Seleccione Distrito</option>');
                        $.each(rta, function(index, value){
                            //console.log(rta);
                            $('#district').append('<option value="'+ index +'">'+ value +'</option>');
                        });
                    }
                });
            });
        })

  </script>


@endsection
