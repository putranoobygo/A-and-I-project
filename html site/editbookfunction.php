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

if (isset($_POST['bookid'])) {
    $bookid = $_POST['bookid'];
} else {
    die("Incorrect call");
}

$conn = new mysqli("127.0.0.1", "root", "", "bookstore");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$res = mysqli_query($conn,"UPDATE `book` SET `Title` = '".mysqli_real_escape_string($conn,$title).
    "', `ProductDescription` = '".mysqli_real_escape_string($conn,$desc)."', `State` = '".mysqli_real_escape_string($conn,$state)."', `Price` = '".mysqli_real_escape_string($conn,$price).
    "' WHERE `book`.`ID` = " .mysqli_real_escape_string($conn,$bookid));


if (!$res) {
    die('Error : (' . $mysqli->errno . ') ' . $mysqli->error);
}
$conn->close();
header('Location: index.php');

?>