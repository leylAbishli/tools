<?php require_once('../config.php'); ?>
<?php require "../includes/header.php"; ?>

<?php
$qry = $conn->query("SELECT * FROM `unit_list`");
?>

<section>
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
                    <form action="rent.php" method="POST">
                        <input name="tenant_id" value='<?php echo $_SESSION["userdata"]["id"] ?>' hidden />
                        <input name="unit_id" value='<?php echo $row["id"] ?>' hidden />
                        <button class='btn btn-primary my-3' role='submit'>Rent</button>
                    </form>
                </li> <!-- End -->
                <!-- End -->
            <?php endwhile; ?>
        </ul>
    </div>
    </div>
</section>

<?php require "../includes/footer.php"; ?>