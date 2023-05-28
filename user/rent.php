<?php require_once('../config.php'); ?>
<?php require "../includes/header.php"; ?>

<?php
if ($_POST) {

    $data = "unit_id = " . $_POST['unit_id'] . ",tenant_id = " . $_POST['tenant_id'] . ",rent_type=1,status=1,billing_amount=124";

    if ($conn->query("INSERT INTO `rent_list` set {$data}")) {
        redirect('');
    }
}
?>

<?php
$id = $_SESSION['userdata']['id'];
$qry = $conn->query("SELECT *
    FROM `unit_list`
    INNER JOIN `rent_list` ON `unit_list`.`id` = `rent_list`.`unit_id`
    WHERE `rent_list`.`tenant_id` = $id;
    ");
?>
<div class="rented-tools">
    <div class="row">
        <div class="col-lg-8 mx-auto"></div>
        <ul style="list-style:  none;" class="list-group shadow">
            <?php while ($row = $qry->fetch_assoc()) : ?>
                <!-- list group item-->
                <li style="list-style: none;" class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h3 class="font-italic text-muted mb-3"><?php echo $row['unit_number'] ?></h3>
                        </div>
                        <div class="description">
                            <?php echo html_entity_decode($row['description']) ?>
                        </div>
                        <img src="<?php echo base_url . $row['image'] ?>" alt="Generic placeholder image" width="200" />
                    </div> <!-- End -->
                </li> <!-- End -->
                <!-- End -->
            <?php endwhile; ?>
        </ul>
    </div>

</div>