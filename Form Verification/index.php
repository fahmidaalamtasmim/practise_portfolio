<?php
session_start();

require 'db.php';
// logo
$select = "SELECT * FROM logos WHERE status = 1";
$select_logo = mysqli_query($db_connection,$select);
$after_assoc = mysqli_fetch_assoc($select_logo);
//banner
$select1 = "SELECT * FROM banners";
$select_banners = mysqli_query($db_connection,$select1);
$after_assoc_banners = mysqli_fetch_assoc($select_banners);
//banner photos
$select2 = "SELECT * FROM banner_photos WHERE status=1";
$select_banner_photos = mysqli_query($db_connection,$select2);
$after_assoc_banner_photos = mysqli_fetch_assoc($select_banner_photos);

//Social
$select3 = "SELECT * FROM social WHERE status=1";
$select_social = mysqli_query($db_connection, $select3);
//skill
$select_skill = "SELECT * FROM skills WHERE status=1";
$select_skill_res = mysqli_query($db_connection, $select_skill);
//Services
$select_service = "SELECT * FROM services WHERE status=1";
$select_service_res = mysqli_query($db_connection, $select_service);
//works
$select4= "SELECT * FROM works";
$select_res4 = mysqli_query($db_connection, $select4);
//menu
$select_menu= "SELECT * FROM menus";
$select_menu_res = mysqli_query($db_connection, $select_menu);
//counts
$select_count = "SELECT * FROM counts WHERE status=1";
$select_count_res = mysqli_query($db_connection, $select_count);
//testi
$select_t = "SELECT * FROM testimonial";
$t = mysqli_query($db_connection, $select_t);
// brand
$select_b = "SELECT * FROM brand WHERE status = 1";
$select_logo_b = mysqli_query($db_connection,$select_b);
//$after_assoc_b = mysqli_fetch_assoc($select_logo_b);
//Contact
$con = "SELECT * FROM contact";
$co = mysqli_query($db_connection, $con);
$co_assoc = mysqli_fetch_assoc($co);
?>

<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kufa - Personal Portfolio HTML5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <!-- <link rel="stylesheet" href="css/fontawesome-all.min.css"> -->
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>



    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="index.html" class="navbar-brand logo-sticky-none"><img width="100" src="uploads/logo/<?= $after_assoc['logo']?>" alt="Logo"></a>
                                    <a href="index.html" class="navbar-brand s-logo-none"><img width="100" src="uploads/logo/<?= $after_assoc['logo']?>" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <?php foreach($select_menu_res as $menu){?>
                                            <li class="nav-item"><a class="nav-link" href="#<?=$menu['section_id']?>"><?=$menu['menu_name']?></a></li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="img/logo/logo.png" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p>123/A, Miranda City Likaoli
                            Prikano, Dope</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p>+0989 7876 9865 9</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p>info@example.com</p>
                    </div>
                </div>

                <!-- social //////////////-->
                <div class="social-icon-right mt-20">
                <?php foreach($select_social as $icon ){ ?>
                    <a target="_blank" href="<?=$icon['link']?>">
                    <i class="<?=$icon['icon']?>"></i>
                </a>
                <?php } ?>

                </div>



            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?=$after_assoc_banners['subtitle']?></h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s"><?=$after_assoc_banners['title']?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?=$after_assoc_banners['description']?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                    <?php foreach($select_social as $icon ){ ?>
                    <a target="_blank" href="<?=$icon['link']?>"><i class="<?=$icon['icon']?>"></i></a>
                <?php } ?>>
                                    </ul>
                                </div>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img src="uploads/banners/<?=$after_assoc_banner_photos['photo']?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="img/banner/banner_img2.png" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2>About Me</h2>
                            </div>
                            <div class="about-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, sed repudiandae odit deserunt, quas
                                    quibusdam necessitatibus nesciunt eligendi esse sit non reprehenderit quisquam asperiores maxime
                                    blanditiis culpa vitae velit. Numquam!</p>
                                <h3>Education:</h3>
                            </div>
                         
                            <!-- Education Item skills-->
                            <?php foreach($select_skill_res as $skill){ ?>
                            <div class="education">
                                <div class="year"><?=$skill['title']?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?=$skill['description']?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width:<?=$skill['percentage']?>%;" aria-valuenow="<?=$skill['percentage']?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                           
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                    <?php foreach($select_service_res as $icon ){ ?>
						<div class="col-lg-4 col-md-6">
							<div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                           
                            <i class="<?=$icon['icon']?>"></i>
                          
                              <h3><?=$icon['title']?></h3>
								<p>
                                <?=$icon['service']?>
								</p>
							</div>
						</div>
                        <?php } ?>
						
						
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area works-->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    <?php foreach($select_res4 as $work){?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img src="uploads/work/thumbnail/<?=$work['thumbnail']?>" alt="img">
								</div>
								<div class="speaker-overlay">
									<span><?=$work['category']?></span>
									<h4><a href="portfolio-single.html"><?=$work['subtitle']?></a></h4>
									<a href="portfolio-single.php?id=<?=$work['id']?>" class="arrow-btn">More information <span></span></a>
                                    <!-- getting this id from $work -->
								</div>
							</div>
                        </div>
                        <?php }?>
                        
						
                        
                       
                    </div>
                </div>
            </section>
            <!-- Portfolios-area works-->


            <!-- fact-area counts-->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                        <?php foreach($select_count_res as $val){?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="<?=$val['icon']?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2>

                                        <?php
                                        $number= $val['number'];
                                        $result =$number/1000;
                                        if($number>=1000){
                                            // echo "<span>$result</span>" . "<span>K</span>" ;
                                             echo $result . "<span>K</span>" ;
                                            // echo $result;
                                        }else{
                                            echo $number;  
                                        }
                                        
                                        ?>

                                       </h2>
                                        <span><?=$val['title']?></span>
                                    </div>
                                </div>
                            </div>

                           <?php }?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <?php foreach($t as $test){?>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                        
                            <div class="testimonial-active">
                                <div class="single-testimonial text-center">

                                    <div class="testi-avatar">
                                    <img width="100" src="uploads/testimonial/<?=$test['image']?>" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span> <?=$test['description']?> <span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?=$test['name']?></h5>
                                            <span><?=$test['position']?></span>
                                        </div>
                                    </div>

                                  
                                </div>
                                <!-- <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img src="img/images/testi_avatar.png" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span> An event is a message sent by an object to signal the occur rence of an action. The action can causd user interaction such as a button click, or it can result <span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5>tonoy jakson</h5>
                                            <span>head of idea</span>
                                        </div>
                                    </div>
                                </div> -->


                                <?php }?>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
           
          

                <div class="container">
               
                    <div class="row brand-active">
                    <?php foreach($select_logo_b as $b){?>

                    <!-- <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="img/brand/brand_img05.png" alt="img">
                            </div>
                        </div>  -->


                        <div class="col-xl-2">
                            <div class="single-brand">
                            <img width="100" src="uploads/brand/<?=$b['logo']?>">
                            </div>
                        </div>

                        
                        <?php }?>

                        
                    </div>
                   
                </div>
              
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p><?=$co_assoc['title']?></p>
                                <h5><?=$co_assoc['address']?> <span><?=$co_assoc['email']?></span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?=$co_assoc['address']?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span><?=$co_assoc['phone']?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?=$co_assoc['email']?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php if(isset($_SESSION['sss'])){?>

                                <div class="alert alert-success"><?=$_SESSION['sss']?></div>

                                <?php } unset($_SESSION['sss'])?>
                            
                           
                            <div class="contact-form">
                                <form action="message/message_post.php" method="POST">
                                    <input type="text" name="name" placeholder="your name ">
                                    <input type="email" name="email" placeholder="your email ">
                                    <textarea name="message" name="message" id="message" placeholder="your message "></textarea>
                                    <button  type="submit" class="btn">SEND</button>
                                </form>
                               

                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/one-page-nav-min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>


</html>
