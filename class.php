<?php
include_once('header.php');
?>

    <div class="container">
        <div class="row bg-light pb-5 pt-5 mb-3">
            <div class="col text-center">
                <h2 class="text-dark">Classes</h2>
                <p class="text-secondary">You can find FLEX CLUB classes here.</p>
            </div>
        </div>
        <div class="card-deck">

            <?php
            $features = mysqli_fetch_all($connection->query("select * from class;"), MYSQLI_ASSOC);

            foreach ($features as $feature) {
                ?>

                <div class="col-md-4">

                    <div class="card  mb-3">
                        <img src=" <?= $feature['image']; ?>" class="card-img-top mh-50 " alt="Flex club Class Photo">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $feature['title']; ?>
                            </h5>
                        </div>
                        <div class="card-footer bg-white">
                            <a class="btn btn-link text-dark  mt-1 h3 d-flex justify-content-center "
                               href="class_details.php?id=<?= $feature['id']; ?>" role="button">More Detail</a>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>


<?php
include_once('footer.php');
