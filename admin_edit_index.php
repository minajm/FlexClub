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
    $description = $_POST['description'];
    $image = $_POST['image'];
    $link = $_POST['link'];

    if ($action === 'new') {
        $connection->query('INSERT INTO home (title, description, image, link) VALUES ("'. $title .'", "'. $description .'", "'. $image .'", "'. $link .'");');
    } else if ($action === 'edit') {
        $id = $_GET['id'];
        $connection->query('UPDATE home SET title="' . $title . '", description="' . $description . '", image="' . $image . '", link="'.$link.'" WHERE id = ' . $id . ';');
    }

    echo "<script>window.location.replace(\"/FlexClub/admin_edit_index.php\");</script>";
}

function renderForm($connection, $action, $id=null) {
    $title = "";
    $description = "";
    $link = "";

    if ($id != null) {
        $sql = "SELECT * FROM home where id=" . $id;
        $result = mysqli_query($connection, $sql);

        if (!is_null($result)) {
            $row = $result->fetch_assoc();

            $title = $row['title'];
            $description = $row['description'];
            $link = $row['link'];

        } else {
            die('record does not exist');
        }
    }


    return "<h1>" . ($action === 'new' ? "New Item" : "Edit") . "</h1>

<form method=\"POST\">
  <label for=\"title\">Title:</label><br>
  <input type=\"text\" id=\"title\" name=\"title\" value='" . $title . "'><br>
  
    <label for=\"link\">Link:</label><br>
  <input type=\"text\" id=\"link\" name=\"link\" value='" . $link . "'><br>
  
  <label for=\"description\">Description:</label><br>
  <textarea  id=\"description\" name=\"description\">" . $description. "</textarea>
  
  
  <br><br>
  
  <input type=\"submit\" value=\"Submit\">
</form>";
}

?>

    <div class="container-fluid">
        <div class="row">
            <?php
            include_once ('dashboard_sidebar.php');
            ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <?php
                $sql = "SELECT COUNT(*) FROM home";
                $result = mysqli_query($connection, $sql);

                if (!is_null($result)) {
                    $row = $result->fetch_assoc();
                    $features_count = $row['COUNT(*)'];
                }
                ?>
                <h2>Feature Boxes<span class="float-right">
                        <?php echo "Count : " . $features_count; ?></span>
                </h2>

                <a href="./admin_edit_index.php?new">Add new feature box</a>

                <br>
                <?php
                if ($action != null) {
                    echo renderForm($connection, $action, $_GET['id']);
                }
                ?>

                <br>

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM home";
                        $result = mysqli_query($connection, $query);    // object or null

                        if (!is_null($result)) {
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>
                                            <td>' . $row["id"] . '</td>
                                            <td>' . $row["title"] . '</td>
                                            <td>' . $row["description"] . '</td>
                                            <td>' . $row["link"] . '</td>
                                            <td><a href="admin_edit_index.php?id=' . $row["id"] . '">Edit</a></td>
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


<?php
include_once('footer.php');
