<?php
session_start();
require_once '../config/connect.php';
if (!isset($_SESSION['email']) & empty($_SESSION['email'])) {
    header('location: login.php');
}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<section id="content">
    <div class="content-blog">
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Total Price</th>
                        <th>Order Status</th>
                        <th>Payment Mode</th>
                        <th>Order Placed On</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT o.id, o.totalprice, o.orderstatus, o.paymentmode, o.`timestamp`, u.firstname, u.lastname FROM orders o JOIN usersmeta u WHERE o.uid=u.uid ORDER BY o.id DESC";
                    $res = mysqli_query($connection, $sql);
                    while ($r = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $r['id']; ?></th>
                            <td><?php echo $r['firstname']. " " . $r['lastname']; ?></td>
                            <td><?php echo $r['totalprice']; ?></td>
                            <td><?php echo $r['orderstatus']; ?></td>
                            <td><?php echo $r['paymentmode']; ?></td>
                            <td><?php echo $r['timestamp']; ?></td>
                            <td><a href="order-process.php?id=<?php echo $r['id']; ?>">Process Order</a></td>
                        </tr>
                        <?php
                    } ?>
                </tbody>
            </table>            
        </div>
    </div>
</section>
<?php include 'inc/footer.php'; ?>
