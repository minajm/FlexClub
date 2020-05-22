<?php
include_once('header.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $calssId = $_GET['id'];
        $sql = "SELECT * FROM class where id = $calssId";

        $name = "";
        $summery = "";
        $photo_link = "";
        $result = mysqli_query($connection, $sql);
        if ($result != false) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = $row['name'];
                    $summery = $row['summery'];
                    $photo_link = $row['photo_link'];

                }
            }
        }
    }
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="<?php echo $photo_link ?>" class="img-fluid" alt="Responsive image">
            </div>
        </div>
        <div class="row mt-4 border">
            <div class="col-md-12">
                <?php
                echo $summery;
                ?>
            </div>
        </div>
        <div class="row mt-4">
            <a class="btn  btn-primary btn-block" href="class_enroll.php?id=<?php echo $calssId; ?>">Enroll</a>
        </div>
    </div>

<?php
include_once('footer.php');
