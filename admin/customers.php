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
                        <th>Customer Mobile</th>
                        <th>Customer Email</th>
                        <th>Customer From</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid";
                    $res = mysqli_query($connection, $sql);
                    while ($r = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $r['id']; ?></th>
                            <td><?php echo $r['firstname'] . " " . $r['lastname']; ?></td>
                            <td><?php echo $r['mobile']; ?></td>
                            <td><?php echo $r['email']; ?></td>
                            <td><?php echo $r['timestamp']; ?></td>

                        <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include 'inc/footer.php'; ?>
