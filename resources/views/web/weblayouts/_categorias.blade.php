<!--div class="card-header">
    <h4 class="card-titble">Modulos</h4>
</div>
<ul class="list-group">
    @ foreach (getModuleCategorias as $item) 
        <li class="list-group-item"><a href="">{{-- $item->name --}}</a></li>
    @ endforeach
</ul-->
<div class="card-header">
    <h4 class="card-titble">Modulos</h4>
</div>
<ul class="list-group">
    <?php $mod = getModulesArray();
        foreach ($mod as $key => $value) {?>
            <li class="list-group-item">
                <a href="{{ $key == 1?route('web.index') : route('web.modulo',$key) }}">{{ $value }}</a>
            </li>
    <?php  }  ?>
</ul>