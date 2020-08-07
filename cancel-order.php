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

if (isset($_POST) && !empty($_POST)) {
    $cancel = filter_var($_POST['cancel'], FILTER_SANITIZE_STRING);
    $id = filter_var($_POST['orderid'], FILTER_SANITIZE_NUMBER_INT);

    $cansql = "INSERT INTO ordertracking (orderid, status, message) VALUES ('$id', 'Cancelled', '$cancel')";
    $canres = mysqli_query($connection, $cansql) or die(mysqli_error($connection));
    if ($canres) {
        $ordupd = "UPDATE orders SET orderstatus='Cancelled' WHERE id=$id";
        if (mysqli_query($connection, $ordupd)) {
            header('location: my-account.php');
        }
    }
}

/**
 * Flush the object cache.
 */
ob_flush();

$sql = "SELECT * FROM usersmeta WHERE uid=$uid";
$res = mysqli_query($connection, $sql);
$r = mysqli_fetch_assoc($res);
?>


	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
					<div class="page_header text-center">
						<h2>Shop - Cancel Order</h2>
						<p>Do you want to cancel Order?</p>
					</div>
<form method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Cancel Order</h3>

				<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order</th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment Mode</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>

				<?php
                    if (isset($_GET['id']) & !empty($_GET['id'])) {
                        $oid = $_GET['id'];
                    } else {
                        header('location: my-account.php');
                    }
                    $ordsql = "SELECT * FROM orders WHERE id='$oid'";
                    $ordres = mysqli_query($connection, $ordsql);
                    while ($ordr = mysqli_fetch_assoc($ordres)) {
                        ?>
					<tr>
						<td>
							<?php echo $ordr['id']; ?>
						</td>
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
						<td>
							<?php echo $ordr['orderstatus']; ?>
						</td>
						<td>
							<?php echo $ordr['paymentmode']; ?>
						</td>
						<td>
							INR <?php echo $ordr['totalprice']; ?>/-
						</td>
					</tr>
				<?php
                    } ?>
				</tbody>
			</table>

						<div class="space30"></div>


							<div class="clearfix space20"></div>
							<label>Reason :</label>
							<textarea class="form-control" name="cancel" cols="10"> </textarea>

					<input type="hidden" name="orderid" value="<?php echo $_GET['id']; ?>">
						<div class="space30"></div>
					<input type="submit" class="button btn-lg" value="Cancel Order">
					</div>
				</div>

			</div>

		</div>
</form>
		</div>
	</section>

<?php include INC . 'footer.php'; ?>
