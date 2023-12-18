<?php
include "../../Controllers/CategoryController.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    CategoryController::store();
    header("Location: ./index.php");
}

include_once "../components/head.php";

?>

<body class="bg-light">
    <div class="container mt-5 ">
        <div class="row bg-secondary bg-gradient bg-opacity-25">
            <div class="col"></div>
            <div class="col-6">
                <form action="./create.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" name="description" placeholder="Enter description">
                    </div>
                    <div class="form-group">
                        <label for="Photo">Image:</label>
                        <input type="text" class="form-control" name="photo" placeholder="Enter Image">
                    </div>
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