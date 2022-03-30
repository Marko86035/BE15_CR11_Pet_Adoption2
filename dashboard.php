<?php
session_start();
require_once 'components/db_connect.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}

$id = $_SESSION['adm'];
$status = 'adm';
$sql = "SELECT * FROM user WHERE status != '$status'";
$result = mysqli_query($connect, $sql);

//this variable will hold the body for the table
$tbody = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail rounded-circle' src='pictures/" . $row['picture'] . "' alt=" . $row['first_name'] . "></td>
            <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
            <td>" . $row['date_of_birth'] . "</td>
            <td>" . $row['email'] . "</td>    
            <td>" . $row['address'] . "</td>
            <td><a href='update.php?id=" . $row['user_id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
            <a href='delete.php?id=" . $row['user_id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
         </tr>";
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm-Dashboard</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
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

        .userImage {
            width: 100px;
            height: auto;
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
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img class="userImage" src="pictures/admavatar.png" alt="Adm avatar">
                <p class="">Administrator</p>
                <div class="manageProduct w-75 mt-3">
        <div class='mb-3'>
            <a href="animals/index.php"><button class='btn btn-success' type="button">Animals</button></a>
        </div>
                <a class="btn btn-danger" href="logout.php?logout">Sign Out</a>
            </div>
            <div class="col-8 mt-2">
                <p class='h2'>Users</p>

                <table class='table table-striped'>
                    <thead class='table-warning'>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $tbody ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>