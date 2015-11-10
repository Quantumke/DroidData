<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

include 'config.php';
include 'inc.php'; 
$link = new mysqli('localhost', 'seaban_admin', 'master12!', 'seaban_db');
$stmt = $link->prepare("INSERT INTO `iplog` (`ip`) VALUES (?)");
$stmt->bind_param('s', $_SERVER['REMOTE_ADDR']);
$stmt->execute();
$CATEGORY =  mysql_query("select f.*,u.*,a.*,s.* from cats f,contacts u ,articles a, footer s");
$title = $CATEGORY;
$desc = 'S '.$CATEGORY.' section.';

$MAIN_ST = getindexcont($CATEGORY); 
if ($MAIN_ST) { $MPC = getOnePic($MAIN_ST['id']); $ogimg = $MPC['nws_pic']; }
?>
<div id="main_story">
	<?php if ($MAIN_ST) { ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->


    <head>
	<script>
function display_ct() {
var strcount
var x = new Date()
var x1=x.toUTCString();// changing the display to UTC string
document.getElementById('ct').innerHTML = x1;
tt=display_c();
}
</script>
        <meta charset="utf-8">
        <title>Seaban:: Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/templatemo_style.css">
        <link rel="stylesheet" href="css/templatemo_misc.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/testimonails-slider.css">

        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body>
	<!-- Piwik -->

<noscript><p><img src="//localhost/pwiki/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

            <header>
                <div id="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="home-account">
                                    <a href="index.php">Home</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-info">
                                    <body onload=display_ct();>
<span id='ct' ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="logo">
                                    <a href="index.php"><img src="images/logo.png"  alt="" ></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="main-menu">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
<?php include 'hdr.php' ?>       
                                        <li><a href="contact-us.php">Contact us</a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="search-box">  
                                    <form name="search_form" method="get" class="search_form">
                                        <input id="search" type="text" />
                                        <input type="submit" id="search-button" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            

            <div id="slider">
                <div class="flexslider">
                  <ul class="slides">
                    <li>
                        <div class="slider-caption">
                            <h1>Radio production</h1>
<p>We are responsible for the audio content of broadcasts via radio, the internet and other mobile platforms.<br/> We are involved in the entire process, from generating ideas to managing the audience response after a programme.       </p> 
                   
                        </div>
                      <img src="images/slide1.jpg" alt="" />
                    </li>
                    <li>
                        <div class="slider-caption">
                            <h1>Graphic Design</h1>
                            <p> we assembles together images, typography, or motion graphics to create a piece of design.<br/> A graphic designer creates the graphics primarily for published, printed or electronic media, such as brochures (sometimes) and advertising</p>
                            
                        </div>
                      <img src="images/slide2.jpg" alt="" />
                    </li>
                    <li>
                        <div class="slider-caption">
                            <h1>Media Management</h1>
<p>Booking and Planning 
          Advertising Placement 
          Media Training</p>
                           
                        </div>
						                      <img src="images/slide3.jpg" alt="" />
                   <li>
                        <div class="slider-caption">
                            <h1>Radio production and content development</h1>
<p>We are responsible for the audio content of broadcasts via radio, the internet and other mobile platforms.<br/> We are involved in the entire process, from generating ideas to managing the audience response after a programme.       </p> 
                            
                        </div>
                      <img src="images/slide4.jpg" alt="" />
                    </li>
                    <li>
                        <div class="slider-caption">
                            <h1>Event organizing</h1>
                            <p>We are responsible for the production of events from conception through to completion</p>
                           
                        </div>
                      <img src="images/slide5.jpg" alt="" />
                    </li>
                    <li>
                        <div class="slider-caption">
                            <h1>TV Production</h1>
                            <p>we oversees all aspects of video production on a television program</p>
                            
                        </div>
                      <img src="images/slide6.jpg" alt="" />
                    </li>
                    <li>
                        <div class="slider-caption">
                            <h1>Graphic design</h1>
                            <p> we assembles together images, typography, or motion graphics to create a piece of design.<br/> A graphic designer creates the graphics primarily for published, printed or electronic media, such as brochures (sometimes) and advertising</p>
                          
                        </div>
                      <img src="images/slide7.jpg" alt="" />
                    </li>
                    <li>
                        <div class="slider-caption">
                            <h1>Informacials</h1>
                            <p>Television commercials</p>
                            
                        </div>

                      <img src="images/slide8.jpg" alt="" />
                    </li>
                  </ul>
                </div>
            </div>


            <div id="services">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>What we do:</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <div class="icon">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <h4>Advertising</h4>
                                <p> We undertake this form of marketing communication using the latest methodologies to gurantee pursuasion of  the audience to take or continue some action.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <div class="icon">
                                    <i class="fa fa-bullhorn"></i>
                                </div>
                                <h4>Public relations</h4>
                                <p> (PR) we manage the spread of information between individuals or organizations to ensure spread of relevant unambigous information to the relevant parties.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <div class="icon">
                                    <i class="fa fa-bell"></i>
                                </div>
                                <h4>Event Management</h4>
                                <p> We create and develop large scale events such as rallies, conferences, ceremonies, formal parties, concerts, or conventions. We studying the brand, identify the target audience, devise the event concept, plan the logistics and coordinate the technical aspects before actually launching the event.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <div class="icon">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <h4>Audio visual producton</h4>
                                <p>We possess both a sound and a visual components, such as  films, television programs, church services and live theater productions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <div id="testimonails">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>What Customers Say</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="testimonails-slider">
                              <ul class="slides">
                                <li>
                                    <div class="testimonails-content">
                                        <p><?php echo $MAIN_ST['testimony']; ?></p>
                                        <h6><?php echo $MAIN_ST['author']; ?></h6>
                                    </div>
                                </li>
                              </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

			<footer>
                <div class="container">
                    <div class="top-footer">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="subscribe-form">
                                    <span>Get in touch with us</span>
                                    <form method="get" class="subscribeForm">
                                        <input id="subscribe" value="your email" placeholder"Enter your Email" type="text" />
                                        <input type="submit" id="submitButton" />
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="social-bottom">
                                    <span>Follow us:</span>
                                    <ul>
                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-rss"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-footer">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="about">
                                    <h4 class="footer-title">About Seaban</h4>
                                    <p><?php include 'btm.php'?> ;</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="shop-list">
                                    <h4 class="footer-title">Links</h4>
                                    <ul>
<?php include 'links.php' ?>                                   </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="recent-posts">
                                    <h4 class="footer-title">Our Partners</h4>
                                    <div class="recent-post">
                                        <div class="recent-post-thumb">
                                            <img src='images/<?php echo $MAIN_ST['logo']; ?>' alt="" width="70" height="60">                                        </div>
                                        <div class="recent-post-info">
                                            <h6><?php echo $MAIN_ST['title']; ?></h6>
                                            <span><?php echo $MAIN_ST['url']; ?></span>
                                            <span><?php echo $MAIN_ST['facebook']; ?></span>
                                            <span><?php echo $MAIN_ST['twitter']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="more-info">
                                    <h4 class="footer-title">Physical Location</h4>
                                    <p><?php echo $MAIN_ST['physicaladdress']; ?></p>
                                    <ul>
                                        <li><i class="fa fa-phone"></i><?php echo $MAIN_ST['telephone']; ?></li>
                                        <li><i class="fa fa-globe"></i><?php echo $MAIN_ST['fax']; ?></li>
                                        <li><i class="fa fa-envelope"> </i><?php echo $MAIN_ST['email']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-footer">
                        <p>&copy;<?php echo $MAIN_ST['copyright']; ?> <br/>Website Designed And developed by: <a target="_blank" href="http://www.thecipher.tk/" class="link-2"><?php echo $MAIN_ST['developer']; ?></a></p>
                    </div>
                    
                </div>
            </footer>

    
        <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <script src="js/vendor/jquery.gmap3.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		    <?php } ?>
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//localhost/pwiki/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
    </body>
</html>
