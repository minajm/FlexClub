<?php
include_once('header.php');

?>
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] == 1) { // logged IN
    ?>
    <div class="container">
        <div class="Features">
            <div class="card-deck">
                <?php
                $sql = "SELECT * FROM membership order by id desc ";
                $result = mysqli_query($connection, $sql);
                if ($result != false) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>

                            <div class="card">
                            <img class="card-img-top" src="image/image1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name'] . '  $' . $row['fee'] ?></h5>
                                <p class="card-text"><?php echo $row['summery'] ?></p>
                                <p class="card-footer"><a class="btn  btn-primary btn-block"
                                                          href="membership_enroll.php?id=<?php echo $row['id'] ?>">Enroll</a>
                                </p>
                            </div>
                            </div><?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <?php
} else {
    echo '
      <div class="container">
        <div class="row">
            <div class="text-danger text-center">You are not logged in, Please <a href="login.php"><b>login</b></a></div>
        </div>
    </div>  
    ';
}
?>

<?php
include_once('footer.php');
