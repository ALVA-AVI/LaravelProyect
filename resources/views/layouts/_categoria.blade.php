<ul>
    <?php $mod = getModulesArray();
        foreach ($mod as $key => $value) {?>
            <li class="cat-item cat-item-6">
                <a href="{{ route('web.modulo',$key) }}">{{ $value }}</a>
            </li>
    <?php  }  ?>
</ul>