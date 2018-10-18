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

// We use ouput buffering here because we want to modify the headers after
// sending the content when we redirect the user to the login page.
ob_start();
if (!isset($_SESSION['customer']) & empty($_SESSION['customer'])) {
    header('location: login.php');
}

/**
 * Load the template files.
 */
include INC . 'header.php';
include INC . 'nav.php';

$uid = $_SESSION['customerid'];
$cart = $_SESSION['cart'];
?>

<!-- SHOP CONTENT -->
<section id="content">
    <div class="content-blog content-account">
        <div class="container">
            <div class="row">
                <div class="page_header text-center">
                    <h2>My Account</h2>
                </div>
                <div class="col-md-12">
                    <h3>Recent Orders</h3>
                    <br>
                    <table class="cart-table account-table table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th></th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if (isset($_GET['id']) & !empty($_GET['id'])) {
                                $oid = $_GET['id'];
                            } else {
                                header('location: my-account.php');
                            }
                            $ordsql = "SELECT * FROM orders WHERE uid='$uid' AND id='$oid'";
                            $ordres = mysqli_query($connection, $ordsql);
                            $ordr = mysqli_fetch_assoc($ordres);

                            $orditmsql = "SELECT * FROM orderitems o JOIN products p WHERE o.orderid=3 AND o.pid=p.id";
                            $orditmres = mysqli_query($connection, $orditmsql);
                            while ($orditmr = mysqli_fetch_assoc($orditmres)) {
                                ?>
                                <tr>
                                    <td>
                                        <a href="single.php?id=<?php echo $orditmr['pid']; ?>"><?php echo substr($orditmr['name'], 0, 25); ?></a>
                                    </td>
                                    <td>
                                        <?php echo $orditmr['pquantity']; ?>
                                    </td>
                                    <td>
                                        R <?php echo $orditmr['productprice']; ?>
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        R <?php echo $orditmr['productprice']*$orditmr['pquantity']; ?>
                                    </td>
                                </tr>
                                <?php
                            } ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    Order Total
                                </td>
                                <td>
                                    <?php echo $ordr['totalprice']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    Order Status
                                </td>
                                <td>
                                    <?php echo $ordr['orderstatus']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    Order Placed On
                                </td>
                                <td>
                                    <?php echo $ordr['timestamp']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <br>
                    <br>
                    <br>

                    <div class="ma-address">
                        <h3>My Addresses</h3>
                        <p>The following addresses will be used on the checkout page by default.</p>

                        <div class="row">
                            <div class="col-md-6">
                                <h4>My Address <a href="edit-address.php">Edit</a></h4>
                                <?php
                                $csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
                                $cres = mysqli_query($connection, $csql);
                                if (mysqli_num_rows($cres) == 1) {
                                    $cr = mysqli_fetch_assoc($cres);
                                    echo "<p>".$cr['firstname'] ." ". $cr['lastname'] ."</p>";
                                    echo "<p>".$cr['address1'] ."</p>";
                                    echo "<p>".$cr['address2'] ."</p>";
                                    echo "<p>".$cr['city'] ."</p>";
                                    echo "<p>".$cr['state'] ."</p>";
                                    echo "<p>".$cr['country'] ."</p>";
                                    echo "<p>".$cr['company'] ."</p>";
                                    echo "<p>".$cr['zip'] ."</p>";
                                    echo "<p>".$cr['mobile'] ."</p>";
                                    echo "<p>".$cr['email'] ."</p>";
                                }
                                ?>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include INC . 'footer.php' ?>
