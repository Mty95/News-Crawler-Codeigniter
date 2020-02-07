<?php
use App\Library\Mty95\Widgets;
use App\Model\Category\Category;
use App\Model\Post\Post;

/** @var string $title */
/** @var string $category_title */
/** @var $category_id */
/** @var DateTime $date */
/** @var Post[] $posts */
/** @var Category[] $categories */
?>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?=assets('img/bg-img/41.jpg')?>);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2><?=$category_title?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Breadcrumb Area Start ##### -->
<div class="mag-breadcrumb py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Feature</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Archive by Category “TRAVEL”</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Archive Post Area Start ##### -->
<div class="archive-post-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8">
                <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">

					<?php if(empty($posts)):?>
						<p>No se encontraron noticias.</p>
					<?php endif;?>

                    <?php /** @var Post[] $posts */?>
                    <?php foreach($posts as $post):?>
                        <!-- Single Catagory Post -->
                        <div class="single-catagory-post d-flex flex-wrap">
                            <!-- Thumbnail -->
                            <div class="post-thumbnail bg-img" style="background-image: url(<?=$post->thumbnail?>); width: 100%;">
                                <a href="<?=base_url('post/' . $post->id)?>"></a>
                            </div>

                            <!-- Post Contetnt -->
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="<?=base_url('archivo/0/' . $post->created_at->format('Y-m-d'))?>"><?=$post->getCreatedDate()?></a>
                                    <a href="<?=base_url('archivo/' . $post->category_id)?>"><?=$post->category_name?></a>
                                </div>
                                <a href="<?=base_url('post/' . $post->id)?>" class="post-title" style="font-size: 20px;"><?=$post->title?></a>
                                <!-- Post Meta -->
                                <div class="post-meta-2">
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$post->num_views?></a>
                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 0</a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?=$post->num_comments?></a>
                                </div>
                                <p><?=$post->small_description?></p>

                                <div class="pull-right font-italic text-black-50">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <?=$post->getCreatedHour()?>
                                </div>
                            </div>

                        </div>
                    <?php endforeach;?>


                    <!-- Pagination -->
                    <style>.pagination > li.page-item > a {font-size: 13px !important;}</style>
                    <?php
						$dateNow = new DateTime();
						$dateNow->modify('-6 days');
                        $dateModel = $date;
                    ?>
                    <nav>
                        <ul class="pagination">
                            <?php for($i = 1; $i <= 6; $i++):?>
								<?php $dateNow->modify('+1 day')?>
                                <li class="page-item <?=$dateNow->getTimestamp() === $dateModel->getTimestamp() ? 'active' : ''?>">
                                    <a class="page-link" href="<?=base_url("archivo/{$category_id}/" . $dateNow->format('Y-m-d'))?>">
                                        <?=$dateNow->format('Y-m-d')?>
                                    </a>
                                </li>
                            <?php endfor;?>
                            <?php if(false):?>
								<li class="page-item active"><a class="page-link" href="<?=base_url("archivo/{$category_id}/{$date->format('Y-m-d')}")?>"><?=$date->format('Y-m-d')?></a></li>
                            <?php endif;?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                <div class="sidebar-area bg-white mb-30 box-shadow">
                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget p-30">
                        <!-- Social Followers Info -->
                        <div class="social-followers-info">
                            <!-- Facebook -->
                            <a href="#" class="facebook-fans"><i class="fa fa-facebook"></i> 4,360 <span>Fans</span></a>
                            <!-- Twitter -->
                            <a href="#" class="twitter-followers"><i class="fa fa-twitter"></i> 3,280 <span>Followers</span></a>
                            <!-- YouTube -->
                            <a href="#" class="youtube-subscribers"><i class="fa fa-youtube"></i> 1250 <span>Subscribers</span></a>
                            <!-- Google -->
                            <a href="#" class="google-followers"><i class="fa fa-google-plus"></i> 4,230 <span>Followers</span></a>
                        </div>
                    </div>

                    <?= Widgets::show('\App\Model\WidgetModel:categoriesList', '')?>

                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget">
                        <a href="#" class="add-img"><img src="img/bg-img/add2.png" alt=""></a>
                    </div>

                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget p-30">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Hot Channels</h5>
                        </div>

                        <!-- Single YouTube Channel -->
                        <div class="single-youtube-channel d-flex">
                            <div class="youtube-channel-thumbnail">
                                <img src="img/bg-img/14.jpg" alt="">
                            </div>
                            <div class="youtube-channel-content">
                                <a href="single-post.html" class="channel-title">TV Show</a>
                                <a href="#" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                            </div>
                        </div>

                        <!-- Single YouTube Channel -->
                        <div class="single-youtube-channel d-flex">
                            <div class="youtube-channel-thumbnail">
                                <img src="img/bg-img/15.jpg" alt="">
                            </div>
                            <div class="youtube-channel-content">
                                <a href="single-post.html" class="channel-title">Game Channel</a>
                                <a href="#" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                            </div>
                        </div>

                        <!-- Single YouTube Channel -->
                        <div class="single-youtube-channel d-flex">
                            <div class="youtube-channel-thumbnail">
                                <img src="img/bg-img/16.jpg" alt="">
                            </div>
                            <div class="youtube-channel-content">
                                <a href="single-post.html" class="channel-title">Sport Channel</a>
                                <a href="#" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                            </div>
                        </div>

                        <!-- Single YouTube Channel -->
                        <div class="single-youtube-channel d-flex">
                            <div class="youtube-channel-thumbnail">
                                <img src="img/bg-img/17.jpg" alt="">
                            </div>
                            <div class="youtube-channel-content">
                                <a href="single-post.html" class="channel-title">Travel Channel</a>
                                <a href="#" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                            </div>
                        </div>

                        <!-- Single YouTube Channel -->
                        <div class="single-youtube-channel d-flex">
                            <div class="youtube-channel-thumbnail">
                                <img src="img/bg-img/18.jpg" alt="">
                            </div>
                            <div class="youtube-channel-content">
                                <a href="single-post.html" class="channel-title">LifeStyle Channel</a>
                                <a href="#" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                            </div>
                        </div>

                    </div>

                    <!-- Sidebar Widget -->
                    <div class="single-sidebar-widget p-30">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Newsletter</h5>
                        </div>

                        <div class="newsletter-form">
                            <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
                            <form action="#" method="get">
                                <input type="search" name="widget-search" placeholder="Enter your email">
                                <button type="submit" class="btn mag-btn w-100">Subscribe</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Archive Post Area End ##### -->
