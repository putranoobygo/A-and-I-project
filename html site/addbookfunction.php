<?php

if (isset($_POST['title'])) {
    $title = $_POST['title'];
} else {
    die("Incorrect call");
}

if (isset($_POST['desc'])) {
    $desc = $_POST['desc'];
} else {
    die("Incorrect call");
}

if (isset($_POST['state'])) {
    $state = $_POST['state'];
    if ($state < 1 || $state > 2) {
        die("Incorrect call");
    }
    $state = ($state == 1) ? "Sale" : "Repair";
} else {
    die("Incorrect call");
}

if (isset($_POST['price'])) {
    $price = $_POST['price'];
    if (!is_numeric($price)) {
        die("Incorrect call");
    }
} else {
    die("Incorrect call");
}

$conn = new mysqli("127.0.0.1", "root", "", "bookstore");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$res = mysqli_query($conn, "INSERT INTO `book` (`Title`, `ProductDescription`, `State`, `Price`) VALUES ('" . mysqli_real_escape_string($conn, $title) . "', '" . mysqli_real_escape_string($conn, $desc) . "', '" . mysqli_real_escape_string($conn, $state) . "', '" . mysqli_real_escape_string($conn, $price) . "');");
if (!$res) {
    die('Error : (' . $mysqli->errno . ') ' . $mysqli->error);
}
$conn->close();
header('Location: index.php');
?>