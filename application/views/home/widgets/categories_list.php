<?php
/** @var $categories[] */
?>

<!-- Sidebar Widget -->
<div class="single-sidebar-widget p-30">
    <!-- Section Title -->
    <div class="section-heading">
        <h5>Categorías</h5>
    </div>

    <!-- Catagory Widget -->
    <ul class="catagory-widgets">
        <?php foreach($categories as $key => $row):?>
            <li>
                <a href="<?=base_url('archivo/' . $row->id)?>">
                    <span><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?=$row->title?></span> <span><?=$row->count?></span>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
</div>