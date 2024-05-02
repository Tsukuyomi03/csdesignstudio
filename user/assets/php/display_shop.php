<?php
include ("config.php");
session_start();
$id = $_POST['id'];
$sql = "SELECT * FROM `tbl_products` WHERE P_Type LIKE '%$id%'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    while ($prow = mysqli_fetch_array($result)) {
        ?>
        <div class="col-lg-3 col-3 mb-5">
            <div class="card h-100">
                <img class="card-img-top"
                    src="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) ?>">
                <div class="card-body p-4">
                    <div class="text-center">
                        <h5 class="fw-bolder">
                            <?php echo $prow['P_Name'] ?>
                        </h5>
                        P <?php echo number_format($prow['P_Price'], 2); ?>
                    </div>
                </div>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center">
                        <a class="btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#viewProducts"
                            data-pid="<?php echo $prow['ID'] ?>" data-pname="<?php echo $prow['P_Name'] ?>"
                            data-pdes="<?php echo $prow['P_Description'] ?>" data-ptype="<?php echo $prow['P_Type'] ?>"
                            data-pprice="<?php echo $prow['P_Price'] ?>"
                            data-whatever="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) . '' ?>"
                            href="#">View Product</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } else { ?>
    <div class="col-lg-12">
        <div class="d-flex justify-content-center">
            <h2 style="color;white;">THERE ARE CURRENTLY NO PRODUCTS</h2>
        </div>
    </div>
<?php } ?>