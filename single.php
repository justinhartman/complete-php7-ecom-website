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
require __DIR__ . '/config/bootstrap.php';

// We use ouput buffering here because we want to modify the headers after
// sending the content when we redirect the user to the index page.
ob_start();
if (isset($_GET['id']) & !empty($_GET['id'])) {
    $id = $_GET['id'];
    $prodsql = "SELECT * FROM `products` WHERE `id`=$id";
    $prodres = mysqli_query($connection, $prodsql);
    $prodr = mysqli_fetch_assoc($prodres);
} else {
    header('location: index.php');
}

/**
 * Flush the object cache.
 */
ob_flush();

$uid = $_SESSION['customerid'];
if (isset($_POST) && !empty($_POST)) {
    $review = filter_var($_POST['review'], FILTER_SANITIZE_STRING);

    $revsql = "INSERT INTO `reviews` (`pid`, `uid`, `review`) VALUES ($id, $uid, '$review')";
    $revres = mysqli_query($connection, $revsql);
    if ($revres) {
        $smsg = "Review Submitted Successfully";
    } else {
        $fmsg = "Failed to Submit Review";
    }
}

/**
 * Load the template files.
 */
include INC . 'header.php';
include INC . 'nav.php';
?>

<!-- SHOP CONTENT -->
<section id="content">
    <div class="content-blog">
        <div class="container">
            <div class="row">
                <div class="page_header text-center">
                    <h2>Shop</h2>
                    <p><?php echo getenv('STORE_TAGLINE'); ?></p>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <?php if (isset($fmsg)) {
                        ?>
                    <div class="row">
                        <div class="alert alert-danger" role="alert"><?php echo $fmsg; ?></div>
                    </div>
                    <?php
                    } ?>
                    <?php if (isset($smsg)) {
                        ?>
                    <div class="row">
                        <div class="alert alert-success" role="alert"><?php echo $smsg; ?></div>
                    </div>
                    <?php
                    } ?>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="gal-wrap">
                                <div id="gal-slider" class="flexslider">
                                    <ul class="slides">
                                        <li><img src="<?php echo getenv('STORE_URL'); ?>/admin/<?php echo $prodr['thumb']; ?>" class="img-responsive" alt=""/></li>
                                    </ul>
                                </div>
                                <ul class="gal-nav">
                                    <li>
                                        <div>
                                            <img src="<?php echo getenv('STORE_URL'); ?>/admin/<?php echo $prodr['thumb']; ?>" class="img-responsive" alt=""/>
                                        </div>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-7 product-single">
                            <h2 class="product-single-title no-margin"><?php echo $prodr['name']; ?></h2>
                            <div class="space10"></div>
                            <div class="p-price"><?php echo getenv('STORE_CURRENCY') . $prodr['price']; ?></div>
                            <p><?php echo $prodr['description']; ?></p>
                            <form method="get" action="<?php echo getenv('STORE_URL'); ?>/addtocart.php">
                                <div class="product-quantity">
                                    <span>Quantity:</span>
                                    <input type="hidden" name="id" value="<?php echo $prodr['id']; ?>">
                                    <input type="text" name="quant" placeholder="1">
                                </div>
                                <div class="shop-btn-wrap">
                                    <input type="submit" class="button btn-small space20" value="Add to Cart">
                                </div>
                            </form>
                            <a href="<?php echo getenv('STORE_URL'); ?>/addtowishlist.php?id=<?php echo $prodr['id']; ?>" class="button btn-small">Add to Wishlist</a>
                            <div class="product-meta">
                                <span>Categories:
                                    <?php
                                    $prodcatsql = "SELECT * FROM `category` WHERE `id`={$prodr['catid']}";
                                    $prodcatres = mysqli_query($connection, $prodcatsql);
                                    $prodcatr = mysqli_fetch_assoc($prodcatres);
                                    ?>
                                    <a href="<?php echo getenv('STORE_URL'); ?>/index.php?id=<?php echo $prodcatr['id']; ?>"><?php echo $prodcatr['name']; ?></a>
                                </span><br>
                            </div>
                        </div>
                    </div>
                        <div class="clearfix space30"></div>
                        <div class="tab-style3">
                            <!-- Nav Tabs -->
                            <div class="align-center mb-40 mb-xs-30">
                                <ul class="nav nav-tabs tpl-minimal-tabs animate">
                                    <li class="active col-md-6">
                                        <a aria-expanded="true" href="#mini-one" data-toggle="tab">Overview</a>
                                    </li>
                                    <!-- <li class="col-md-4">
                                        <a aria-expanded="false" href="#mini-two" data-toggle="tab">Product Info</a>
                                    </li> -->
                                    <li class="col-md-6">
                                        <a aria-expanded="false" href="#mini-three" data-toggle="tab">Reviews</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Nav Tabs -->
                        <!-- Tab panes -->
                        <div style="height: auto;" class="tab-content tpl-minimal-tabs-cont align-center section-text">
                            <div style="" class="tab-pane fade active in" id="mini-one">
                                <p>T<?php echo $prodr['description']; ?></p>
                            </div>
                            <div style="" class="tab-pane fade" id="mini-three">
                                <div class="col-md-12">
                                    <?php
                                    $revcountsql = "SELECT count(*) AS `count` FROM `reviews` `r` WHERE `r`.`pid`=$id";
                                    $revcountres = mysqli_query($connection, $revcountsql);
                                    $revcountr = mysqli_fetch_assoc($revcountres);

                                    ?>
                                    <h4 class="uppercase space35"><?php echo $revcountr['count']; ?> Reviews for <?php echo substr($prodr['name'], 0, 20); ?></h4>
                                    <ul class="comment-list">
                                        <?php
                                        $selrevsql = "SELECT `u`.`firstname`, `u`.`lastname`, `r`.`timestamp`, `r`.`review` FROM `reviews` `r` JOIN `usersmeta` `u` WHERE `r`.`uid`=`u`.`uid` AND `r`.`pid`=$id";
                                        $selrevres = mysqli_query($connection, $selrevsql);
                                        while ($selrevr = mysqli_fetch_assoc($selrevres)) {
                                            ?>
                                            <li>
                                                <a class="pull-left" href="#"><img class="comment-avatar" src="<?php echo getenv('STORE_URL'); ?>/assets/images/quote/1.jpg" alt="" height="50" width="50"></a>
                                                <div class="comment-meta">
                                                    <a href="#"><?php echo $selrevr['firstname']." ". $selrevr['lastname']; ?></a>
                                                    <span>
                                                        <em><?php echo $selrevr['timestamp']; ?></em>
                                                    </span>
                                                </div>
                                                <!-- <div class="rating2">
                                                    <span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
                                                </div> -->
                                                <p>
                                                    <?php echo $selrevr['review']; ?>
                                                </p>
                                            </li>
                                            <?php
                                        } ?>
                                    </ul>
                                    <?php
                                    $chkrevsql = "SELECT count(*) `reviewcount` FROM `reviews` `r` WHERE r.uid='$uid' AND r.pid='$id'";
                                    $chkrevres = mysqli_query($connection, $chkrevsql);
                                    $chkrevr = mysqli_fetch_assoc($chkrevres);
                                    if ($chkrevr['reviewcount'] >= 1) {
                                        echo "<h4 class='uppercase space20'>You have already Reviewed This Product...</h4>";
                                    } else {
                                    ?>
                                        <h4 class="uppercase space20">Add a review</h4>
                                        <form id="form" class="review-form" method="post">
                                            <?php
                                            $usersql = "SELECT `u`.`email`, `u1`.`firstname`, `u1`.`lastname` FROM `users` `u` JOIN `usersmeta` `u1` WHERE `u`.`id`=`u1`.`uid` AND `u`.`id`=$uid";
                                            $userres = mysqli_query($connection, $usersql);
                                            $userr = mysqli_fetch_assoc($userres); ?>
                                            <div class="row">
                                                <div class="col-md-6 space20">
                                                    <input name="name" class="input-md form-control" placeholder="Name *" maxlength="100" required="" type="text" value="<?php echo $userr['firstname'] . " " . $userr['lastname']; ?>" disabled>
                                                </div>
                                                <div class="col-md-6 space20">
                                                    <input name="email" class="input-md form-control" placeholder="Email *" maxlength="100" required="" type="email" value="<?php echo $userr['email']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="space20">
                                                <textarea name="review" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400"></textarea>
                                            </div>
                                            <button type="submit" class="button btn-small">
                                                Submit Review
                                            </button>
                                        </form>
                                    <?php
                                    } ?>
                                </div>
                                <div class="clearfix space30"></div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="space30"></div>
            <div class="related-products">
                <h4 class="heading">Related Products</h4>
                <hr>
                <div class="row">
                    <div id="shop-mason" class="shop-mason-3col">

                        <?php
                        $relsql = "SELECT * FROM `products` WHERE `id` != $id ORDER BY rand() LIMIT 3";
                        $relres = mysqli_query($connection, $relsql);
                        while ($relr = mysqli_fetch_assoc($relres)) {
                            ?>
                            <div class="sm-item isotope-item">
                                <div class="product">
                                    <div class="product-thumb">
                                        <img src="<?php echo getenv('STORE_URL'); ?>/admin/<?php echo $relr['thumb']; ?>" class="img-responsive" alt="">
                                        <div class="product-overlay">
                                            <span>
                                                <a href="<?php echo getenv('STORE_URL'); ?>/single.php?id=<?php echo $relr['id']; ?>" class="fa fa-link"></a>
                                                <a href="#" class="fa fa-shopping-cart"></a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="rating">
                                        <span class="fa fa-star act"></span>
                                        <span class="fa fa-star act"></span>
                                        <span class="fa fa-star act"></span>
                                        <span class="fa fa-star act"></span>
                                        <span class="fa fa-star act"></span>
                                    </div>
                                    <h2 class="product-title"><a href="#"><?php echo $relr['name']; ?></a></h2>
                                    <div class="product-price"><?php echo getenv('STORE_CURRENCY') . $relr['price']; ?><span></span></div>
                                </div>
                            </div>
                            <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include INC . 'footer.php'; ?>
