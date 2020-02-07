<?php
use App\Model\Source\Source;

/** @var Source[] $sources */
?>
<!-- Sidebar Widget -->
<div class="single-sidebar-widget p-30">
	<!-- Section Title -->
	<div class="section-heading">
		<h5>Diarios</h5>
	</div>

	<?php foreach($sources as $source):?>
		<!-- Single YouTube Channel -->
		<div class="single-youtube-channel d-flex">
			<a href="<?=base_url('ultimas-noticias')?>">
				<img class="img img-responsive" src="<?=assets($source->thumbnail)?>" alt="">
			</a>
		</div>
	<?php endforeach;?>

</div>
