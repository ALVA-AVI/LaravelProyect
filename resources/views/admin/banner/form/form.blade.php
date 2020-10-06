
<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('titulo','Titulo *') !!}
            {!! Form::text('titulo',old('titulo'),['class'=>'form-control','placeholder'=>'Ingrese un Título','maxlength'=>'20']) !!}
            {!! $errors->first('titulo','<small class="form-text text-danger">:message</small>') !!}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('category_id','Categoria *') !!}
            {!! Form::select('category_id',$category,old('category'),['class'=>'form-control','placeholder'=>'Seleccione Categoría...']) !!}
            {!! $errors->first('category_id','<small class="form-text text-danger">:message</small>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('resena','Reseña ') !!}
            {!! Form::textarea('resena',old('resena'),['id'=>'resena','rows'=>'4','class'=>'form-control']) !!}
            {!! $errors->first('resena','<small class="form-text text-danger">:message</small>') !!}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('linkref','Agregar Referencias') !!} 
            {!! Form::text('linkref',old('linkref'),['class'=>'form-control','placeholder'=>'http://ejemplo.org.pe - Tema']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::file('image',['onchange'=>'validarImage();','id'=>'image']) !!}
</div>
<div class="col-lg-12">
    <div id="visorArchivo">
        @if (request()->routeis('banners.edit'))
        <img src="{{ $carrusel->image->url }}" alt="" class="rounded">                  
        @endif
    </div>
</div>


@section('scripts')
<script>
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
                    document.getElementById('visorArchivo').innerHTML='<embed src="'+e.target.result+'">';
                };
                visor.readAsDataURL(archivoInput.files[0]);
            }
        }
    }
</script>
@endsection
