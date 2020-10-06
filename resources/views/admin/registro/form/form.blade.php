<div class="form-group">
    {!! Form::label('titulo','Titulo de Publicación *') !!}
    {!! Form::text('titulo',old('titulo'),['class'=>'form-control','placeholder'=>'Titulo de Publicación...','autocomplete'=>'off']) !!}
    {!! $errors->first('titulo','<small class="form-text text-danger">:message</small>') !!}
</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            {!! Form::label('category_id','Tipo de Publicación *') !!}
            {!! Form::select('category_id',$categorias,old('category_id'),['class'=>'form-control','placeholder'=>'Seleccione...']) !!}
            {!! $errors->first('category_id','<small class="form-text text-danger">:message</small>') !!}
        </div>
        <div class="col">
            {!! Form::label('fecha','Fecha de Evento*') !!}
            {!! Form::date('fecha', old('fecha'),['class'=>'form-control']) !!}
            {!! $errors->first('fecha','<small class="form-text text-danger">:message</small>') !!}
        </div>
    </div>
</div>
<div class="form-group sr-only">
    {!! Form::label('iso','Iso') !!}
    {!! Form::text('iso',old('iso'),['class'=>'form-control','readonly'=>'true']) !!}
    {!! $errors->first('iso','<small class="form-text text-danger">:message</small>') !!}
</div>
<div class="form-group">
    {!! Form::label('resumen','Resumen de información *') !!}
    {!! Form::textarea('resumen',null,['id'=>'resumen','rows'=>'2','class'=>'form-control']) !!}
    {!! $errors->first('resumen','<small class="form-text text-danger">:message</small>') !!}
</div>
<div class="form-group">
    {!! Form::label('contexto','Contexto ó Información') !!}
    {!! Form::textarea('contexto',null,['id'=>'contexto','rows'=>'3','class'=>'form-control']) !!}
    {!! $errors->first('contexto','<small class="form-text text-danger">:message</small>') !!}
</div>

<div class="form-group">

</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            <!--label for="image">File input</label-->  
            <div class="custom-file" id="cont-image">
                {!! Form::file('image',['class'=>'custom-file-input','onchange'=>'return validarImage()','id'=>'image']) !!}
                <!--input type="file" name="image" class="custom-file-input" id="image" onchange="return validarImage()"-->
                <label class="custom-file-label" for="image">Seleccione Imagen</label>
                {!! $errors->first('image','<small class="form-text text-danger">:message</small>') !!}
            </div>
        </div>
        <div class="col">
            <div id="visorArchivo">

            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col"><div class="custom-file" id="cont-image">
            {!! Form::file('archivo',['class'=>'custom-file-input','onchange'=>'return validarDocumento()','id'=>'archivo']) !!}
            <label class="custom-file-label" for="archivo">Seleccione Archivo PDF</label>
            {!! $errors->first('archivo','<small class="form-text text-danger">:message</small>') !!}
        </div></div>
        <div class="col">
            <div id="visorPdf">

            </div>
        </div>
    </div>
</div>
 
  

  @section('scripts')
  <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
  <script type="text/javascript">
        //CKEDITOR.replace('contexto');
        CKEDITOR.replace('contexto');
  </script>

    <script type="text/javascript">
        function validarImage(){
            var archivoInput = document.getElementById('image');
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
                        document.getElementById('visorArchivo').innerHTML='<embed src="'+e.target.result+'" width="400" height="200">';
                    };
                    visor.readAsDataURL(archivoInput.files[0]);
                }
            }
        }
        function validarDocumento(){
            var archivoInput = document.getElementById('archivo');
            var archivoRuta = archivoInput.value;
            var extPermitidas = /(.pdf|.PDF)$/i;
            if(!extPermitidas.exec(archivoRuta)){
                alert('Asegurate de haber seleccionado un Documento PDF');
                archivoInput.value = '';
                return false;
            }else{
                if(archivoInput.files && archivoInput.files[0]){
                    var visor = new FileReader();
                    visor.onload = function(e){
                        document.getElementById('visorPdf').innerHTML='<embed src="'+e.target.result+'" width="500" height="300">';
                    };
                    visor.readAsDataURL(archivoInput.files[0]);
                }
            }
        }
    /*$(document).on('change', '#category_id', function(event) {
        console.log($("#category_id option:selected").val());
    });*/

    $(document).on('change','#category_id',function(event){
        $('#iso').val($('#titulo').val().substr(0,4).toUpperCase()+'-'+$("#category_id option:selected").text().charAt(1).toUpperCase())
    });
    </script>
  @endsection