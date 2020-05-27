<?php
include_once ('header.php');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['cid'])) {
        $cid = $_GET['cid'];
        ?>
        <div class="container-fluid">
            <div class="row">


               <?php
                include_once ('admin_dashboard_panel.php');
               ?>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    <h3 class="text-center">View contact ticket</h3>
                    <br>
                    <?php
                    $query = "SELECT * FROM contact_us where id =$cid";
                    $result = mysqli_query($connection, $query);    // object or null

                    if (!is_null($result)) {
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                        <h3><?php echo $row['name']?></h3>
                                        <h6><?php echo $row['subject']?></h6>
                                        </div>
                                        <div class="card-footer">
                                        <span class="btn btn-warning float-right"><a class="text-dark" href="<?php echo $row['email']?>">Contact back</a>
</span>
</div>
                                     </div>
                                </div>
                                <div class="col-md-8">
                                <?php echo $row['body']?>
</div>
                            </div>
            </div>
        </div>

        <?php
    }
}
                    }
    }
include_once ('footer.php');