                    <div class="menu-wrap">
                        <div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
                        <ul class="sf-menu">
                            <li>
                                <a href="http://localhost/ecomphp/index.php">Home</a>
                            </li>
                            <li>
                                <a href="#">Shop</a>
                                <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
                                <ul>
                                    <?php
                                    $catsql = "SELECT * FROM category";
                                    $catres = mysqli_query($connection, $catsql);
                                    while ($catr = mysqli_fetch_assoc($catres)) {
                                        ?>
                                        <li><a href="index.php?id=<?php echo $catr['id']; ?>"><?php echo $catr['name']; ?></a></li>
                                        <?php
                                    } ?>
                                </ul>
                            </li>
                            <li>
                                <a href="#">My Account</a>
                                <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
                                <ul>
                                    <li><a href="http://localhost/ecomphp/my-account.php">My Orders</a></li>
                                    <li><a href="http://localhost/ecomphp/edit-address.php">Update Address</a></li>
                                    <li><a href="http://localhost/ecomphp/logout.php">Logout</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                        <div class="header-xtra">
                            <?php $cart = $_SESSION['cart']; ?>
                            <div class="s-cart">
                                <div class="sc-ico"><i class="fa fa-shopping-cart"></i><em><?php
                                echo count($cart); ?></em></div>

                                <div class="cart-info">
                                    <small>You have <em class="highlight"><?php
                                    echo count($cart); ?> item(s)</em> in your shopping bag</small>
                                    <br>
                                    <br>
                                    <?php
                                    //print_r($cart);
                                    $total = 0;
                                    foreach ($cart as $key => $value) {
                                        //echo $key . " : " . $value['quantity'] ."<br>";
                                        $navcartsql = "SELECT * FROM products WHERE id=$key";
                                        $navcartres = mysqli_query($connection, $navcartsql);
                                        $navcartr = mysqli_fetch_assoc($navcartres); ?>
                                        <div class="ci-item">
                                            <img src="admin/<?php echo $navcartr['thumb']; ?>" width="70" alt=""/>
                                            <div class="ci-item-info">
                                                <h5><a href="single.php?id=<?php echo $navcartr['id']; ?>"><?php echo substr($navcartr['name'], 0, 20); ?></a></h5>
                                                <p><?php echo $value['quantity']; ?> x R <?php echo $navcartr['price']; ?>.00</p>
                                                <div class="ci-edit">
                                                    <!-- <a href="#" class="edit fa fa-edit"></a> -->
                                                    <a href="delcart.php?id=<?php echo $key; ?>" class="edit fa fa-trash"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $total = $total + ($navcartr['price']*$value['quantity']);
                                    } ?>
                                    <div class="ci-total">Subtotal: R <?php echo $total; ?>.00</div>
                                    <div class="cart-btn">
                                        <a href="cart.php">View Bag</a>
                                        <a href="checkout.php">Checkout</a>
                                    </div>
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
