<?php
// Connection with database
require('../files/connect.php');
?>

<!-- Include action to load header and content from main page. -->
<?php
include ('../views/header.php');
include('../views/contentMainPage.php');
?>
<html>
<footer class="footer-main-page">
    <!--Include action to load the footer-->
    <?php include ('../views/footer.php') ?>
</footer>
</html>