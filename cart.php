<?php
/**
 * Advanced PHP 7 eCommerce Website (https://22digital.agency)
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
 * @copyright Copyright (c) 22 Digital (https://22digital.agency)
 * @copyright Copyright (c) Justin Hartman (https://justinhartman.blog)
 * @author    Justin Hartman <justin@hartman.me> (https://justinhartman.blog)
 * @link      https://github.com/justinhartman/complete-php7-ecom-website GitHub Project
 * @since     0.1.0
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 */

/**
 * Load the bootstrap file.
 */
require __DIR__ . '/config/bootstrap.php';

/**
 * Load the template files.
 */
include INC . 'header.php';
include INC . 'nav.php';

$cart = $_SESSION['cart'];
?>


<!-- SHOP CONTENT -->
<section id="content">
    <div class="content-blog">
        <div class="container">
            <div class="row">
                <div class="page_header text-center">
                    <h2>Shop Cart</h2>
                    <p>Get the best kit for smooth shave</p>
                </div>
                <div class="col-md-12">

                    <table class="cart-table table table-bordered">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //print_r($cart);
                            $total = 0;
                            foreach ($cart as $key => $value) {
                                //echo $key . " : " . $value['quantity'] ."<br>";
                                $cartsql = "SELECT * FROM products WHERE id=$key";
                                $cartres = mysqli_query($connection, $cartsql);
                                $cartr = mysqli_fetch_assoc($cartres); ?>
                                <tr>
                                    <td>
                                        <a class="remove" href="delcart.php?id=<?php echo $key; ?>"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td>
                                        <a href="#"><img src="admin/<?php echo $cartr['thumb']; ?>" alt="" height="90" width="90"></a>
                                    </td>
                                    <td>
                                        <a href="single.php?id=<?php echo $cartr['id']; ?>"><?php echo substr($cartr['name'], 0, 30); ?></a>
                                    </td>
                                    <td>
                                        <span class="amount">R<?php echo $cartr['price']; ?>.00</span>
                                    </td>
                                    <td>
                                        <div class="quantity"><?php echo $value['quantity']; ?></div>
                                    </td>
                                    <td>
                                        <span class="amount">R<?php echo($cartr['price']*$value['quantity']); ?>.00</span>
                                    </td>
                                </tr>
                                <?php
                                $total = $total + ($cartr['price']*$value['quantity']);
                            } ?>
                            <tr>
                                <td colspan="6" class="actions">
                                    <div class="col-md-6">
                                        <!--	<div class="coupon">
                                        <label>Coupon:</label><br>
                                        <input placeholder="Coupon code" type="text"> <button type="submit">Apply</button>
                                    </div> -->
                                </div>
                                <div class="col-md-6">
                                    <div class="cart-btn">
                                        <!-- <button class="button btn-md" type="submit">Update Cart</button> -->
                                        <a href="checkout.php" class="button btn-md" >Checkout</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="cart_totals">
                    <div class="col-md-6 push-md-6 no-padding">
                        <h4 class="heading">Cart Totals</h4>
                        <table class="table table-bordered col-md-6">
                            <tbody>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">R <?php echo $total; ?>.00</span></td>
                                </tr>
                                <tr>
                                    <th>Shipping and Handling</th>
                                    <td>
                                        Free Shipping
                                    </td>
                                </tr>
                                <tr>
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">R <?php echo $total; ?>.00</span></strong> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<?php include INC . 'footer.php' ?>
