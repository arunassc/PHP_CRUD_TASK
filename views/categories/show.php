<?php
include "../../Controllers/CategoryController.php";
$category = CategoryController::find($_GET['id']);

if (!isset($_GET['id'])) {
    header("Location: ./index.php");
    die;
}

include_once "../components/head.php";

?>

<body>
    <div class="row">
        <div class="col"></div>
        <div class="col-6">


            <div class="card" style="width: 100%;">
                <img src="../../images/computers.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $category->name ?></h5>
                    <p class="card-text"><?= $category->description ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Item one</li>
                    <li class="list-group-item">Item two</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Items link</a>
                    <a href="./index.php" class="card-link">Show all categories</a>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>

    <?php
    include_once "../components/footer.php";
    ?>