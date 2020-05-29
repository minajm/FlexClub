<?php
include('header.php');
include "admin_panel_check.php";

$action = null;

if (isset($_GET['new'])) {
    $action = "new";
} else if ($_GET['id']) {
    $action = "edit";
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $amount = $_POST['amount'];
    $name = $_POST['name'];
    $benefits = $_POST['benefits'];


    if ($action === 'new') {
        $connection->query('INSERT INTO fee (amount, name, benefits) VALUES ("' . $amount . '", "' . $name . '", "' . $benefits . '");');
    } else if ($action === 'edit') {
        $id = $_GET['id'];
        $connection->query('UPDATE fee SET amount="' . $amount . '", name="' . $name . '", benefits="' . $benefits . '" WHERE id = ' . $id . ';');
    }

    echo "<script>window.location.replace(\"/FlexClub/registration_edit.php\");</script>";
}

function renderForm($connection, $action, $id = null)
{
    $amount = "";
    $summery = "";
    $link = "";

    if ($id != null) {
        $sql = "SELECT * FROM fee where id=" . $id;
        $result = mysqli_query($connection, $sql);

        if (!is_null($result)) {
            $row = $result->fetch_assoc();
            $amount = $row['amount'];
            $name = $row['name'];
            $benefits = $row['benefits'];

        } else {
            die('record does not exist');
        }
    }


    return "<h3 class='mt-3 mb-3 text-info'>" . ($action === 'new' ? "New Item" : "Edit") . "</h3>

<form method=\"POST\"  enctype=\"multipart/form-data\">
  <label for=\"amount\">Amount:</label><br>
  <input type=\"text\" id=\"amount\" name=\"amount\" value='" . $amount . "'><br>
  
  
  <label for=\"name\">Name:</label><br>
  <input type=\"text\" id=\"name\" name=\"name\" value='" . $name . "'><br>
  
  <label for=\"benefits\">Benefits:</label><br>
  <textarea   id=\"benefits\" name=\"benefits\" >" . $benefits . "</textarea>
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
            $sql = "SELECT COUNT(*) FROM fee";
            $result = mysqli_query($connection, $sql);

            if (!is_null($result)) {
                $row = $result->fetch_assoc();
                $features_count = $row['COUNT(*)'];
            }
            ?>
            <h3 class="mt-3 mb-3 text-dark">Registration Fee<span class="float-right">
                        <?php echo "Count : " . $features_count; ?></span>
            </h3>

            <a class="text-decoration-none text-danger" mb-3" href="./registration_edit.php?new">
            Add new Fee
            </a>
            <br>
            <?php
            if ($action != null) {
                echo renderForm($connection, $action, $_GET['id']);
            }
            ?>

            <br>

            <div class="table-responsive">
                <table class="table  table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>amount</th>
                        <th>name</th>
                        <th>benefits</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM fee";
                    $result = mysqli_query($connection, $query);    // object or null

                    if (!is_null($result)) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                        <tr>
                                            <td>' . $row["id"] . '</td>
                                            <td>' . $row["amount"] . '</td>
                                            <td>' . $row["name"] . '</td>
                                            <td>' . $row["benefits"] . '</td>
                                            <td><a href="registration_edit.php?id=' . $row["id"] . '">Edit</a></td>
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


