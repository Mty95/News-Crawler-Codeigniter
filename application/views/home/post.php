<?php
/** @var \App\Model\Post\Post $post */
/** @var \App\Model\Post\Post[] $morePosts */
/** @var \App\Model\User\User $author */
?>

<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?=assets('img/bg-img/41.jpg')?>);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2><?=$title?></h2>
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

<style>
	.ribbon {
		width: 150px;
		height: 150px;
		overflow: hidden;
		position: absolute;
	}
	.ribbon::before,
	.ribbon::after {
		position: absolute;
		z-index: -1;
		content: '';
		display: block;
		border: 5px solid #2980b9;
	}
	.ribbon span {
		position: absolute;
		display: block;
		width: 225px;
		padding: 15px 0;
		background-color: #3498db;
		box-shadow: 0 5px 10px rgba(0,0,0,.1);
		color: #fff;
		font: 700 18px/1 'Lato', sans-serif;
		text-shadow: 0 1px 1px rgba(0,0,0,.2);
		text-transform: uppercase;
		text-align: center;
	}

	/* top left*/
	.ribbon-top-left {
		top: -10px;
		left: -10px;
	}
	.ribbon-top-left::before,
	.ribbon-top-left::after {
		border-top-color: transparent;
		border-left-color: transparent;
	}
	.ribbon-top-left::before {
		top: 0;
		right: 0;
	}
	.ribbon-top-left::after {
		bottom: 0;
		left: 0;
	}
	.ribbon-top-left span {
		right: -25px;
		top: 30px;
		transform: rotate(-45deg);
	}

	/* top right*/
	.ribbon-top-right {
		top: -10px;
		right: -10px;
	}
	.ribbon-top-right::before,
	.ribbon-top-right::after {
		border-top-color: transparent;
		border-right-color: transparent;
	}
	.ribbon-top-right::before {
		top: 0;
		left: 0;
	}
	.ribbon-top-right::after {
		bottom: 0;
		right: 0;
	}
	.ribbon-top-right span {
		left: -25px;
		top: 30px;
		transform: rotate(45deg);
	}

	/* bottom left*/
	.ribbon-bottom-left {
		bottom: -10px;
		left: -10px;
	}
	.ribbon-bottom-left::before,
	.ribbon-bottom-left::after {
		border-bottom-color: transparent;
		border-left-color: transparent;
	}
	.ribbon-bottom-left::before {
		bottom: 0;
		right: 0;
	}
	.ribbon-bottom-left::after {
		top: 0;
		left: 0;
	}
	.ribbon-bottom-left span {
		right: -25px;
		bottom: 30px;
		transform: rotate(225deg);
	}

	/* bottom right*/
	.ribbon-bottom-right {
		bottom: -10px;
		right: -10px;
	}
	.ribbon-bottom-right::before,
	.ribbon-bottom-right::after {
		border-bottom-color: transparent;
		border-right-color: transparent;
	}
	.ribbon-bottom-right::before {
		bottom: 0;
		left: 0;
	}
	.ribbon-bottom-right::after {
		top: 0;
		right: 0;
	}
	.ribbon-bottom-right span {
		left: -25px;
		bottom: 30px;
		transform: rotate(-225deg);
	}

	/* Colors */

	.ribbon.white span{background-color: #f0f0f0; color: #555;}
	.ribbon.black span{background-color: #333;}
	.ribbon.grey span{background-color: #999;}
	.ribbon.blue span{background-color: #39d;}
	.ribbon.green span{background-color: #2c7;}
	.ribbon.turquoise span{background-color: #1b9;}
	.ribbon.purple span{background-color: #95b;}
	.ribbon.red span{background-color: #e43;}
	.ribbon.orange span{background-color: #e82;}
	.ribbon.yellow span{background-color: #ec0;}

	.ribbon.white::before, .ribbon.white::after{border: 5px solid #f0f0f0;}
	.ribbon.black::before, .ribbon.black::after{border: 5px solid #333;}
	.ribbon.grey::before, .ribbon.grey::after{border: 5px solid #999;}
	.ribbon.blue::before, .ribbon.blue::after{border: 5px solid #39d;}
	.ribbon.green::before, .ribbon.green::after{border: 5px solid #2c7;}
	.ribbon.turquoise::before, .ribbon.turquoise::after{border: 5px solid #1b9;}
	.ribbon.purple::before, .ribbon.purple::after{border: 5px solid #95b;}
	.ribbon.red::before, .ribbon.red::after{border: 5px solid #e43;}
	.ribbon.orange::before, .ribbon.orange::after{border: 5px solid #e82;}
	.ribbon.yellow::before, .ribbon.yellow::after{border: 5px solid #ec0;}
</style>

<!-- ##### Post Details Area Start ##### -->
<section class="post-details-area">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Post Details Content Area -->
            <div class="col-12 col-xl-8">
                <div class="post-details-content bg-white mb-30 p-30 box-shadow">

<!--					<div class="ribbon ribbon-top-left"><span>ribbon</span></div>-->
<!--					<div class="ribbon red ribbon-top-right"><span>Danger</span></div>-->

                    <div class="blog-thumb mb-30">
                        <img src="<?=$post->big_image?>" alt="" referrerPolicy="no-referrer">
                    </div>
                    <div class="blog-content">
                        <div class="post-meta">
                            <a href="#"><?=$post->getCreatedDate()?></a>
                            <a href="<?=$post->showCategoryLink()?>"><?=$post->category_name?></a>
                        </div>
                        <h4 class="post-title"><?=$post->title?></h4>
                        <p><b><?=$post->subtitle?></b></p>
                        <!-- Post Meta -->
                        <div class="post-meta-2 pull-right">
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$post->num_views?></a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?=$post->num_comments?></a>
                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$post->getCreatedHour()?></a>
                        </div>
                        <br>

                        <?=$post->parseContent()?>

                        <!-- Like Dislike Share -->
                        <div class="like-dislike-share my-5">
                            <h4 class="share">240<span>Share</span></h4>
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Share on Facebook</a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Share on Twitter</a>
                        </div>

						<p><i>Fuente: <b><a target="_blank" href="<?=$post->original_link?>"><?=$post->source_name?></a></b></i></p>

                        <!-- Post Author -->
                        <div class="post-author d-flex align-items-center">
                            <div class="post-author-thumb">
                                <img src="<?=$author->getAvatarImage()?>" alt="">
                            </div>
                            <div class="post-author-desc pl-4">
                                <a href="#" class="author-name"><?=$author->first_name?> <?=$author->last_name?></a>
                                <p><?=$author->biography?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Post Area -->
                <div class="related-post-area bg-white mb-30 px-30 pt-30 box-shadow">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5>No te pierdas</h5>
                    </div>

                    <div class="row">
                        <?php foreach($morePosts as $post):?>
                            <!-- Single Blog Post -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="single-blog-post style-4 mb-30">
                                    <div class="post-thumbnail">
                                        <img src="<?=$post->thumbnail?>" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="<?=base_url('post/' . $post->id)?>" class="post-title"><?=$post->title?></a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$post->num_views?></a>
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?=$post->num_comments?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>

                <!-- Comment Area Start -->
                <div class="d-none comment_area clearfix bg-white mb-30 p-30 box-shadow">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5>COMMENTS</h5>
                    </div>

                    <ol>
                        <!-- Single Comment Area -->
                        <li class="single_comment_area">
                            <!-- Comment Content -->
                            <div class="comment-content d-flex">
                                <!-- Comment Author -->
                                <div class="comment-author">
                                    <img src="img/bg-img/53.jpg" alt="author">
                                </div>
                                <!-- Comment Meta -->
                                <div class="comment-meta">
                                    <a href="#" class="comment-date">27 Aug 2019</a>
                                    <h6>Tomas Mandy</h6>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius</p>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="like">like</a>
                                        <a href="#" class="reply">Reply</a>
                                    </div>
                                </div>
                            </div>

                            <ol class="children">
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                        <!-- Comment Author -->
                                        <div class="comment-author">
                                            <img src="img/bg-img/54.jpg" alt="author">
                                        </div>
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <a href="#" class="comment-date">27 Aug 2019</a>
                                            <h6>Britney Millner</h6>
                                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius</p>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="like">like</a>
                                                <a href="#" class="reply">Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>

                        <!-- Single Comment Area -->
                        <li class="single_comment_area">
                            <!-- Comment Content -->
                            <div class="comment-content d-flex">
                                <!-- Comment Author -->
                                <div class="comment-author">
                                    <img src="img/bg-img/55.jpg" alt="author">
                                </div>
                                <!-- Comment Meta -->
                                <div class="comment-meta">
                                    <a href="#" class="comment-date">27 Aug 2019</a>
                                    <h6>Simon Downey</h6>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius</p>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="like">like</a>
                                        <a href="#" class="reply">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>

                <?php if($user):?>
					<!-- Post A Comment Area -->
					<div class="post-a-comment-area bg-white mb-30 p-30 box-shadow clearfix">
						<!-- Section Title -->
						<div class="section-heading">
							<h5>Déjanos tu comentario</h5>
						</div>

						<!-- Reply Form -->
						<div class="contact-form-area">
							<form action="#" method="post">
								<div class="row">
									<div class="col-12">
										<textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Mensaje*" required></textarea>
									</div>
									<div class="col-12">
										<button class="btn mag-btn mt-30" type="submit">Enviar comentario</button>
									</div>
								</div>
							</form>
						</div>
					</div>
                <?php endif;?>
            </div>

            <!-- Sidebar Widget -->
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

                    <?=\App\Library\Mty95\Widgets::show('\App\Model\WidgetModel:categoriesList', '')?>

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
</section>
<!-- ##### Post Details Area End ##### -->
