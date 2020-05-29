<?php
include ('header.php');
include "admin_panel_check.php";

$action = null;

if (isset($_GET['new'])) {
    $action = "new";
} else if ($_GET['id']) {
    $action = "edit";
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $summery = $_POST['summery'];
    $photo = "";
    $link = $_POST['link'];


    if ($_FILES["photo"]) {
        $target_dir = "./image/upload/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);

        $check = getimagesize($_FILES["photo"]["tmp_name"]);

        if ($check !== false) {
            if (!file_exists($target_file)) {
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                    $photo = $target_file;
                }
            } else {
                die('photo with the name already exists, please rename and upload again');
            }
        } else {
            die('incorrect image file');
        }
    }

    if ($action === 'new') {
        $connection->query('INSERT INTO class (title, summery, image, link) VALUES ("'. $title .'", "'. $summery .'", "'. $photo .'", "'. $link .'");');
    } else if ($action === 'edit') {
        $id = $_GET['id'];
        $connection->query('UPDATE class SET title="' . $title . '", summery="' . $summery . '", image="' . $photo . '", link="'.$link.'" WHERE id = ' . $id . ';');
    }

    echo "<script>window.location.replace(\"/FlexClub/admin_edit_class.php\");</script>";
}

function renderForm($connection, $action, $id=null) {
    $title = "";
    $summery = "";
    $link = "";

    if ($id != null) {
        $sql = "SELECT * FROM class where id=" . $id;
        $result = mysqli_query($connection, $sql);

        if (!is_null($result)) {
            $row = $result->fetch_assoc();

            $title = $row['title'];
            $summery = $row['summery'];
            $link = $row['link'];

        } else {
            die('record does not exist');
        }
    }


    return "<h3 class='mt-3 mb-3 text-info'>" . ($action === 'new' ? "New Item" : "Edit") . "</h3>

<form method=\"POST\"  enctype=\"multipart/form-data\">
  <label for=\"title\">Title:</label><br>
  <input type=\"text\" id=\"title\" name=\"title\" value='" . $title . "'><br>
  
  <label for=\"photo\">Photo:</label><br>
  <input type=\"file\" name=\"photo\" id=\"photo\"><br>
  
  <label for=\"link\">Link:</label><br>
  <input type=\"text\" id=\"link\" name=\"link\" value='" . $link . "'><br>
  
  <label for=\"summery\">Summery:</label><br>
  <textarea  id=\"summery\" name=\"summery\">" . $summery. "</textarea>
   
  <br><br>
  
  <input type=\"submit\" value=\"Submit\">
</form>";
}

?>

    <div class="container-fluid">
        <div class="row">
            <?php
            include_once('admin_panel_sidebar.php');
            ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <?php
                $sql = "SELECT COUNT(*) FROM class";
                $result = mysqli_query($connection, $sql);

                if (!is_null($result)) {
                    $row = $result->fetch_assoc();
                    $features_count = $row['COUNT(*)'];
                }
                ?>
                <h3 class="mt-3 mb-3 text-dark">All Classes<span class="float-right">
                        <?php echo "Count : " . $features_count; ?></span>
                </h3>

                <a class="text-decoration-none text-danger mb-3" href="./admin_edit_class.php?new">Add new Class</a>

                <br>
                <?php
                if ($action != null) {
                    echo renderForm($connection, $action, $_GET['id']);
                }
                ?>

                <br>

                <div class="table-responsive">
                    <table class="table table-sm mt-5">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Summery</th>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM class";
                        $result = mysqli_query($connection, $query);    // object or null

                        if (!is_null($result)) {
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                        <tr>
                                            <td>' . $row["id"] . '</td>
                                            <td>' . $row["title"] . '</td>
                                            <td>' . $row["summery"] . '</td>
                                            <td> 
                                            '. '<img width="100" height="100" src="' . $row['image'] . '" >' . '
                                            </td>
                                            <td>' . $row["link"] . '</td>
                                            <td><a href="admin_edit_class.php?id=' . $row["id"] . '">Edit</a></td>
                                        </tr>';
                                }
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>



