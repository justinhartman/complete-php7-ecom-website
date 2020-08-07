<?php
/**
 * Advanced PHP 7 eCommerce Website (https://22digital.co.za)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 *
 * @copyright Copyright (c) 22 Digital (https://22digital.co.za)
 * @copyright Copyright (c) Justin Hartman (https://justinhartman.co)
 * @author    Justin Hartman <justin@hartman.me> (https://justinhartman.co)
 * @link      https://github.com/justinhartman/complete-php7-ecom-website GitHub Project
 * @since     0.1.0
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 */

/**
 * Load the bootstrap file.
 */
require '../config/bootstrap.php';

if (isset($_POST) && !empty($_POST)) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$password'";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        //echo "User exits, create session";
        $_SESSION['email'] = $email;
        header("location: index.php");
    } else {
        $fmsg = "Invalid Login Credentials";
    }
}

?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Shop Admin Login - PHP Ecommerce</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo getenv('STORE_URL'); ?>/assets/images/favicon.png">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/js/isotope/isotope.css">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/js/flexslider/flexslider.css">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/js/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/js/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/js/owl-carousel/owl.transitions.css">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/js/superfish/css/megafish.css" media="screen">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/js/superfish/css/superfish.css" media="screen">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/js/pikaday/pikaday.css">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/css/settings-panel.css">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/css/light.css">
        <link rel="stylesheet" href="<?php echo getenv('STORE_URL'); ?>/assets/css/responsive.css">

        <!-- JS Font Script -->
        <script src="http://use.edgefonts.net/bebas-neue.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Modernizer -->
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/modernizr.custom.js"></script>
    </head>
    <body class="multi-page">

        <div id="wrapper" class="wrapper">
            <!-- HEADER -->
            <header id="header2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-xs-5 col-md-offset-4 logo">
                            <a href="<?php echo getenv('STORE_URL'); ?>/admin/"><img src="<?php echo getenv('STORE_URL'); ?>/assets/images/logo.png" class="img-responsive" alt=""/></a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- SHOP CONTENT -->
            <section id="content">
                <div class="content-blog">
                    <div class="container">
                        <div class="row">
                            <div class="page_header text-center">
                                <h2>Login</h2>
                                <p>Login in here to access your Store Admin Area.</p>
                            </div>
                            <div class="col-md-12">
                                <div class="row shop-login">
                                    <div class="col-md-6 col-md-offset-3">
                                        <?php if (isset($fmsg)) {
                                            ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php
                                        } ?>
                                        <div class="box-content">
                                            <div class="clearfix space40"></div>
                                            <form class="logregform" method="post">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label>E-mail Address</label>
                                                            <input type="email" name="email" value="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix space20"></div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <a class="pull-right" href="#">(Lost Password?)</a>
                                                            <label>Password</label>
                                                            <input type="password" name="password" value="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix space20"></div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span class="remember-box checkbox">
                                                            <label for="rememberme">
                                                                <input type="checkbox" id="rememberme" name="rememberme">Remember Me
                                                            </label>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="submit" class="button btn-md pull-right">Login</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="clearfix space70"></div>
            <!-- FOOTER -->
            <footer id="footer2">

                <div class="footer-bottom container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Copyright &copy; 2018 Copyright Holder All Rights Reserved.r</p>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </footer>
            <!-- FOOTER -->
        </div>

        <!-- Javascript -->
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/dialogFx.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/dialog-js.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/navigation/jquery.easing.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/flexslider/jquery.flexslider.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/navigation/scroll.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/navigation/jquery.sticky.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/isotope/isotope.pkgd.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/superfish/js/hoverIntent.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/superfish/js/superfish.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/tweecool.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/jquery.bpopup.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/pikaday/pikaday.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/classie.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/jquery.prettyphoto.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/script.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/booking.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/gmap.js"></script>
        <script src="<?php echo getenv('STORE_URL'); ?>/assets/js/gmap2.js"></script>
    </body>
</html>
