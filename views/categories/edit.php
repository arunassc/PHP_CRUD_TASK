<?php
include "../../Controllers/CategoryController.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    CategoryController::update($_POST['id']);
    header("Location: ./index.php");
}

if (!isset($_GET['id'])) {
    header("Location: ./index.php");
}
$category = CategoryController::find($_GET['id']);

include_once "../components/head.php";

?>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row bg-secondary bg-gradient bg-opacity-25">
            <div class="col"></div>
            <div class="col-6">
                <form action="./edit.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?= $category->name ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" name="description" placeholder="Enter Description" value="<?= $category->description ?>">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo URL:</label>
                        <input type="text" class="form-control" id="photo" name="photo" placeholder="Enter Photo URL" value="<?= $category->photo ?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $category->id ?>">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="./index.php" class="card-link">Back to categories</a>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <?php
    include_once "../components/footer.php";
    ?>