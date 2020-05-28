<?php
include_once('header.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM class where id = $id";
        $title = "";
        $summery = "";
        $image = "";
        $link = "";
        $result = mysqli_query($connection, $sql);
        if ($result != false) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $title = $row['title'];
                    $image = $row['image'];
                    $summery = $row['summery'];
                    $link = $row['link'];

                }
            }
        }
    }
}
?>
    <div class="container">
        <div class="card mt-5 mb-5">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?php echo $image ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                            echo $title;
                            ?>
                        </h5>
                        <p class="card-text">
                            <?php
                            echo $summery;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-link text-dark  mt-1 h3 d-flex justify-content-center "
                   href="<?php echo $link ?>" role="button">
                    link
                </a>
            </div>
        </div>
    </div>

<?php
include_once('footer.php');

