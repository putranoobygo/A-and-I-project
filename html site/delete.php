<?php
if (isset($_GET['bookid'])) {
    $bookid = $_GET['bookid'];
}
else {
    die("Invalid book ID");
}

$conn = new mysqli("127.0.0.1", "root", "", "bookstore");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$res = mysqli_query($conn, "DELETE FROM `book` WHERE `book`.`ID` = " . mysqli_real_escape_string($conn,$bookid));
if (!$res) {
    die('Error : (' . $mysqli->errno . ') ' . $mysqli->error);
}
$conn->close();
header('Location: index.php');
?>