<?php

use App\Model\Post\Post;
use App\Model\Post\Repository;
use App\Model\Source\Source;

/** @var Source $source */
/** @var Post[] $posts */


$posts = Repository::take()->where('source_id', $source->id)->where('enabled', true)->last(4);
?>

<!-- Sports Videos -->
<div class="sports-videos-area">
	<!-- Section Title -->
	<div class="section-heading">
		<h5><img src="<?=assets($source->thumbnail)?>" style="max-height: 40px;" alt=""></h5>
	</div>

	<div class="row mb-30">
		<!-- Single Blog Post -->

		<?php foreach($posts as $post):?>
			<div class="col-12 col-lg-6">
				<div class="single-blog-post d-flex style-3 mb-30">
					<div class="post-thumbnail">
						<img src="<?=$post->thumbnail?>" alt="">
					</div>
					<div class="post-content">
						<a href="<?=$post->showLink()?>" class="post-title"><?=$post->title?></a>
						<div class="post-meta d-flex">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$post->created_at->format('H:i A')?></a>
							<a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$post->num_views?></a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?=$post->num_comments?></a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach;?>

	</div>
</div>
