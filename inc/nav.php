                    <?php
                    // Check to see if the cart is in the session data else default to null.
                    // We do this because the $cart and $count variables are used extensively
                    // below and will output warnings if we don't.
                    if (isset($_SESSION['cart'])) {
                        $cart = $_SESSION['cart'];
                        $count = count($cart);
                    } else {
                        $count = 0;
                    }
                    ?>
                    <div class="menu-wrap">
                        <div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
                        <ul class="sf-menu">
                            <li>
                                <a href="<?php echo getenv('STORE_URL'); ?>/index.php">Home</a>
                            </li>
                            <li>
                                <a href="#">Shop</a>
                                <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
                                <ul>
                                    <?php
                                    $catsql = "SELECT * FROM `category`";
                                    $catres = mysqli_query($connection, $catsql);
                                    while ($catr = mysqli_fetch_assoc($catres)) {
                                        ?>
                                        <li><a href="<?php echo getenv('STORE_URL'); ?>/index.php?id=<?php echo $catr['id']; ?>"><?php echo $catr['name']; ?></a></li>
                                        <?php
                                    } ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#">My Account</a>
                                <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
                                <ul>
                                    <li><a href="<?php echo getenv('STORE_URL'); ?>/my-account.php">My Orders</a></li>
                                    <li><a href="<?php echo getenv('STORE_URL'); ?>/edit-address.php">Update Address</a></li>
                                <?php if (!isset($_SESSION['customer']) & empty($_SESSION['customer'])) : ?>
                                    <li><a href="<?php echo getenv('STORE_URL'); ?>/login.php">Sign In</a></li>
                                <?php else : ?>
                                    <li><a href="<?php echo getenv('STORE_URL'); ?>/logout.php">Logout</a></li>
                                <?php endif; ?>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo getenv('STORE_URL'); ?>/contact.php">Contact</a>
                            </li>
                        </ul>
                        <div class="header-xtra">
                            <div class="s-cart">
                                <div class="sc-ico"><i class="fa fa-shopping-cart"></i><?php
                                if ($count !== 0) {
                                    echo "<em>" . count($cart) . "</em>";
                                } ?></div>
                                <div class="cart-info">
                                    <small><?php
                                    if ($count !== 0 && $count !== 1) {
                                        echo 'You have <em class="highlight"> ' . $count . ' items</em> in your shopping cart.';
                                    } else if ($count === 1) {
                                        echo 'You have <em class="highlight"> 1 item</em> in your shopping cart.';
                                    } else {
                                        echo 'Your shopping cart is empty. It\'s pretty lonely over here, why not add something to it?';
                                    } ?>
                                    </small>
                                    <br>
                                    <br>
                                    <?php
                                    if ($count !== 0) {
                                        foreach ($cart as $key => $value) {
                                            $navcartsql = "SELECT * FROM `products` WHERE `id`=$key";
                                            $navcartres = mysqli_query($connection, $navcartsql);
                                            $navcartr = mysqli_fetch_assoc($navcartres); ?>
                                            <div class="ci-item">
                                                <img src="<?php echo getenv('STORE_URL'); ?>/admin/<?php echo $navcartr['thumb']; ?>" width="70" alt=""/>
                                                <div class="ci-item-info">
                                                    <h5>
                                                        <a href="<?php echo getenv('STORE_URL'); ?>/single.php?id=<?php echo $navcartr['id']; ?>"><?php echo substr($navcartr['name'], 0, 20); ?></a>
                                                    </h5>
                                                    <p><?php echo $value['quantity'] . ' x ' . getenv('STORE_CURRENCY') . $navcartr['price']; ?></p>
                                                    <div class="ci-edit">
                                                        <a href="<?php echo getenv('STORE_URL'); ?>/delcart.php?id=<?php echo $key; ?>" class="edit fa fa-trash"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $cartTotal = $cartTotal + ($navcartr['price']*$value['quantity']);
                                        } ?>
                                    <div class="ci-total">Subtotal: <?php echo getenv('STORE_CURRENCY') . $cartTotal; ?></div>
                                    <div class="cart-btn">
                                        <a href="<?php echo getenv('STORE_URL'); ?>/cart.php">View Cart</a>
                                        <a href="<?php echo getenv('STORE_URL'); ?>/checkout.php">Checkout</a>
                                    </div>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                            <div class="s-search">
                                <div class="ss-ico"><i class="fa fa-search"></i></div>
                                <div class="search-block">
                                    <div class="ssc-inner">
                                        <form>
                                            <input type="text" placeholder="Type Search text here...">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
