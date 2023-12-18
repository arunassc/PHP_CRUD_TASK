<?php
include "../../Controllers/CategoryController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    CategoryController::destroy($_POST['id']);

    header("Location: index.php");
    die;
}

$categories = CategoryController::getAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="your-actual-integrity-hash" crossorigin="anonymous">
    <link href="../../css/main.css" rel="stylesheet" integrity="your-integrity-hash" crossorigin="anonymous">
    <title>Computer</title>
</head>

<body>
    <div class="container">
        <h1>Categories Of Computers</h1>
        <a class="btn btn-success" href="./create.php">Create</a>
        <div class="row">
            <?php foreach ($categories as $category) : ?>
                <div class="col-md-6">
                    <h3 class="card-title"><?= $category->name ?></h3>
                    <div class="card mb-4">
                        <img class="card-img-top img-fluid" src="<?= $category->photo ?>" alt="<?= $category->name ?>">
                    </div>
                    <p class="card-text"><?= $category->description ?></p>
                    <div class="d-flex p-2 bd-highlight justify-content-center">
                        <a class="btn btn-primary mx-2" href="./show.php?id=<?= $category->id ?>">Show</a>
                        <a class="btn btn-success mx-2" href="./edit.php?id=<?= $category->id ?>">Edit</a>
                        <form action="./index.php" method="post">
                            <input type="hidden" name="id" value="<?= $category->id ?>">
                            <button class="btn btn-danger mx-2" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>