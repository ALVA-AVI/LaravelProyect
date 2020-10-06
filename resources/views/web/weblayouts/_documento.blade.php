<!--div class="row">
    <div class="">
        @for ($i = 0; $i <= 2; $i++)
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/1601057644georgeForsyth.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Titulo</h5>
                  <p class="card-text">Resumen del Contexto</p>
                  <a href="#" class="btn btn-primary">Mas Informacion...</a>
                </div>
            </div>
            <hr>
        </div>
        @endfor
    </div>    
</div-->

<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-interval="10000">
            <a href="">
                <img src="{{ asset('img/2017/04/17634735_1100691943363962_41564090199260033_n-800x550.png') }}" class="d-block w-100" alt="...">
            </a>
        </div>
      @foreach ($files as $row)
          @if ($file->image->url != "" || $file->image->url != null)
                    <div class="carousel-item" data-interval="10000">
                        <a href=""><img src="{{ $row->image->url }}" class="d-block w-100" alt="..."></a>
                        </div>
             
          @endif
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  