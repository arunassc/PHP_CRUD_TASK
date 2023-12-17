<?php
include "../../Controllers/CategoryController.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    CategoryController::update($_POST['id']);
    header("Location: ./index.php");
}

if (!isset($_GET['id'])) {
    header("Location: ./index.php");
 }
 $category = CategoryController::find($_GET['id']);
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Computer</title>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row bg-secondary bg-gradient bg-opacity-25">
            <div class="col"></div>
            <div class="col-6">
                <form action="./edit.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" value="<?= $category->name ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" name="description" placeholder="Enter Description" value="<?= $category->description ?>">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="text" class="form-control" id="photo" placeholder="Enter id"  value="<?= $category->id ?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $category->id ?>">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="./index.php" class="card-link">Back to categories</a>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>

</html>