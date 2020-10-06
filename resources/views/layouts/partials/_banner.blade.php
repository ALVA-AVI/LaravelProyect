<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('img/2017/04/cropped-PORTRAIT.jpg') }}" class="d-block w-100-r" alt="...">
        <div class="banner-text">
            <div class="text">
                <h2>Política</h2>
                <p>Spot Restauración Nacional. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                <a class="read-more" href="politica/index.html">Ingrese</a>
            </div>
        </div>
      </div>
      @if ($carrusel != ""  || $carrusel != null)
      @foreach ($carrusel as $banner)
      <div class="carousel-item">
        <img src="{{ $banner->image->url }}" class="d-block w-100-r" alt="...">
        <div class="banner-text">
          <div class="text">
            <h2>{{ $banner->titulo }}</h2>
            <p>{{ $banner->resena }}</p>
            <?php $banner->linkref != ""? $link = explode('-',$banner->linkref):"";?>
            @if ($link !="" || $link != null)
            <a class="read-more" href="{{ $link[0] }}">{{ $link[1] }}</a>
            @endif
          </div>
        </div>
      </div>
  @endforeach
      @endif
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
