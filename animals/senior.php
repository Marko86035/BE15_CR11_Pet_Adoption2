<?php
session_start();
require_once '../components/db_connect.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header("Location: ../index.php");
  exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

$sql = "SELECT * FROM animals where age >= 8";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td>" . $row['animal_name'] . "</td>
            <td>" . $row['location'] . "</td>
            <td><img class='img-thumbnail' src='../pictures/" . $row['picture'] . "'</td>
            <td>" . $row['address'] . "</td>
            <td>" . $row['discription'] . "</td>
            <td>" . $row['size'] . "</td>
            <td>" . $row['age'] . "</td>
            <td>" . $row['breed'] . "</td>
            <td><a href='showmore.php?id=" . $row['animal_id'] . "'><button class='btn btn-primary btn-sm' type='button'>Show more</button></a>
            <a href='delete.php?id=" . $row['animal_id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='10'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }

        td {
            text-align: left;
            vertical-align: middle;
        }

        tr {
            text-align: center;
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
    <div class="manageProduct w-75 mt-3">
        <div class='mb-3'>
            <a href="../dashboard.php"><button class='btn btn-success' type="button">Dashboard</button></a>
        </div>
        <p class='h2'>Animal</p>
        <table class='table table-striped'>
            <thead class='table-success'>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Picture</th>
                    <th>Address</th>
                    <th>Discription</th>
                    <th>Size</th>
                    <th>Age</th>
                    <th>Breed</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
    </div>
</body>
</html>