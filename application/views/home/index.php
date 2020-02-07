<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use App\Model\Source\Source;
use App\Model\User\User;

/** @var User $user */

/** @var string $title */
/** @var string $items */
/** @var string $module */
/** @var string $page_name */
/** @var string $layour_dir */

/** @var string $pageTitle */
/** @var Source[] $sources */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?=$pageTitle?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?=assets('?assetsimg/core-img/favicon.ico')?>">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?=assets('style.css')?>">

	<!-- jQuery-2.2.4 js -->
	<script src="<?=assets('js/jquery/jquery-2.2.4.min.js');?>"></script>
	<script>
		const BASE_URL = '<?=base_url()?>';
	</script>

	<script>
		/**
		 * Author:		Alberto Yauri Ecos
		 * Github:		https://github.com/Mty95
		 */
		class Utils {
			static iBoxToggle($el = $('.ibox-content')) {
				$el.toggleClass('sk-loading');
			}

			static rePaintSelect2($selector, data, keyString, valueString, idString = 'id') {
				$selector.html('');
				$selector.append(new Option('', ''));

				$.each(data, (key, entity) => {
					$selector.append(
						new Option(`[${entity[keyString]}] - ${entity[valueString]}`, entity[idString])
					);
				});

				$selector.trigger('change');
			}

			static showFormErrors(response) {
				if (response.fields === undefined) {
					return;
				}

				$.each(response.fields, function (key, value) {
					let input = $(`[name="${key}"]`);
					let el = input.parent().find('.form-text');

					if (undefined === el[0]) {
						input.parent().append('<span class="form-text m-b-none text-danger"></span>');
						el = input.parent().find('.form-text');
					}

					el.text(value);
				})

			}
		}
	</script>

</head>

<body>
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- Navbar Area -->
    <div class="mag-main-menu" id="sticker">
        <div class="classy-nav-container breakpoint-off">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="magNav">

                <!-- Nav brand -->
                <a href="<?=base_url()?>" class="nav-brand d-none d-md-block"><img src="<?=assets('img/core-img/cover.png')?>" alt=""></a>
                <a href="<?=base_url()?>" class="nav-brand d-block d-md-none" style="max-width: 150px"><img src="<?=assets('img/core-img/cover-sm.png')?>" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Nav Content -->
                <div class="nav-content d-flex align-items-center">
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li class="active"><a href="<?=base_url()?>">Inicio</a></li>
                                <li><a href="<?=base_url('archivo')?>">Archive</a></li>
                                <li><a href="<?=base_url('ultimas-noticias')?>">Últimas Noticias</a></li>
                                <li><a href="#">Diarios</a>
                                    <ul class="dropdown">
										<?php foreach($sources as $source):?>
                                        	<li>
												<a href="<?=base_url()?>"><?=$source->name?></a>
											</li>
										<?php endforeach;?>
                                    </ul>
                                </li>
                                <li><a href="#">Mega</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="<?=base_url()?>">Home</a></li>
                                            <li><a href="archive.html">Archive</a></li>
                                            <li><a href="video-post.html">Single Video Post</a></li>
                                            <li><a href="single-post.html">Single Post</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="login.html">Login</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="<?=base_url()?>">Home</a></li>
                                            <li><a href="archive.html">Archive</a></li>
                                            <li><a href="video-post.html">Single Video Post</a></li>
                                            <li><a href="single-post.html">Single Post</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="login.html">Login</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="<?=base_url()?>">Home</a></li>
                                            <li><a href="archive.html">Archive</a></li>
                                            <li><a href="video-post.html">Single Video Post</a></li>
                                            <li><a href="single-post.html">Single Post</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="login.html">Login</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="<?=base_url()?>">Home</a></li>
                                            <li><a href="archive.html">Archive</a></li>
                                            <li><a href="video-post.html">Single Video Post</a></li>
                                            <li><a href="single-post.html">Single Post</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="login.html">Login</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>

                    <div class="top-meta-data d-flex align-items-center">
                        <!-- Top Search Area -->
                        <?php if(false):?>
							<div class="top-search-area">
								<form action="<?=base_url()?>" method="post">
									<input type="search" name="top-search" id="topSearch" placeholder="Search and hit enter...">
									<button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
								</form>
							</div>
                        <?php endif;?>

						<?php if($user !== null):?>
							<!-- Login -->
							<a href="<?=base_url('my-account')?>" class="login-btn"><i class="fa fa-user" aria-hidden="true"></i></a>
							<a href="<?=base_url('logout')?>" class="login-btn"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
						<?php else:?>
							<!-- Login -->
							<a href="<?=base_url('login')?>" class="login-btn"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
						<?php endif;?>

                        <!-- Submit Video -->
                        <a href="submit-video.html" class="submit-video"><span><i class="fa fa-cloud-upload"></i></span> <span class="video-text">Submit Video</span></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<?=view("{$module}/{$page_name}")?>

<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <!-- Logo -->
                    <a href="<?=base_url()?>" class="foo-logo"><img src="<?=assets('img/core-img/logo2.png');?>" alt=""></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="footer-social-info">
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <h6 class="widget-title">Categories</h6>
                    <nav class="footer-widget-nav">
                        <ul>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Life Style</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tech</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Travel</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Music</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Foods</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Fashion</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Game</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Football</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sports</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> TV Show</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <h6 class="widget-title">Sport Videos</h6>
                    <!-- Single Blog Post -->
                    <div class="single-blog-post style-2 d-flex">
                        <div class="post-thumbnail">
                            <img src="<?=assets('img/bg-img/12.jpg');?>" alt="">
                        </div>
                        <div class="post-content">
                            <a href="single-post.html" class="post-title">Take A Romantic Break In A Boutique Hotel</a>
                            <div class="post-meta d-flex justify-content-between">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog Post -->
                    <div class="single-blog-post style-2 d-flex">
                        <div class="post-thumbnail">
                            <img src="<?=assets('img/bg-img/13.jpg');?>" alt="">
                        </div>
                        <div class="post-content">
                            <a href="single-post.html" class="post-title">Travel Prudently Luggage And Carry On</a>
                            <div class="post-meta d-flex justify-content-between">
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <h6 class="widget-title">Channels</h6>
                    <ul class="footer-tags">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Fashionista</a></li>
                        <li><a href="#">Music</a></li>
                        <li><a href="#">DESIGN</a></li>
                        <li><a href="#">NEWS</a></li>
                        <li><a href="#">TRENDING</a></li>
                        <li><a href="#">VIDEO</a></li>
                        <li><a href="#">Game</a></li>
                        <li><a href="#">Sports</a></li>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Foods</a></li>
                        <li><a href="#">TV Show</a></li>
                        <li><a href="#">Twitter Video</a></li>
                        <li><a href="#">Playing</a></li>
                        <li><a href="#">clips</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Copywrite Area -->
    <div class="copywrite-area">
        <div class="container">
            <div class="row">
                <!-- Copywrite Text -->
                <div class="col-12 col-sm-6">
                    <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
                <div class="col-12 col-sm-6">
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Advertisement</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area End ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- Popper js -->
<script src="<?=assets('js/bootstrap/popper.min.js');?>"></script>
<!-- Bootstrap js -->
<script src="<?=assets('js/bootstrap/bootstrap.min.js');?>"></script>
<!-- All Plugins js -->
<script src="<?=assets('js/plugins/plugins.js');?>"></script>
<!-- Active js -->
<script src="<?=assets('js/active.js');?>"></script>
</body>

</html>
