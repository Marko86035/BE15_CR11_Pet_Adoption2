<?php
session_start();
require_once '../components/db_connect.php';

if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

$suppliers = "";
$result = mysqli_query($connect, "SELECT * FROM adoption");

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $suppliers .=
        "<option value='{$row['adoption_id']}'>{$row['adoption_date']}</option>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>PHP CRUD | Add Animal</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
<div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><strong>Pet Adoption</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="animals/u_index.php">Animals</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Adopt
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Take home</a></li>
            <li><a class="dropdown-item" href="#">Donate</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Kontakt</a></li>
          </ul>
        </li>
          </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>
    <fieldset>
        <legend class='h2'>Add Animal</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Animal name</th>
                    <td><input class='form-control' type="text" name="animal_name" placeholder="Animal Name" /></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><input class='form-control' type="text" name="location" placeholder="Animal Location" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input class='form-control' type="text" name="address" placeholder="Animal address" /></td>
                </tr>
                <tr>
                    <th>Discription</th>
                    <td><input class='form-control' type="text" name="discription" placeholder="Discription" /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class='form-control' type="text" name="size" placeholder="Animal Size" /></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="number" name="age" placeholder="Age" step="any" /></td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class='form-control' type="text" name="breed" placeholder="Animal Breed" /></td>
                </tr>
                <tr>
                    <th>Adoption</th>
                    <td>
                        <select class="form-select" name="adoption" aria-label="Default select example">
                            <?php echo $adoption; ?>
                            <option selected value='none'>Undefined</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Insert Animal</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>
</html>