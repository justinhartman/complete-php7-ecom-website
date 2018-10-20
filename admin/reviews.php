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
                        <th>Product Name</th>
                        <th>Review</th>
                        <th>Posted On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT r.id, p.name, r.review, r.`timestamp` FROM reviews r JOIN products p WHERE r.pid=p.id";
                    $res = mysqli_query($connection, $sql);
                    while ($r = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $r['id']; ?></th>
                            <td><?php echo substr($r['name'], 0, 20); ?></td>
                            <td><?php echo $r['review']; ?></td>
                            <td><?php echo $r['timestamp']; ?></td>
                            <?php
                        } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include 'inc/footer.php'; ?>
