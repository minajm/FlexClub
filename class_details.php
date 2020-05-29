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
} ?>

<div class="container">

    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] == 1) { // logged IN
        echo '
        <div class="card mt-5 mb-5">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="' . $image . ' " class="card-img" style="max-height:300px ">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                        ' . $title . '
                     </h5>
                        <p class="card-text">
                           ' . $summery . '    
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-dark">
                <a class="btn btn-link text-light  mt-1 h3 d-flex justify-content-center "
                   href=" ' . $link . ' " role="button">
                    Document
                </a>
            </div>
        </div>
        ';
    } else {
        echo '
      <div class="container">
        <div class="row ">
            <div class="text-danger text-center">You are not logged in, Please <a href="login.php"><b>login</b></a></div>
        </div>
    </div>  
    ';
    } ?>
</div>

<?php
include_once('footer.php');

