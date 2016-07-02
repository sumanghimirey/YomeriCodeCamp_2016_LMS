
<!DOCTYPE HTML>
<html>
<head>
    <title>Learning Management System</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Learning Management System" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Squada+One' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,300,600,700,900' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
            });
        });
    </script>
    <!-- //end-smoth-scrolling -->
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
</head>
<body>
<!--banner start here-->
<div class="banner">
    <div class="header">
        <div class="container">
            <div class="header-main">
                <div class="logo">
                    <h1><a href="index.html">Learn With Us</a></h1>
                </div>
                <div class="top-nav">

                    <!-- script-for-menu -->
                    <script>
                        $( "span.menu" ).click(function() {
                            $( "ul.res" ).slideToggle(function() {
                                // Animation complete.
                            });
                        });
                    </script>
                    <!-- /script-for-menu -->
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="banner-bottom">
                                    <h2>Login</h2>
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-default">Login</button>

                                    </form>

                                </div>
                            </div>
                        <div class="col-sm-6">
                        <div class="banner-bottom" style="margin-top: -35px">
                            <h2>Register</h2>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id=" name" placeholder="Full Name">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Phone Number">
                                </div>


                                <div class="form-group">
                                    <input type="email" class="form-control" id="Address" placeholder="Address">
                                </div>


                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Y/M/D">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Occupation">
                                </div>
                                <div class="form-group">
                                    <input type="file" id="exampleInputFile" placeholder="select ur photo">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </section>
    </div>
</div>
<!--banner end here-->
<!-- FlexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(function(){

    });
    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!-- FlexSlider -->

<!--banner-info strat here-->
<div class="bann-info">
    <div class="container">
        <div class="bann-info-main">
            <div class="bann-info-bottom">
                <div class="col-md-4 bann-info-grid">
                    <img src="images/b2.jpg" alt="" class="img-responsive">
                </div>
                <div class="col-md-4 bann-info-grid">
                    <img src="images/b1.jpg" alt="" class="img-responsive">
                </div>
                <div class="col-md-4 bann-info-grid">
                    <img src="images/b3.jpg" alt="" class="img-responsive">
                </div>
                <div class="clearfix"> </div>
            </div>
            <h3>Lorem ipsum consectetur adipiscing</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. mollit</p>
        </div>
    </div>
</div>
<!--banner info end here-->
<!--banner-strip start here-->
<div class="bann-strip gold">
    <div class="container">
        <div class="banner-strip-main">
            <h3>Excepteur sint occaecat cupidatat</h3>
            <p>velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
        </div>
    </div>
</div>
<!--banner-strip end here-->
<!--planing strat here-->
<div class="plan">
    <div class="container">
        <div class="plan-main">
            <div class="plan-top">
                <h3>More Than You Can Imagine</h3>
                <p>velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident</p>
            </div>
            <div class="plan-bottom">
                <div class="col-md-6 plan-left">
                    <a href="single.html"><img src="images/m1.jpg" alt="" class="img-responsive"></a>
                    <div class="plan-bot-text">
                        <h4><a href="single.html">DIUYASERTAS VISTRASA MOLEUYT FERUYASA</a></h4>
                        <p>Doloersectet, adipisci uumquam eius modi tempora incidude ut labore et dolore magnam. Baliquamaerat voluptatem. ut enim ad minima veniam, quis nostrum exercitatio.Sed ut perspiciatis unde omnis iste natus error</p>
                    </div>
                </div>
                <div class="col-md-6 plan-right">
                    <a href="single.html"><img src="images/m2.jpg" alt="" class="img-responsive"></a>
                    <div class="plan-bot-text">
                        <h4><a href="single.html">DIUYASERTAS VISTRASA MOLEUYT FERUYASA</a></h4>
                        <p>Doloersectet, adipisci uumquam eius modi tempora incidude ut labore et dolore magnam. Baliquamaerat voluptatem. ut enim ad minima veniam, quis nostrum exercitatio.</p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--planing end here-->
<!--our mission start here-->
<div class="mission">
    <div class="container">
        <div class="mission-main">
            <div class="col-md-6 mission-left">
                <div class="mission-top">
                    <h3>Who We Are</h3>
                    <p>Tempora incidude labore magnam</p>
                </div>
                <div class="mission-wedo">
                    <div class="mission-grid-left">
                        <span class="glyphicon glyphicon-pushpin miss-wedo-icon" aria-hidden="true"></span>
                        <div class="miss-text">
                            <h4><a href="single.html">labore et dolore magnam Baliquamaerat</a></h4>
                            <p>Modi tempora incidude ut labore et dolore magnam. Baliquamaerat voluptatem. ut enim ad minima veniam, quis nostrum exercitatio.</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="mission-grid-left">
                        <span class="glyphicon glyphicon-wrench miss-wedo-icon" aria-hidden="true"></span>
                        <div class="miss-text">
                            <h4><a href="single.html">labore et dolore magnam  voluptatem</a></h4>
                            <p>Modi tempora incidude ut labore et dolore magnam. Baliquamaerat voluptatem. ut enim ad minima veniam, quis nostrum exercitatio.</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mission-right">
                <div class="mission-top">
                    <h3>Our Mission</h3>
                    <p>Tempora incidude labore magnam</p>
                </div>
                <div class="mission-wedo">
                    <div class="mission-grid-right">
                        <div class="miss-img"><a href="single.html"><img src="images/m3.jpg" alt="" class="img-responsive"></a></div>
                        <div class="miss-text miss-tex-rit">
                            <h4><a href="single.html">Magnam Baliquamae</a></h4>
                            <p>Modi tempora incidude ut labore et dolore magnam. Baliquamaerat voluptatem.</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="mission-grid-right">
                        <div class="miss-img"><a href="single.html"><img src="images/m4.jpg" alt="" class="img-responsive"></a></div>
                        <div class="miss-text miss-tex-rit">
                            <h4><a href="single.html">labore et dolore</a></h4>
                            <p>Modi tempora incidude ut labore et dolore magnam. Baliquamaerat voluptatem.</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--establish end here-->
<!--footer start here-->
<div class="footer">
    <div class="container">
        <div class="footer-main">
            <div class="col-md-4 ftr-gd">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="#" class="fa"> </a></li>
                    <li><a href="#" class="tw"> </a></li>
                    <li><a href="#" class="g"> </a></li>
                </ul>
            </div>
            <div class="col-md-4 ftr-gd">
                <h3>Newsletter</h3>
                <form>
                    <input  type="text" value="Enter Your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your email';}">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <div class="col-md-4 ftr-gd">
                <h3>Address</h3>
                <p>59658 officiis debitis</p>
                <p>Cicero, written in BC</p>
                <p>Ph :+1586 8557 455</p>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="copyright">
            <p>© 2015 Civil Engineer. All rights reserved | Design by  <a href="http://w3layouts.com/" target="_blank">  W3layouts </a></p>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear'
                 };
                 */

                $().UItoTop({ easingType: 'easeOutQuart' });

            });
        </script>
        <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

    </div>
</div>
<!--footer end here-->
</body>
</html>